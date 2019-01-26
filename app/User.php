<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    const IS_ADMIN = 1;
    const NOT_ADMIN = 0;
    const IS_BANNED = 1;
    const NOT_BANNED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->cryptPassword($fields['password']);
        //dd($fields['password']);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->cryptPassword($fields['password']);
        $this->save();
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    public function removeAvatar()
    {
        if ($this->avatar != null) {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

    public function uploadAvatar($avatar)
    {

        if ($avatar == null) { return; }
        $this->removeAvatar();

        $filename = str_random(12) . '.' . $avatar->extension();
        $avatar->storeAs('uploads',$filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function getAvatar()
    {
        if ($this->avatar == null)
        {
            return '/img/no-user-image.png';
        }
        return '/uploads/' . $this->avatar;
    }

    public function setAdmin()
    {
        $this->is_admin = User::IS_ADMIN;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_admin = User::NOT_ADMIN;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        if ($value == null)
        {
            return $this->setStandart();
        }

        return $this->setAdmin();
    }

    public function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->status = User::NOT_BANNED;
        $this->save();
    }

    public function toggleBan($value)
    {
        if ($value == null)
        {
            return $this->unban();
        }

        return $this->ban();
    }

    public function cryptPassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

}
