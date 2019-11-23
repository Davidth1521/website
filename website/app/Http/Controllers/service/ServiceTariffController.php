<?php

namespace App\Http\Controllers\service;

use App\ServiceTariff;
use App\TariffDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Hekmatinasser\Verta\Verta;

class ServiceTariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tariffs = ServiceTariff::all();
        foreach ($tariffs as $tariff) {
            $date = $tariff->created_at;
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
            $tariff['dateTime'] = $dateFormat;
        }
        return view('services.tariff.list',compact('tariffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tariffs = ServiceTariff::where('status',1)->get();
        foreach ($tariffs as $tariff){
            $date = $tariff->created_at;
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
            $tariff['dateTime'] = $dateFormat;
        }

        return view('services.tariff.create',compact('tariffs'));
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
        ServiceTariff::create([
            'title' => $data['title'],
            'price' => $data['price'],
            'linkTitle' => $data['linkTitle'],
            'link' => $data['link'],
            'per' => $data['per'],
            'unit' => $data['unit'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'تعرفه ایجاد شد');
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
        $tariff = ServiceTariff::find($id);
        return view('services.tariff.edit',compact('tariff'));
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
//        dd($data);
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $tariff = ServiceTariff::find($id);
        $tariff->update([
            'title' => $data['title'],
            'price' => $data['price'],
            'linkTitle' => $data['linkTitle'],
            'link' => $data['link'],
            'per' => $data['per'],
            'unit' => $data['unit'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'تعرفه ویرایش شد');
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
        $item = ServiceTariff::find($id);
        $details = TariffDetail::where('tariff_id',$item->id)->get();
        if (count($details) > 0){
            foreach ($details as $detail){
                $detail->delete();
            }
        }
        $item->delete();
        Alert::success('موفقیت', 'آیتم مورد نظر حذف شد');
        return redirect()->back();
    }
}
