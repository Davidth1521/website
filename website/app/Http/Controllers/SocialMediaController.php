<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SocialMediaController extends Controller
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
        return view('other.social_media');
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
        $skype_icon = $data['skype_icon'];
        $skype_link = $data['skype_link'];
        $googlePlus_icon = $data['googlePlus_icon'];
        $googlePlus_link = $data['googlePlus_link'];
        $twitter_icon = $data['twitter_icon'];
        $twitter_link = $data['twitter_link'];
        $linkedin_icon = $data['linkedin_icon'];
        $linkedin_link = $data['linkedin_link'];
        $facebook_icon = $data['facebook_icon'];
        $facebook_link = $data['facebook_link'];
        $status = 0;
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        /*SocialMedia::create([
            'skype_icon'=> $skype_icon,
            'skype_link'=>$skype_link ,
            'googlePlus_icon'=>$googlePlus_icon ,
            'googlePlus_link'=> $googlePlus_link,
            'twitter_icon'=>$twitter_icon ,
            'twitter_link'=> $twitter_link,
            'linkedin_icon'=> $linkedin_icon,
            'linkedin_link'=> $linkedin_link,
            'facebook_icon'=>$facebook_icon ,
            'status'=>$status ,
            'facebook_link'=>$facebook_link ,
        ]);*/
        Alert::success('موفقیت', 'فضای مجازی بروزرسانی شد');
        return redirect(route('social_media.create'));
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
