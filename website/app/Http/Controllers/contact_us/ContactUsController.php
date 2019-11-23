<?php

namespace App\Http\Controllers\contact_us;

use App\ContactUs;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends MainController
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
        $item = ContactUs::first();
        return view('contact-us.create',compact('item'));
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
        $contact_us = ContactUs::where('id',1)->first();
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/blog/', 'auto', 'auto');
            if (isset($contact_us)) {
                $contact_us->update([
                    'image' => $imageAddress,
                ]);
            }
        }

        if (isset($contact_us)){
            $contact_us->update([
                'address' => $data['address'],
                'site' => $data['site'],
                'email' => $data['email'],
                'tel' => $data['tel'],
                'mobile' => $data['mobile'],
                'telegram' => $data['telegram'],
                'instagram' => $data['instagram'],
                'twitter' => $data['twitter'],
                'linkedin' => $data['linkedin'],
                'facebook' => $data['facebook'],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'status' => $status,
            ]);
            Alert::success('موفقیت', 'تماس با ما ویرایش شد');
        }else{
            ContactUs::create([
                'image' => $imageAddress,
                'address' => $data['address'],
                'site' => $data['site'],
                'email' => $data['email'],
                'tel' => $data['tel'],
                'mobile' => $data['mobile'],
                'telegram' => $data['telegram'],
                'instagram' => $data['instagram'],
                'twitter' => $data['twitter'],
                'linkedin' => $data['linkedin'],
                'facebook' => $data['facebook'],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'status' => $status,
            ]);
            Alert::success('موفقیت', 'تماس با ما ایجاد شد');
        }
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
        //
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
        //
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
