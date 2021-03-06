<?php

namespace App\Http\Controllers\service;

use App\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hekmatinasser\Verta\Verta;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceCategoryController extends Controller
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
        $categories = ServiceCategory::where('parent_id',0)->get();
        $allCategories = ServiceCategory::all();
//        dd($categories);
        foreach ($allCategories as $category){
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
            if ($category->parent_id == 0){
                $category['parentName'] =  'والد';
            }else{
                $categoryParent = ServiceCategory::where('id',$category->parent_id)->first();
                $category['parentName'] =  $categoryParent->title;
            }
        }
        return view('services.category.create',compact('categories','allCategories'));
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
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        ServiceCategory::create([
            'title' => $data['title'],
            'parent_id' => $data['parent_id'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'دسته جدید ایجاد شد');
        return redirect()->back();
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
        $item = ServiceCategory::find($id);
        $categories = ServiceCategory::where('parent_id',0)->get();
        return view('services.category.edit',compact('item','categories'));
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
        $data = $request->except('_token');
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $item = ServiceCategory::find($id);
        $item->update([
            'title' => $data['title'],
            'parent_id' => $data['parent_id'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'دسته ویرایش شد');
        return redirect()->back();
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
}
