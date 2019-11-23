<?php

namespace App\Http\Controllers\service;

use App\ServiceStep;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ServiceStep::all();
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
        return view('services.steps.list',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.steps.create');
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
        ServiceStep::create([
            'icon' => $data['icon'],
            'title' => $data['title'],
            'link' => $data['link'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'آیتم روند کاری خدمات ثبت شد');
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
        $item = ServiceStep::find($id);
        return view('services.steps.edit',compact('item'));
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
        $item = ServiceStep::find($id);
        $item->update([
            'icon' => $data['icon'],
            'title' => $data['title'],
            'link' => $data['link'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'آیتم روند کاری خدمات ویرایش شد');
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
        $item = ServiceStep::find($id);
        $item->delete();
        Alert::success('موفقیت', 'آیتم مورد نظر حذف شد');
        return redirect()->back();
    }
}
