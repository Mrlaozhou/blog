<?php
namespace App\Observers;

use App\Models\Blog;

class BlogObserver
{
    /**
     * @ 查询监察
     * @param Blog $blog
     */
    public function retrieved (Blog $blog)
    {
        // 详情访问 clicks自增 1
//        $blog instanceof Blog && $blog->increment('clicks');
    }
}