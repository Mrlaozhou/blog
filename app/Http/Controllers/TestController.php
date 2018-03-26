<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index (Request $request)
    {
        $test           =   Blog::status()->first()->auther()->get()->toArray();

        dump($test);

//        dump_sql( function(){
//            Blog::status()->first()->category()->get();
//        } );
    }
}
