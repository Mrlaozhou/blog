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

    public function auther ()
    {
        return $this->hasOne(User::class,'uuid','createdby')
            ->select(...['uuid','nickname']);
    }

    /**
     * @ 当前文章所属分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories ()
    {
        return $this->belongsToMany(
            Category::class,
            'blog_category_relation',
            'buuid',
            'cuuid'
        )->select(...['uuid','name']);
    }
}
