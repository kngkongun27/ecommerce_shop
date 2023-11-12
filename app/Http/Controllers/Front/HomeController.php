<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Product\ProductServiceInterface;
use Cookie;

class HomeController extends Controller
{
    //
     private $productService;
     private $blogService;

     public function __construct(ProductServiceInterface $productService,
                                                    BlogServiceInterface $blogService  ) {
        $this->productService = $productService;
        $this->blogService = $blogService;
     }
    public function index() {
        $ProdBlog = array();
        $featuredProducts  = $this->productService->getFeaturedProducts();
        $blogs = $this->blogService->getLatestBlogs();

        $ProdBlog[0] = $featuredProducts;
        $ProdBlog[1] = $blogs;
        $lang = Cookie::get('lang');


        // return $ProdBlog;

        return view('front.index', compact('featuredProducts', 'blogs', 'lang' ));
    }

    public function switchlang($lang)
    {
        if ($lang == "en") {
            Cookie::queue('lang', 'en');
            return redirect('/');
        } else {
            Cookie::queue('lang', 'vn');
            return redirect('/');
        }
    }
}
