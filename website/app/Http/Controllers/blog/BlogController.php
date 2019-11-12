<?php

namespace App\Http\Controllers\blog;

use App\Blog;
use App\categoryBlog;
use App\Http\Controllers\MainController;
use App\tagBlog;
use Auth;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('status', 1)->get();
        foreach ($blogs as $blog) {
            $categories = $blog->categoryBlog;
            $cat_arr = [];
            foreach ($categories as $category) {
                array_push($cat_arr, $category->title);
            }
            $blog['categories'] = $cat_arr;
            $date = $blog->created_at;
            $v = new Verta($date);
            if ($v->day < 10 && $v->month < 10) {
                $dateFormat = $v->format('Y/0n/0j');
            } elseif ($v->day < 10 && $v->month > 10) {
                $dateFormat = $v->format('Y/n/0j');
            } elseif ($v->day > 10 && $v->month < 10) {
                $dateFormat = $v->format('Y/0n/j');
            } else {
                $dateFormat = $v->format('Y/n/j');
            }
            $blog['dateTime'] = $dateFormat;
        }
        return view('blog.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categoryBlog::where('status', '=', 1)->get();
        $tags = tagBlog::where('status', 1)->get();
        return view('blog.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = $request->except('_token');
        $file = $request->file('image');
        $thumbnail = $request->file('thumbnail');
        $imageAddress = '';
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/blog/', 1170, 501);
        }
        if (isset($thumbnail)) {
            $thumbnail = $this->ImageUploader($thumbnail, 'images/blog/thumbnail/', 150, 150);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $blog = Blog::create([
            'name' => $data['name'],
            'title' => $data['title'],
            'description' => $data['description'],
            'shortText' => $data['shortText'],
            'status' => $status,
            'image' => $imageAddress,
            'thumbnail' => $thumbnail,
            'author_id' => $user_id,
        ]);
        $blog->categoryBlog()->sync([$data['category_id']]);
        $blog->tagBlog()->sync([$data['tag_id']]);
        Alert::success('موفقیت', 'مقاله جدید ایجاد شد');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = categoryBlog::where('status', '=', 1)->get();
        $tags = tagBlog::where('status', 1)->get();
        foreach ($blog->categoryBlog as $cat) {
            $blog['cat'] = $cat->id;
        }
        foreach ($blog->tagBlog as $tag) {
            $blog['tag'] = $tag->id;
        }
        if (!is_null($blog->image) and ($blog->image != "")) {
            $blog['image'] = $blog->image;
        } else {
            $blog['image'] = 'fake_images/index.jpg';
        }
        return view('blog.edit', compact('blog', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $data = $request->except('_token');
        $file = $request->file('image');
        $thumbnail = $request->file('thumbnail');
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/blog/', 1170, 501);
            if (isset($thumbnail)) {
                $thumbnail = $this->ImageUploader($thumbnail, 'images/blog/thumbnail/', 150, 150);
                $blog->update([
                    'name' => $data['name'],
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'shortText' => $data['shortText'],
                    'status' => $status,
                    'thumbnail' => $thumbnail,
                    'image' => $imageAddress,
                ]);
            } else {
                $blog->update([
                    'name' => $data['name'],
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'shortText' => $data['shortText'],
                    'status' => $status,
                    'image' => $imageAddress,
                ]);
            }
        } else {
            $blog->update([
                'name' => $data['name'],
                'title' => $data['title'],
                'description' => $data['description'],
                'shortText' => $data['shortText'],
                'status' => $status,
            ]);
        }
        $blog->categoryBlog()->sync([$data['category_id']]);
        $blog->tagBlog()->sync([$data['tag_id']]);
        Alert::success('موفقیت', 'مقاله ویرایش ایجاد شد');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showCategory()
    {
        $categories = categoryBlog::where('status', '=', 1)->where('parent_id', 0)->get();
        $allCategories = categoryBlog::all(); // for list of categories in this page
        foreach ($allCategories as $category) {
            $date = $category->created_at;
            $v = new Verta($date);
            if ($v->day < 10 && $v->month < 10) {
                $dateFormat = $v->format('Y/0n/0j');
            } elseif ($v->day < 10 && $v->month > 10) {
                $dateFormat = $v->format('Y/n/0j');
            } elseif ($v->day > 10 && $v->month < 10) {
                $dateFormat = $v->format('Y/0n/j');
            } else {
                $dateFormat = $v->format('Y/n/j');
            }
            $category['dateTime'] = $dateFormat;
            $parent_id = $category->parent_id;
            if ($parent_id != 0) {
                $parent = categoryBlog::where('id', $parent_id)->first();
                $parent_name = $parent->title;
            } else {
                $parent_name = 'والد';
            }
            $category['parent_name'] = $parent_name;
        }
        return view('blog.addCategory', compact('categories', 'allCategories'));
    }

    public function showTag()
    {
        $allTags = tagBlog::all(); // for list of tags in this page
        foreach ($allTags as $tag) {
            $date = $tag->created_at;
            $v = new Verta($date);
            if ($v->day < 10 && $v->month < 10) {
                $dateFormat = $v->format('Y/0n/0j');
            } elseif ($v->day < 10 && $v->month > 10) {
                $dateFormat = $v->format('Y/n/0j');
            } elseif ($v->day > 10 && $v->month < 10) {
                $dateFormat = $v->format('Y/0n/j');
            } else {
                $dateFormat = $v->format('Y/n/j');
            }
            $tag['dateTime'] = $dateFormat;
        }
        return view('blog.addTag', compact('allTags'));
    }

    public function showCategoryEdit($id)
    {
        $cat = categoryBlog::find($id);
        $categories = categoryBlog::all();
        return view('blog.editCategory', compact('cat', 'categories'));
    }

    public function showTagEdit($id)
    {
        $tag = tagBlog::find($id);
        return view('blog.editTag', compact('tag'));
    }

    public function editCategory(Request $request, $id)
    {
        $cat = categoryBlog::find($id);
        $data = $request->except('_token');
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $cat->update([
            'title' => $data['title'],
            'parent_id' => $data['parent_id'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'دسته بروز شد');
        return redirect()->back();
    }

    public function editTag(Request $request, $id)
    {
        $tag = tagBlog::find($id);
        $data = $request->except('_token');
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $tag->update([
            'title' => $data['title'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'تگ بروز شد');
        return redirect()->back();

    }

    public function addCategory(Request $request)
    {
        $data = $request->except('_token');
        $title = $data['title'];
        $parent_id = $data['parent_id'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        categoryBlog::create([
            'title' => $title,
            'parent_id' => $parent_id,
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'دسته جدید ایجاد شد');
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
        tagBlog::create([
            'title' => $title,
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'تگ جدید ایجاد شد');
        return redirect()->back();
    }

    public function removeCategory(Request $request, $id)
    {

    }

    public function removeTag(Request $request, $id)
    {

    }

    public function search_blog(Request $request)
    {

    }
}
