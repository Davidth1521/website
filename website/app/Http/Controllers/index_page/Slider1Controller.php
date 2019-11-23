<?php

namespace App\Http\Controllers\index_page;

use App\Http\Controllers\MainController;
use App\Slider1;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Slider1Controller extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider1::all();
        foreach ($sliders as $slider) {
            $date = $slider->created_at;
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
            $slider['dateTime'] = $dateFormat;
            if (!is_null($slider->image) and ($slider->image != "")){
                $slider['image'] = $slider->image;
            }else{
                $slider['image'] = 'fake_images/index.jpg';
            }
        }
            return view('index_page.slider1.list',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index_page.slider1.create');
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
            $imageAddress = $this->ImageUploader($file, 'images/slider1/', 1315, 455);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        Slider1::create([
            'title'=>$data['title'],
            'btnTitle'=>$data['btnTitle'],
            'btnLink'=>$data['btnLink'],
            'description'=>$data['description'],
            'image'=>$imageAddress,
            'status'=>$status,
        ]);
        Alert::success('موفقیت', 'اسلایدر ایجاد شد');
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
        $slider = Slider1::find($id);
        if (!is_null($slider->image) and ($slider->image != "")){
            $slider['image'] = $slider->image;
        }else{
            $slider['image'] = 'fake_images/index.jpg';
        }

        return view('index_page.slider1.edit',compact('slider'));
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
        $slider = Slider1::find($id);
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/slider1/', 1315, 455);
            $slider->update([
                'title'=>$data['title'],
                'btnTitle'=>$data['btnTitle'],
                'btnLink'=>$data['btnLink'],
                'description'=>$data['description'],
                'image'=>$imageAddress,
                'status'=>$status,
            ]);
        }else{
            $slider->update([
                'title'=>$data['title'],
                'btnTitle'=>$data['btnTitle'],
                'btnLink'=>$data['btnLink'],
                'description'=>$data['description'],
                'status'=>$status,
            ]);
        }
        Alert::success('موفقیت', 'اسلایدر ویرایش شد');
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
        $item = Slider1::find($id);
        $item->delete();
        Alert::success('موفقیت', 'اسلایدر مورد نظر حذف شد');
        return redirect()->back();
    }
}
