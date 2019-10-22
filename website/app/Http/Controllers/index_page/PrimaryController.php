<?php

namespace App\Http\Controllers\index_page;

use App\Header;
use App\Http\Controllers\MainController;
//use App\Menu;
use App\Menu;
use Illuminate\Http\Request;

class PrimaryController extends MainController
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
//        dd(1);
        $parent_menus = Menu::all();
        return view('index_page.header.index', compact('parent_menus'));
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
        $logo = $request->file('logo');
        $title = $data['title'];
        $link = $data['link'];
        $parent_id = $data['parent_id'];
        $status = 0;
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        if (isset($title) and isset($link)){
            Menu::create([
                'title' => $title,
                'link' => $link,
                'parent_id' => $parent_id,
                'status' => $status,
            ]);
        }
        if (isset($logo)) {
            $imageAddress = $this->ImageUploader($logo, 'images/', 123, 40);
            $row = Header::find(1);
            $row->update([
                'logo' => $imageAddress
            ]);
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
