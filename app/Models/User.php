<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends ManageBase
{
    //
    protected $table            =   'admin';

    protected $hidden           =   [ 'password','salt','issalt' ];
}
