<?php

namespace App\Http\Controllers\contact_us;

use App\Message;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller
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
        $messages = Message::all();
        foreach ($messages as $message){
            $date = $message->created_at;
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
            $message['dateTime'] = $dateFormat;
        }

        return view('contact-us.message',compact('messages'));
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
        Message::create([
            'title'=>$data['title'],
            'status'=>$data['status'],
            'fullName'=>$data['fullName'],
            'email'=>$data['email'],
            'message'=>$data['message'],
        ]);
        Alert::success('موفقیت', 'پیام شما ارسال شد');
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
        $message = Message::find($id);
        return view('contact-us.edit_message',compact('id','message'));
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
        $message = Message::find($id);
        $message->update([
            'title'=>$data['title'],
            'status'=>$data['status'],
            'fullName'=>$data['fullName'],
            'email'=>$data['email'],
            'message'=>$data['message'],
        ]);
        Alert::success('موفقیت', 'پیام بروز شد');
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
        $item = Message::find($id);
        $item->delete();
        Alert::success('موفقیت', 'آیتم مورد نظر حذف شد');
        return redirect()->back();
    }

    public function message_search(Request $request)
    {
        $data = $request->except('_token');
        $data = $data['search'];
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            dd('is email');
        }else{
            dd('not email');
        }
    }
}
