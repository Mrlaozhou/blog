<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainBase extends Model
{
    //
    protected $primaryKey           =   'uuid';

    protected $keyType              =   'string';

    protected $perPage              =   15;

    public $incrementing            =   false;

    public $timestamps              =   false;

    public function admin ()
    {
        return $this->hasOne('App\Models\Admin','uuid','createdby');
    }
}
