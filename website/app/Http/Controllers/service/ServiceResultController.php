<?php

namespace App\Http\Controllers\service;

use App\Portfolio;
use App\PortfolioCategory;
use App\ServiceAbout;
use App\ServiceResult;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ServiceResult::all();
        foreach ($items as $item) {
            $date = $item->created_at;
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
            $item['dateTime'] = $dateFormat;
        }
        return view('services.result.list',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.result.create');
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
        $icon = $data['icon'];
        $number = $data['number'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        ServiceResult::create([
            'icon' => $icon,
            'title' => $title,
            'status' => $status,
            'number' => $number,
        ]);
        Alert::success('موفقیت', 'آیتم نتایج خدمات ثبت شد');
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
        $item = ServiceResult::find($id);
        return view('services.result.edit',compact('item'));
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
        $item = ServiceResult::find($id);
        $item->update([
            'icon' => $data['icon'],
            'title' => $data['title'],
            'number' => $data['number'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'آیتم نتایج خدمات ویرایش شد');
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
        $portfolios = Portfolio::where('category_id',$item->id)->get();
        if (count($portfolios) > 0){
            foreach ($portfolios as $portfolio){
                $portfolio->update([
                    'category_id'=>0
                ]);
            }
        }
        $item->delete();
        Alert::success('موفقیت', 'آیتم مورد نظر حذف شد');
        return redirect()->back();
    }
}
