<?php

namespace App\Http\Controllers\index_page;

use App\Http\Controllers\MainController;
use App\Menu;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PrimaryController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        foreach ($menus as $menu) {
            $date = $menu->created_at;
            $parent_id = $menu->parent_id;
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
            $menu['dateTime'] = $dateFormat;
            $parent = Menu::find($parent_id);
            if (isset($parent)) {
                $menu['parent'] = $parent->title;
            }else{
                $menu['parent'] = 'والد';
            }
        }
        return view('index_page.menu.list', compact('menus'));
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
        return view('index_page.menu.create', compact('parent_menus'));
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
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        Menu::create([
            'title' => $data['title'],
            'link' => $data['link'],
            'parent_id' => $data['parent_id'],
            'status' => $status,
        ]);
        Alert::success('موفقیت', 'آیتم جدید منو ایجاد شد');
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
        $menu = Menu::find($id);
        $parent_menus = Menu::all();
        return view('index_page.menu.edit', compact('menu','parent_menus'));
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
        $menu = Menu::find($id);
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $menu->update([
            'title' => $data['title'],
            'link' => $data['link'],
            'parent_id' => $data['parent_id'],
            'status' => $status,
        ]);

        Alert::success('موفقیت', 'منو بروزرسانی شد');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Menu::find($id);
        $item->delete();
        Alert::success('موفقیت', 'منو مورد نظر حذف شد');
        return redirect()->back();
    }
}
