<?php

namespace App\Http\Controllers\about_us;

use App\Http\Controllers\MainController;
use App\OurTeam;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OurTeamController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourTeams = OurTeam::all();
        foreach ($ourTeams as $item) {
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
        return view('about-us.our-team.index',compact('ourTeams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-us.our-team.create');
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
        $name = $data['name'];
        $role = $data['role'];
        $facebook_link = $data['facebook_link'];
        $facebook_icon = $data['facebook_icon'];
        $twitter_link = $data['twitter_link'];
        $twitter_icon = $data['twitter_icon'];
        $linkedin_link = $data['linkedin_link'];
        $linkedin_icon = $data['linkedin_icon'];
        $description = $data['description'];
        $imageAddress = '';
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/ourTeam/', 100, 100);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        OurTeam::create([
            'name'=>$name,
            'role'=>$role,
            'facebook_link'=>$facebook_link,
            'facebook_icon'=>$facebook_icon,
            'twitter_link'=>$twitter_link,
            'twitter_icon'=>$twitter_icon,
            'linkedin_link'=>$linkedin_link,
            'linkedin_icon'=>$linkedin_icon,
            'description'=>$description,
            'image'=>$imageAddress,
            'status'=>$status,
        ]);
        Alert::success('موفقیت', 'آیتم تیم ما ایجاد شد');
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
        $ourTeam = OurTeam::find($id);
        return view('about-us.our-team.edit',compact('ourTeam'));
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

        $ourTeam = OurTeam::find($id);
        $data = $request->except('_token');
        $file = $request->file('image');
        $name = $data['name'];
        $role = $data['role'];
        $facebook_link = $data['facebook_link'];
        $facebook_icon = $data['facebook_icon'];
        $twitter_link = $data['twitter_link'];
        $twitter_icon = $data['twitter_icon'];
        $linkedin_link = $data['linkedin_link'];
        $linkedin_icon = $data['linkedin_icon'];
        $description = $data['description'];
        if (isset($file)) {
            $imageAddress = $this->ImageUploader($file, 'images/ourTeam/', 100, 100);
            $ourTeam->update([
                'image'=>$imageAddress,
            ]);
        }
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $ourTeam->update([
            'name'=>$name,
            'role'=>$role,
            'facebook_link'=>$facebook_link,
            'facebook_icon'=>$facebook_icon,
            'twitter_link'=>$twitter_link,
            'twitter_icon'=>$twitter_icon,
            'linkedin_link'=>$linkedin_link,
            'linkedin_icon'=>$linkedin_icon,
            'description'=>$description,
            'status'=>$status,
        ]);
        Alert::success('موفقیت', 'آیتم تیم ما ویرایش شد');
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
