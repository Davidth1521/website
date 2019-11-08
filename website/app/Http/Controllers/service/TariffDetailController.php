<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use App\ServiceTariff;
use App\TariffDetail;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TariffDetailController extends Controller
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
        $tariffs = ServiceTariff::where('status', 1)->get();
        $tariffDetails = TariffDetail::all();
        foreach ($tariffDetails as $tariffDetail) {
            $date = $tariffDetail->created_at;
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
            $tariffDetail['dateTime'] = $dateFormat;
            $parent_id = $tariffDetail->tariff_id;
            if ($parent_id != 0) {
                $parent = ServiceTariff::where('id', $parent_id)->first();
                $tariffDetail['parentName'] = $parent->title;
            } else {
                $tariffDetail['parentName'] = 'متعلق به تعرفه ای نیست';
            }

        }
        return view('services.tariff.tariff_detail', compact('tariffs', 'tariffDetails'));
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
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        TariffDetail::create([
            'attribute' => $data['attribute'],
            'tariff_id' => $data['tariff_id'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'جزئیات دسته مورد نظر ایجاد شد');
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
        $tariffDetail = TariffDetail::find($id);
        $tariffs = ServiceTariff::where('status', 1)->get();
        return view('services.tariff.tariff_detail_edit', compact('tariffs', 'tariffDetail'));
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
        $data = $request->except('_token');
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $tariff_detail = TariffDetail::find($id);
        $tariff_detail->update([
            'attribute' => $data['attribute'],
            'tariff_id' => $data['tariff_id'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'جزئیات دسته مورد نظر ویرایش شد');
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
}
