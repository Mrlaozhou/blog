<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index (Request $request)
    {
        $test           =   Category::all()->toTrees();

        dump($test);
    }
}
