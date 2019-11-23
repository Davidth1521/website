<?php

namespace App\Http\Controllers\portfolio;

use App\Http\Controllers\MainController;
use App\Portfolio;
use App\Portfolio_detail;
use App\PortfolioCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PortfolioController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioes  = Portfolio_detail::all();
        foreach ($portfolioes  as $item){
            $portfolio = Portfolio::where('detail_id',$item->id)->first();
            $item['category'] = PortfolioCategory::find($portfolio->category_id);
        }
        return view('portfolio.portfolio.index', compact('portfolioes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolioCategories = PortfolioCategory::all();
        return view('portfolio.portfolio.create', compact('portfolioCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $file = $request->file('image');
        $imageAddress = '';
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/portfolio', 770, 619);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $portfolio_detail = Portfolio_detail::create([
            'title' => $data['title'],
            'imageDescription' => $data['imageDescription'],
            'btnTitle' => $data['btnTitle'],
            'btnLink' => $data['btnLink'],
            'detailDescription' => $data['detailDescription'],
            'status' => $status,
            'image' => $imageAddress,
        ]);
        Portfolio::create([
            'status' => $status,
            'category_id' => $data['category_id'],
            'detail_id' => $portfolio_detail->id,
        ]);
        Alert::success('موفقیت', 'نمونه کار ایجاد شد');
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
        $portfolio = Portfolio_detail::find($id);
        $portfolioCategories = PortfolioCategory::all();
        $portfolio_main = Portfolio::where('detail_id',$portfolio->id)->first();
        $portfolio['category'] = PortfolioCategory::find($portfolio_main->category_id);
        return view('portfolio.portfolio.edit', compact('portfolioCategories','portfolio'));
    }

    /**
     * Update the specified resource in storage
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $file = $request->file('image');
        $portfolio_detail = Portfolio_detail::find($id);
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/portfolio', 770, 619);
            $portfolio_detail->update([
                'image'=>$imageAddress,
            ]);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $portfolio_detail->update([
            'title' => $data['title'],
            'imageDescription' => $data['imageDescription'],
            'btnTitle' => $data['btnTitle'],
            'btnLink' => $data['btnLink'],
            'detailDescription' => $data['detailDescription'],
            'status' => $status,
        ]);
        $portfolio = Portfolio::where('detail_id',$portfolio_detail->id)->first();
        $portfolio->update([
            'status' => $status,
            'category_id' => $data['category_id'],
            'detail_id' => $portfolio_detail->id,
        ]);
        Alert::success('موفقیت', 'نمونه کار ویرایش شد');
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
        $item = Portfolio_detail::find($id);
        $portfolio = Portfolio::where('detail_id',$item->id)->first();
        $item->delete();
        $portfolio->delete();
        Alert::success('موفقیت', 'آیتم مورد نظر حذف شد');
        return redirect()->back();
    }
}
