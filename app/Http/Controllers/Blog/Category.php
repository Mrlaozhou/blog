<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as Model;
use App\Models\Blog;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait Category
{
    protected $categories;

    /**@ 分类下文章列表
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category (Request $request, $uuid)
    {
        // TODO 顶级分类信息、当前分类的顶级分类下的二级分类、当前分类及子分类下文章列表
        // -- 顶级分类信息
        $tops           =   $this->categorySubA();
        // -- 当前分类的顶级分类
        $currentTop     =   Ancestor( $this->categories(), $uuid )['uuid'];
        // -- 当前分类的顶级分类下的二级分类
        $subA           =   $this->categorySubA($currentTop);
        // -- 当前分类下所有下级分类列表
        $currentSubs    =   Sorts( $this->categories(), true, $uuid );
        // -- 当前分类下所有下级分类ids集
        $currentSubIds  =   array_column( $currentSubs, 'uuid'  );
        // -- 当前分类及子分类下文章列表
        $data          =   Blog::status()->from('blog as b')
            ->leftjoin('blog_category_relation as r','b.uuid','=','r.buuid')
            ->select(...$this->allowFields)
            ->whereIn('r.cuuid',array_merge( [$uuid], $currentSubIds ))
            ->orderBy( 'b.publishedtype', 'desc' )->distinct()->paginate(20);

        return view( 'main', [
            'topnavs'           =>  $tops,          // 顶级分类
            'subnavs'           =>  $subA,          // 顶级下 一级分类
            'currentTop'        =>  $currentTop,    // 当前分类最高级分类uuid
            'current'           =>  $uuid,          // 当前分类uuid
            'data'              =>  $data,          // 携带分页信息的数据集
        ] );
    }

    /**
     * @ 下一级
     * @return array
     */
    protected function categorySubA ($sign='')
    {
        return array_filter( $this->categories(), function($item) use ($sign){
            return $item['pid'] == $sign;
        } );
    }

    /**
     * @ 获取子分类信息
     * @param $uuid
     * @return array
     */
    protected function SubCategory ($uuid)
    {
        return Sorts( $this->categories(), true, $uuid );
    }

    /**
     * @ 获取合法的分类信息
     * @return mixed
     */
    protected function categories ()
    {
        return $this->categories ?: ($this->categories=Model::status()->select(...['uuid','name','pid'])->get()->toArray());
    }
}
