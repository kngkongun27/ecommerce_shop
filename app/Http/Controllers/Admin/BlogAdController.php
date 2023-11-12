<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service\Blog\BlogServiceInterface;

class BlogAdController extends Controller
{
    private $blogService;
    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $blogs = $this->blogService
        ->searchAndPaginate('title', $request->get('search')) ;

        return view('admin.blog.index', [
            'blogs' => $blogs,
        ]);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $blogs = $this->blogService->all();

        return view('admin.blog.create', [
            // 'blogs' => $blogs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();

        $id_user = $this->blogService->getBlogByUserId(Auth::id());
        $data = [
            // 'id' => $request->id,
            'user_id' => 3,
            'title' => $request->title,
            'content' => $request->content,
            'image' => "Null",
            'category' => $request->category,



        ];
        // $data['user_id'] = $id
        // return $this->blogService;

        // return $data;

      
        $this->blogService->create($data);

        return redirect('admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $blog = $this->blogService->find($id);
        //     //return $product;
        // return view('admin.blog.index', [
        //     'blog' => $blog,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog  = $this->blogService->find($id);
        return view('admin.blog.edit', [
            'blog' => $blog,
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->blogService->update($data, $id);

        return redirect('admin/blog ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogService->delete($id);

        return redirect('admin/blog');
    }
}
