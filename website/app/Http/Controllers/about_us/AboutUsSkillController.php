<?php

namespace App\Http\Controllers\about_us;

use App\AboutUsSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AboutUsSkillController extends Controller
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

        $about = AboutUsSkill::where('id',1)->first();
        return view('about-us.index-page',compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $about = AboutUsSkill::where('id',$id)->first();
        $data = $request->except('_token');
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($about)){
            $about->update([
                'leftHeader'=>$data['leftHeader'],
                'rightHeader'=>$data['rightHeader'],
                'whyUs1'=>$data['whyUs1'],
                'whyUs2'=>$data['whyUs2'],
                'whyUs3'=>$data['whyUs3'],
                'skillTitle1'=>$data['skillTitle1'],
                'skillTitle2'=>$data['skillTitle2'],
                'skillTitle3'=>$data['skillTitle3'],
                'skillTitle4'=>$data['skillTitle4'],
                'skillTitle5'=>$data['skillTitle5'],
                'skillTitle1Percent'=>$data['skillTitle1Percent'],
                'skillTitle2Percent'=>$data['skillTitle2Percent'],
                'skillTitle3Percent'=>$data['skillTitle3Percent'],
                'skillTitle4Percent'=>$data['skillTitle4Percent'],
                'skillTitle5Percent'=>$data['skillTitle5Percent'],
                'headerDescription'=>$data['headerDescription'],
                'whyUs1Description'=>$data['whyUs1Description'],
                'whyUs2Description'=>$data['whyUs2Description'],
                'whyUs3Description'=>$data['whyUs3Description'],
                'status'=>$status,
            ]);


            Alert::success('موفقیت', 'درباره ما بروزرسانی شد');
            return redirect()->back();
        }else{
            AboutUsSkill::create([
                'leftHeader'=>$data['leftHeader'],
                'rightHeader'=>$data['rightHeader'],
                'whyUs1'=>$data['whyUs1'],
                'whyUs2'=>$data['whyUs2'],
                'whyUs3'=>$data['whyUs3'],
                'skillTitle1'=>$data['skillTitle1'],
                'skillTitle2'=>$data['skillTitle2'],
                'skillTitle3'=>$data['skillTitle3'],
                'skillTitle4'=>$data['skillTitle4'],
                'skillTitle5'=>$data['skillTitle5'],
                'skillTitle1Percent'=>$data['skillTitle1Percent'],
                'skillTitle2Percent'=>$data['skillTitle2Percent'],
                'skillTitle3Percent'=>$data['skillTitle3Percent'],
                'skillTitle4Percent'=>$data['skillTitle4Percent'],
                'skillTitle5Percent'=>$data['skillTitle5Percent'],
                'headerDescription'=>$data['headerDescription'],
                'whyUs1Description'=>$data['whyUs1Description'],
                'whyUs2Description'=>$data['whyUs2Description'],
                'whyUs3Description'=>$data['whyUs3Description'],
                'status'=>$status,
            ]);
        }


        Alert::success('موفقیت', 'درباره ما ایجاد شد');
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
