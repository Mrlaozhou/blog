<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as Model;
use App\Models\Blog;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait Category
{
    public function category (Request $request, $uuid)
    {
        // TODO 获取一级导航栏信息、二级导航信息、当前分类（及子分类）下列表信息、广告位信息、底部支持信息
        // -- 当前分类信息
        if( !$currentInfo=Model::find($uuid) )   throw new NotFoundHttpException('页面走丢');
        // -- 一级分类信息
        $navs           =   $this->categoryClassA();
        // -- 当前分类最高父级信息
        $ancestor       =   Ancestor( $this->validCategory(),$currentInfo->pid );
        // -- 二级导航信息
        $nav2           =   $this->SubCategory( $ancestor->uuid ?? $uuid );
        // -- 当前分类（及子分类）ids集
        $currentSubItems=   $this->SubCategory( $uuid );
        $subIds         =   array_merge( [$uuid],array_map( function($item){ return $item->uuid; },$currentSubItems ) );
        // -- 列表信息
        $lists          =   $this->_blogQueryBuilder([ 'in'=>[ 'r.cuuid',$subIds ] ])
            ->orderBy( 'b.publishedtype', 'desc' )->paginate(30);

        return view( 'main', [
            'navs'      =>  $navs,
            'nav2'      =>  $nav2,
            'lists'     =>  $lists,
            'current'   =>  $ancestor->uuid ?? $uuid,
            'current2'  =>  $uuid,
        ] );
    }

    /**
     * @ 一级导航
     * @return array
     */
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
        return Model::where('status',1)->select(...['uuid','name','pid'])->get();
    }
}
