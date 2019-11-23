<?php

namespace App\Http\Controllers\portfolio;

use App\PortfolioCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioCategories = PortfolioCategory::all();
        return view('portfolio.category.index',compact('portfolioCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.category.create');
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
        $title = $data['title'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        PortfolioCategory::create([
            'title'=>$title,
            'status'=>$status
        ]);
        Alert::success('موفقیت', 'دسته نمونه کار ایجاد شد');
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
        $portfolioCategory = PortfolioCategory::find($id);
        return view('portfolio.category.edit',compact('portfolioCategory'));
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
        $title = $data['title'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $portfolioCategory = PortfolioCategory::find($id);
        $portfolioCategory->update([
            'title'=>$title,
            'status'=>$status
        ]);
        Alert::success('موفقیت', 'دسته نمونه کار ویرایش شد');
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
        $item = PortfolioCategory::find($id);
        $item->delete();
        Alert::success('موفقیت', 'آیتم مورد نظر حذف شد');
        return redirect()->back();
    }
}
