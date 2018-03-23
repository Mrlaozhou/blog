<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends MainBase
{
    //
    protected $table        =   'blog_category';

    public function scopeOfStatus ($query,$status=1)
    {
        return $query->where( 'status', $status );
    }
}
