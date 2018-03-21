<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Blog,Category,Relation};
use App\Http\Controllers\Blog\Category as CategoryController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class IndexController extends Controller
{
    use CategoryController;
    protected $allowFields = ['b.uuid','b.title','b.short','b.cover','b.oppose','b.agree','b.publishedtime','b.publishedtype','b.clicks'

    ];
    //
    public function main (Request $request)
    {
        // TODO 获取导航栏信息、列表信息、广告位信息、底部支持信息
        // -- 一级分类信息
        $navs           =   $this->categoryClassA();
        // -- 二级默认分类信息
        $current        =   'A04D0131A0467228B4BF7903194A4268';
        $nav2           =   $this->SubCategory($current);
        // -- 列表信息
        $lists          =   $this->_blogQueryBuilder()->paginate(30);
        // -- 广告信息

        // -- 底部支持信息
//        dump($navs);
        return view( 'main', [
            'navs'      =>  $navs,
            'nav2'      =>  $nav2,
            'lists'     =>  $lists,
            'current'   =>  $current,
        ] );
    }

    public function detail (Request $request, $uuid)
    {
        // 当前文章信息提取
        if( !$info=Blog::find($uuid) ) throw new NotFoundHttpException('未找到此页面');
        // -- 一级分类信息
        $navs           =   $this->categoryClassA();
        // -- 二级分类信息
        $current        =   Relation::where('buuid',$uuid)->first()->cuuid;
        return view('detail',[
            'info'          =>  $info,
            'navs'          =>  $navs,
            'current'       =>  $current,
            'title'         =>  $info->title,
            'description'   =>  $info->short
        ]);
    }


    protected function _blogQueryBuilder($where=[],$fields=[])
    {
        $where = array_merge( [['b.status',1]],$where );
        return Blog::from('blog as b')->select(...$this->allowFields)
            ->leftjoin('blog_category_relation as r','b.uuid','=','r.buuid')
//            ->leftjoin('manage.manage_admin as a','a.uuid','=','b.createdby')
            ->where( $where );
    }
}
