<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        // return $blogs;


        return view('front.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function getBlog()
    {
        $blogs = Blog::all();
        return $blogs;
    }
}
