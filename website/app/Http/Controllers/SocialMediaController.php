<?php

namespace App\Http\Controllers;

use App\SocialMedia;
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
        $item = SocialMedia::where('id',1)->first();
        if (isset($item)){
            return view('other.social_media',compact('item'));
        }else{
            return view('other.social_media');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = $request->except('_token');
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $item = SocialMedia::where('id',$id)->first();
        if (isset($item)){
            $item->update([
                'skype_icon'=> $data['skype_icon'],
                'skype_link'=>$data['skype_link'] ,
                'googlePlus_icon'=>$data['googlePlus_icon'] ,
                'googlePlus_link'=> $data['googlePlus_link'],
                'twitter_icon'=>$data['twitter_icon'] ,
                'twitter_link'=> $data['twitter_link'],
                'linkedin_icon'=> $data['linkedin_icon'],
                'linkedin_link'=> $data['linkedin_link'],
                'facebook_icon'=>$data['facebook_icon'] ,
                'facebook_link'=>$data['facebook_link'] ,
                'rss_link'=>$data['rss_link'] ,
                'rss_icon'=>$data['rss_icon'] ,
                'vimo_link'=>$data['vimo_link'] ,
                'vimo_icon'=>$data['vimo_icon'] ,
                'youtube_link'=>$data['youtube_link'] ,
                'youtube_icon'=>$data['youtube_icon'] ,
                'status'=>$status ,
            ]);
        }else{
            SocialMedia::create([
                'id'=>1,
                'skype_icon'=> $data['skype_icon'],
                'skype_link'=>$data['skype_link'] ,
                'googlePlus_icon'=>$data['googlePlus_icon'] ,
                'googlePlus_link'=> $data['googlePlus_link'],
                'twitter_icon'=>$data['twitter_icon'] ,
                'twitter_link'=> $data['twitter_link'],
                'linkedin_icon'=> $data['linkedin_icon'],
                'linkedin_link'=> $data['linkedin_link'],
                'facebook_icon'=>$data['facebook_icon'] ,
                'facebook_link'=>$data['facebook_link'] ,
                'rss_link'=>$data['rss_link'] ,
                'rss_icon'=>$data['rss_icon'] ,
                'vimo_link'=>$data['vimo_link'] ,
                'vimo_icon'=>$data['vimo_icon'] ,
                'youtube_link'=>$data['youtube_link'] ,
                'youtube_icon'=>$data['youtube_icon'] ,
                'status'=>$status ,
            ]);
        }

        Alert::success('موفقیت', 'فضای مجازی بروزرسانی شد');
        return redirect(route('social_media.create'));
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
