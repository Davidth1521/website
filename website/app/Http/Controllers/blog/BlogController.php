<?php

namespace App\Http\Controllers\blog;

use App\Blog;
use App\BlogCategory;
use App\BlogTag;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class BlogController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::where('status','=',1)->where('parent_id',0)->get();
        $tags = BlogTag::where('status',1)->get();
        return view('blog.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $file = $request->file('image');
        $title = $data['title'];
        $name = $data['name'];
        $description = $data['description'];
        $category_id = $data['category_id'];
        $tag_id = $data['tag_id'];
        $shortText = $data['shortText'];
        $status = $data['status'];
        $imageAddress = '';
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/', 1063, 480);
        }
        $blog = Blog::create([
            'name'=>$name,
            'title'=>$title,
            'description'=>$description,
            'shortText'=>$shortText,
            'status'=>$status,
            'image'=>$imageAddress,
        ]);
        $blog->blogCategory()->sync([$category_id]);
        $blog->bloTag()->sync([$tag_id]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showCategory()
    {
        $categories = BlogCategory::where('status','=',1)->where('parent_id',0)->get();
        $allCategories = BlogCategory::all(); // for list of categories in this page
        return view('blog.addCategory',compact('categories','allCategories'));
    }

    public function showTag(){
        $allTags = BlogTag::all(); // for list of tags in this page
        return view('blog.addTag',compact('allTags'));
    }

    public function addCategory(Request $request)
    {
        $data = $request->except('_token');
        $title = $data['title'];
        $parent_id = $data['parent_id'];
        $status = 0;
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        BlogCategory::create([
            'title'=>$title,
            'parent_id'=>$parent_id,
            'status'=>$status,
        ]);
        return redirect()->back();
    }

    public function addTag(Request $request)
    {
        $data = $request->except('_token');
        $title = $data['title'];
        $status = 0;
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        BlogTag::create([
            'title'=>$title,
            'status'=>$status,
        ]);
        return redirect()->back();
    }

    public function removeCategory(Request $request,$id)
    {

    }

    public function removeTag(Request $request, $id)
    {

    }
}
