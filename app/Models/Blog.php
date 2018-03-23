<?php

namespace App\Models;

use App\Collections\BaseCollection;
use Illuminate\Database\Eloquent\Model;
use App\Observers\BlogObserver;
class Blog extends MainBase
{
    //
    protected $table                =   'blog';

    protected $dispatchesEvents     =   [
        'retrieved'         =>  BlogObserver::class
    ];

    public function admin ()
    {
        return $this->hasOne('App\Models\Admin','uuid','createdby');
    }

    public function scopeStatus ($query)
    {
        return $query->where('status',1);
    }
}
