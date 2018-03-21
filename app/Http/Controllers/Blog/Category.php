<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as Model;
use App\Models\Blog;
trait Category
{
    public $category;

    public function category (Request $request, $uuid)
    {
        // TODO 获取导航栏信息、分类下列表信息、广告位信息、底部支持信息
        // -- 一级分类信息
        $navs           =   $this->categoryClassA();
        // -- 二级默认分类信息
        $current        =   $uuid;
        $nav2           =   $this->SubCategory($current);
        $subIds         =   [];
        foreach ($nav2 as $item) {
            $subIds[] = $item->uuid;
        }
        $subIds         =   array_merge( [$uuid],$subIds );
        // -- 列表信息
        $lists          =   $this->_blogQueryBuilder([ ['r.cuuid','in',$subIds] ])
            ->orderBy( 'b.publishedtype', 'desc' )->paginate(30);
        // -- 广告信息

        // -- 底部支持信息

        return view( 'main', [
            'navs'      =>  $navs,
            'nav2'      =>  $nav2,
            'lists'     =>  $lists,
            'current'   =>  $current,
            'paginate'  =>  ''
        ] );
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
