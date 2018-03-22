<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index (Request $request)
    {
        $test = Admin::find('195981127530E628ED488680CE94DD6A')->toArray();

        dump($test);
    }
}
