<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    //
    protected $primaryKey           =   'uuid';

    protected $keyType              =   'string';

    protected $perPage              =   15;

    public $incrementing            =   false;

    public $timestamps              =   false;
}
