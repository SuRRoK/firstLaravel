<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    const IS_STANDART = 0;
    const IS_FEATURED = 1;

    protected $fillable = ['title', 'content'];
    
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    
    public function author()
    {
        return $this->hasOne(User::classl);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags','post_id','tag_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
         $post = new static();
         $post->fill($fields);
         $post->user_id = 1;
         $post->save();

         return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {

       $this->delete();
    }

    public function uploadImage($image)
    {

        if ($image == null) { return; }
        Storage::delete('uploads/' . $this->image);
        $filename = str_random(12) . '.' . $image->extension;
        $image->saveAs('uploads',$filename);
        $this->image = $filename;
        $this->save();
    }

    public function setCategory($id)
    {
        if ($id==null) { return; }
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids==null) { return; }
        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
         $this->status = 0;
         $this->save();
    }

    public function setPublic()
    {
         $this->status = 1;
         $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null)
        {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function setFeatured()
    {
         $this->is_featured = Post::IS_FEATURED;
         $this->save();
    }

    public function setStandart()
    {
         $this->is_featured = Post::IS_STANDART;
         $this->save();
    }

    public function toggleFeatured($value)
    {
        if ($value == null)
        {
            return $this->setStandart();
        }

        return $this->setFeatured();
    }

    public function getImage()
    {
        if ($this->image == null)
        {
            return '/img/no-post-image.png';
        }
        return '/uploads/' . $this->image;
    }

}
