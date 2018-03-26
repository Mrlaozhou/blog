<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageBase extends Model
{
    //
    protected $connection           =   'manage';
    protected $primaryKey           =   'uuid';
    protected $keyType              =   'string';
    protected $perPage              =   15;
    public $incrementing            =   false;
    public $timestamps              =   false;
}
