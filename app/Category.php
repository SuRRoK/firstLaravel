<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'description'];

    public function posts()
    {
        return $this->hasMany(Post::class);
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
        $category = new static();
        $category->fill($fields);
        $category->save();

        return $category;
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

    public function getImage()
    {
        if ($this->image == null)
        {
            return '/img/no-category-image.png';
        }
        return '/uploads/' . $this->image;
    }

}
