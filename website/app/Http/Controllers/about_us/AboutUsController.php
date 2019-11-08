<?php

namespace App\Http\Controllers\about_us;

use App\AboutUs;
use App\File;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutUsController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-us.create');
    }

    public function postImage(Request $request)
    {
        $file = $request->file('file');
        $address = $this->ImageUploader($file, 'images/about-us/', 548, 365);
         File::create([
            'address' => $address,
        ]);
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
//        $image1 = $request->file('image1');
//        $image2 = $request->file('image2');
//        $image3 = $request->file('image3');
        $title = $data['title'];
        $description = $data['description'];
        /* if (isset($image1)) {
             $imageAddress1 = $this->ImageUploader($image1, '/about-us/images/', 548, 365);
         }
         if (isset($image2)) {
             $imageAddress2 = $this->ImageUploader($image2, '/about-us/images/', 548, 365);
         }
         if (isset($image3)) {
             $imageAddress3 = $this->ImageUploader($image3, '/about-us/images/', 548, 365);
         }*/
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $about_us = AboutUs::where('id', 1)->get();
        if (count($about_us) > 0) {
            $about_us->update([
//                'image1' => $imageAddress1,
//                'image2' => $imageAddress2,
//                'image3' => $imageAddress3,
                'title' => $title,
                'description' => $description,
                'status' => $status,
            ]);
            Alert::success('موفقیت', 'آیتم درباره ما ویرایش شد');
        } else {
            AboutUs::create([
//                'image1' => $imageAddress1,
//                'image2' => $imageAddress2,
//                'image3' => $imageAddress3,
                'title' => $title,
                'description' => $description,
                'status' => $status,
            ]);
            Alert::success('موفقیت', 'آیتم درباره ما ایجاد شد');
        }
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
        //
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
        //
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
