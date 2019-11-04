<?php

namespace App\Http\Controllers\index_page;

use App\CustomerSay;
use App\Http\Controllers\MainController;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerSayController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CustomerSay::all();
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
        return view('index_page.customer-say.list',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index_page.customer-say.create');
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
        $imageAddress = '';
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/customerSay/', 1063, 480);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        CustomerSay::create([
            'title'=>$data['title'],
            'subTitle'=>$data['subTitle'],
            'description'=>$data['description'],
            'image'=>$imageAddress,
            'status'=>$status,
        ]);
        Alert::success('موفقیت', 'سخن مشتریان ایجاد شد');
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
        $item = CustomerSay::find($id);
        if (!is_null($item->image) and ($item->image != "")){
            $item['image'] = $item->image;
        }else{
            $item['image'] = 'fake_images/index.jpg';
        }
        return view('index_page.customer-say.edit',compact('item'));
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
        $file = $request->file('image');
        $item = CustomerSay::find($id);
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/customerSay/', 1063, 480);
            $item->update([
                'title'=>$data['title'],
                'subTitle'=>$data['subTitle'],
                'description'=>$data['description'],
                'image'=>$imageAddress,
                'status'=>$status,
            ]);
        }else{
            $item->update([
                'title'=>$data['title'],
                'subTitle'=>$data['subTitle'],
                'description'=>$data['description'],
                'status'=>$status,
            ]);
        }
        Alert::success('موفقیت', 'سخن مشتریان ویرایش شد');
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
