<?php

namespace App\Http\Controllers\index_page;

use App\OurDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class OurDescriptionController extends Controller
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
        return view('index_page.our-description.ourDescription');
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
        $icon1 = $data['icon1'];
        $title1 = $data['title1'];
        $description1 = $data['description1'];

        $icon2 = $data['icon2'];
        $title2 = $data['title2'];
        $description2 = $data['description2'];

        $icon3 = $data['icon3'];
        $title3 = $data['title3'];
        $description3 = $data['description3'];

        $icon4 = $data['icon4'];
        $title4 = $data['title4'];
        $description4 = $data['description4'];

        $status = 0;
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        OurDescription::create([
            'icon1'=>$icon1,
            'title1'=>$title1,
            'description1'=>$description1,

            'icon2'=>$icon2,
            'title2'=>$title2,
            'description2'=>$description2,

            'icon3'=>$icon3,
            'title3'=>$title3,
            'description3'=>$description3,

            'icon4'=>$icon4,
            'title4'=>$title4,
            'description4'=>$description4,
            'status'=>$status,
        ]);
        Alert::success('موفقیت', 'توضیحات ما بروزرسانی شد');
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
