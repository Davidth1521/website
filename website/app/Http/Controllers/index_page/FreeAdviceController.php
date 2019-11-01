<?php

namespace App\Http\Controllers\index_page;

use App\FreeAdvice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class FreeAdviceController extends Controller
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
        $item = FreeAdvice::where('id', 1)->get()->first();
        if (isset($item)){
            return view('index_page.free_advice.create', compact('item'));
        }else{
            return view('index_page.free_advice.create');
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
        $item = FreeAdvice::where('id', $id)->get()->first();
        $description = $data['description'];
        $link = $data['link'];
        $btnTitle = $data['btnTitle'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($item)){
            $item->update([
                'description'=>$description,
                'link'=>$link,
                'status'=>$status,
                'btnTitle'=>$btnTitle,
            ]);
            Alert::success('موفقیت', 'مشاوره رایگان بروزرسانی شد');
        }else{
            FreeAdvice::create([
                'description'=>$description,
                'link'=>$link,
                'status'=>$status,
                'btnTitle'=>$btnTitle,
            ]);
            Alert::success('موفقیت', 'مشاوره رایگان ایجاد شد');
        }
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
