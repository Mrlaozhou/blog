<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends ManageBase
{
    //
    protected $table            =   'admin';

    protected $hidden           =   [ 'password','salt','issalt' ];

    public function blogs ()
    {
        return $this->hasMany(Blog::class,'createdby','uuid');
    }

    public function scopeStatus($query)
    {
        return $query->where( 'status','1' );
    }
}
