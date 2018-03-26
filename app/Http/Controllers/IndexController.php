<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\{Blog,Category,Relation};
use App\Http\Controllers\Blog\Category as CategoryController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\Exception\NotFoundResourceException;


class IndexController extends Controller
{
    use CategoryController;
    protected $allowFields = ['b.uuid','b.title','b.short','b.cover','b.oppose','b.agree','b.createdby','b.publishedtime','b.publishedtype','b.clicks'

    ];

    public function main (Request $request)
    {
        // TODO 顶级分类信息、当前分类的顶级分类下的二级分类、当前分类及子分类下文章列表
        // -- 默认显示分类 PHP
        $current        =   'A04D0131A0467228B4BF7903194A4268';

        return $this->category($request,$current);
    }

    /**
     * @ 详情页
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail (Request $request, $uuid)
    {
        // TODO 当前文章详细信息、顶级导航栏信息、二级导航信息
        if( !$info = Blog::find($uuid) )
            throw new NotFoundResourceException('页面走丢');
//        // -- 详细信息配置
//        $info->auther       =   $info->auther()->first()->toArray();
//        $info->categories   =   $info->categories()->get()->toArray();
        // -- 顶级导航信息
        $tops               =   $this->categorySubA();

        return view('detail',[
            'topnavs'       =>  $tops,
            'info'          =>  $info,
            'user'          =>  $info->auther,
            'title'         =>  $info->title,
        ]);
    }
}
