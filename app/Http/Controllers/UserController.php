<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class UserController extends Controller
{
    public function profile (Request $request,$uuid)
    {
        // TODO 用户数据、导航信息、用户下文章列表
        // -- 用户数据
        if( !$profile=User::status()->find($uuid) )
            throw new NotFoundHttpException('用户不存在');
        // -- 导航信息
        $topnavs        =   $this->categorySubA();
        // -- 当前用户文章列表
        $blogs          =   $profile->blogs()->get();

        return view('user.profile',[
            'profile'       =>  $profile,
            'topnavs'       =>  $topnavs,
            'blogs'         =>  $blogs,
        ]);
    }
}
