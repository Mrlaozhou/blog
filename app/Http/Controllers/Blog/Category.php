<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as Model;
trait Category
{
    public $category;

    public function category (Request $request, $uuid)
    {
        dump( $uuid );
    }

    protected function categoryClassA ()
    {
        $calssA = [];
        foreach ( $this->validCategory() as $item )
            if( $item->pid == '' )  $calssA[] = $item;
        return $calssA;
    }

    /**
     * @ 获取子分类信息
     * @param $uuid
     * @return array
     */
    protected function SubCategory ($uuid)
    {
        return Sorts( $this->validCategory(), true, $uuid );
    }

    /**
     * @ 获取合法的分类信息
     * @return mixed
     */
    protected function validCategory ()
    {
        if( $this->category )   return $this->category;

        return $this->category = Model::where('status',1)->select(...['uuid','name','pid'])->get();
    }
}
