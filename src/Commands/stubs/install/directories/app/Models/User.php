<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Image;
use ImageStyle;
use Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function storeImage($image)
    {
        return Storage::disk('user')->putFileAs('portrait', $image, md5($this->id) . '-' . $image->hashName());
    }

    public function getPortraitAttribute()
    {
        $image = substr(Storage::disk('user')->getAdapter()->getPathPrefix(), strlen(storage_path()) + 1) . '/' . $this->image;
        return Image::resize($image);
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\UserAddress', 'user_id');
    }
    public function address()
    {
        return $this->hasOne('App\Models\UserAddress', 'user_id')->where('id',$this->address_id);
    }

    public function updateAddressId($id)
    {
        $this->address_id = $id;
        $this->save();
    }
}
