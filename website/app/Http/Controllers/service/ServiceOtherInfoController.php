<?php

namespace App\Http\Controllers\service;

use App\ServiceOtherInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceOtherInfoController extends Controller
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
        $item = ServiceOtherInfo::where('id',1)->first();
        if (isset($item)){
            return view('services.other-info.create',compact('item'));
        }else{
            return view('services.other-info.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
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
        $data = $request->except('_token');
        $item = ServiceOtherInfo::where('id',$id)->first();
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($item)){
            $item->update([
                'title1' => $data['title1'],
                'title2' => $data['title2'],
                'description1' => $data['description1'],
                'tabTitle1' => $data['tabTitle1'],
                'tabTitle2' => $data['tabTitle2'],
                'tabTitle3' => $data['tabTitle3'],
                'tabDesc1' => $data['tabDesc1'],
                'tabDesc2' => $data['tabDesc2'],
                'tabDesc3' => $data['tabDesc3'],
                'status' => $status,
            ]);
        }else{
            ServiceOtherInfo::create([
                'id'=>$id,
                'title1' => $data['title1'],
                'title2' => $data['title2'],
                'description1' => $data['description1'],
                'tabTitle1' => $data['tabTitle1'],
                'tabTitle2' => $data['tabTitle2'],
                'tabTitle3' => $data['tabTitle3'],
                'tabDesc1' => $data['tabDesc1'],
                'tabDesc2' => $data['tabDesc2'],
                'tabDesc3' => $data['tabDesc3'],
                'status' => $status,
            ]);
        }

        Alert::success('موفقیت', 'بخش اطلاعات دیگر خدمات ویرایش شد');
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
