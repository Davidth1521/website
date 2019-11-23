<?php

namespace App\Http\Controllers\about_us;

use App\Http\Controllers\MainController;
use App\Partner;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PartnerController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::where('status',1)->get();
        foreach ($partners as $item) {
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
        return view('about-us.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-us.partner.create');
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
            $imageAddress = $this->ImageUploader($file, 'images/partners/', 170, 100);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        Partner::create([
            'image' => $imageAddress,
            'title' => $data['title'],
            'link' => $data['link'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'شریک جدید ایجاد شد');
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
        $partner = Partner::find($id);
        return view('about-us.partner.edit', compact('partner'));
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
        $file = $request->file('image');
        $partner = Partner::find($id);
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/partners/', 170, 100);
            $partner->update([
                'image' => $imageAddress,
            ]);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }

        $partner->update([
            'title' => $data['title'],
            'link' => $data['link'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'شریک ویرایش شد');
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
        $item = Partner::find($id);
        $item->delete();
        Alert::success('موفقیت', 'آیتم مورد نظر حذف شد');
        return redirect()->back();
    }
}
