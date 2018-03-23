<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\{Blog,Category,Relation};
use App\Http\Controllers\Blog\Category as CategoryController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    use CategoryController;
    protected $allowFields = ['b.uuid','b.title','b.short','b.cover','b.oppose','b.agree','b.createdby','b.publishedtime','b.publishedtype','b.clicks'

    ];

    protected $allowFields2 = ['b.uuid','b.title','b.short','b.cover','b.oppose','b.agree','b.createdby','b.publishedtime','b.publishedtype','b.clicks'
        ,'a.username','a.avatar'
    ];


    /**@ 主页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main (Request $request)
    {
        // TODO 获取导航栏信息、列表信息、广告位信息、底部支持信息
        // -- 一级分类信息
        $navs           =   $this->categoryClassA();
        // -- 二级默认分类信息
        $current        =   'A04D0131A0467228B4BF7903194A4268';
        $nav2           =   $this->SubCategory($current);
        // -- 列表信息
        $lists          =   $this->_blogQueryBuilder()->orderByDesc('b.publishedtype')->paginate(30);
        // -- 广告信息

        // -- 底部支持信息
//        dump($navs);
        return view( 'main', [
            'navs'      =>  $navs,
            'nav2'      =>  $nav2,
            'lists'     =>  $lists,
            'current'   =>  $current,
            'current2'  =>  ''
        ] );
    }

    /**
     * @ 详情页
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail (Request $request, $uuid)
    {
        // 当前文章信息提取
        if( !$info=Blog::find($uuid) ) throw new NotFoundHttpException('未找到此页面');
        // -- 一级分类信息
        $navs           =   $this->categoryClassA();
        // -- 二级分类信息
        $current        =   Relation::where('buuid',$uuid)->first()->cuuid;
        // -- 用户信息
        $user           =   $info->admin;

        return view('detail',[
            'info'          =>  $info,
            'navs'          =>  $navs,
            'current'       =>  $current,
            'title'         =>  $info->title,
            'description'   =>  $info->short,
            'user'          =>  $user,
        ]);
    }


    protected function _blogQueryBuilder($where=[],$fields=[])
    {
        // whereIn 条件
        $whereIn        =   array_filter($where['in'] ?? []);

        // where条件
        $where          =   array_filter(array_merge( $where['where'] ?? [[]], [ ['b.status',1] ] ));
        $builder =  Blog::from('blog as b')->select(...$this->allowFields)
            ->leftjoin('blog_category_relation as r','b.uuid','=','r.buuid');
//            ->leftjoin('a','a.uuid','=','b.createdby');
        $where && $builder->where( $where );
        $whereIn && $builder->whereIn( ...$whereIn );
        return $builder;
    }
}
