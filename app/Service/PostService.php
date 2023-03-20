<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }else{
                $tagsIds = [];
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post = Post::Create($data);
            if (isset($tagsIds)) {
                $post->tags()->attach($tagsIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }else{
                $tagsIds = [];
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);
            if (isset($tagsIds)) {
                $post->tags()->sync($tagsIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;

    }

    public function destroy($post){
        $preview_image_path = $post->preview_image;
        $main_image_path = $post->main_image;


        $post->comments()->delete();
        $post->tags()->detach();
        try {
            $post->delete();
        }catch(QueryException $exception){
            Log::error($exception->getMessage());
            abort(500, 'Ошибка удаления поста');
        }
        Storage::disk('public')->delete($preview_image_path);
        Storage::disk('public')->delete($main_image_path);


    }
}
