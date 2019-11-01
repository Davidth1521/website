<?php

namespace App\Http\Controllers\contact_us;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
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
        return view('contact-us.create');
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
        $about_us = ContactUs::where('id',1)->get();
        if (count($about_us) > 0){
            $about_us->update([
                'title' => $data['title'],
                'subTitle' => $data['subTitle'],
                'detailTitle' => $data['detailTitle'],
                'emailIcon' => $data['emailIcon'],
                'emailTitle' => $data['emailTitle'],
                'addressIcon' => $data['addressIcon'],
                'addressTitle' => $data['addressTitle'],
                'websiteIcon' => $data['websiteIcon'],
                'websiteTitle' => $data['websiteTitle'],
                'phoneIcon' => $data['phoneIcon'],
                'phoneTitle' => $data['phoneTitle'],
                'faxIcon' => $data['faxIcon'],
                'faxTitle' => $data['faxTitle'],
                'status' => $status,
            ]);
            Alert::success('موفقیت', 'تماس با ما ویرایش شد');
        }else{
            ContactUs::create([
                'title' => $data['title'],
                'subTitle' => $data['subTitle'],
                'detailTitle' => $data['detailTitle'],
                'emailIcon' => $data['emailIcon'],
                'emailTitle' => $data['emailTitle'],
                'addressIcon' => $data['addressIcon'],
                'addressTitle' => $data['addressTitle'],
                'websiteIcon' => $data['websiteIcon'],
                'websiteTitle' => $data['websiteTitle'],
                'phoneIcon' => $data['phoneIcon'],
                'phoneTitle' => $data['phoneTitle'],
                'faxIcon' => $data['faxIcon'],
                'faxTitle' => $data['faxTitle'],
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
