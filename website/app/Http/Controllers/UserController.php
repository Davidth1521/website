<?php

namespace App\Http\Controllers;

use App\MenuDynamicTable;
use App\Role;
use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
//        if ($this->authorize('admin_section') != null){
//            $this->authorize('adminList');
//            $user = auth()->user();
//            $role = $user->roles()->get()->first();
//            $roleName = $role['name'];
//            if ($roleName == 'super admin'){
                $admins = User::all();
                foreach ($admins as $admin){
                    $admin['role'] = $admin->roles()->first();
                }
//            }else{
//                $admins = User::where('type','user')->paginate(10);
//            }
            return view('users.list',compact('admins'));
        /*}else{
            return redirect(route('/error/404'));
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
//        $this->authorize('admin_section');
//        $this->authorize('adminCreate');
        $user = auth()->user();
        $role = $user->roles()->get()->first();
        $roleName = $role['name'];
        $roles = Role::all();
        return view('users.insert',compact('roles','roleName'));
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
        if (isset($data['type'])) {
            $type = 1;
        } else {
            $type = 0;
        }
        $name = $data['name'];
        $password= $data['password'];
        $password = bcrypt($password);
        $email = $data['email'];
        if (isset($data['roleId'])){
            $roleId = $data['roleId'];
        }else{
            $roleId = 0;
        }
        if ($data['password'] == $data['confirm']){
            $user = User::create(['name'=>$name,'password'=> $password, 'email'=>$email,'type'=>$type]);
//            $user->roles()->wherePivot('user_id','=',$user->id)->detach();
            if ($roleId != 0){
                $user->roles()->attach($roleId);
            }
            Alert::success('موفقیت', 'کاربر جدید ایجاد شد');

        }else{
            Alert::success('عدم موفقیت', 'کاربر جدید ایجاد نشد');
        }
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
//        $this->authorize('admin_section');

//        $user = auth()->user();
//        $roles = Role::all();
        $admin = User::find($id);
        $role = $admin->roles()->first();
        $roleName = $role['name'];
//        $admin = User::find($id);
//        if($admin['type'] == 'admin'){
            /*$menus = MenuDynamicTable::all()->toArray();
            $one = array_slice($menus, 0, 3);
            $two = array_slice($menus, 3, 3);
            $three = array_slice($menus, 6, 3);
            $four = array_slice($menus, 9, 3);
            $five = array_slice($menus, 12, 3);*/
            $roles = Role::all();
//            $admin['role_id'] = $admin->roles()->first()->id;
//            dd($admin['role_id']);
//            $roleId = $admin1['pivot']['role_id'];
//            $role = $admin->roles()->get()->first();
            $permissions =  $role->permissions()->get();
//        dd($permissions);
//        }
//        dd($roleName);
        return view('users.edit',compact('admin','roles','permissions','roleName','role'));
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
        if (isset($data['type'])) {
            $type = 1;
        } else {
            $type = 0;
        }
        $name = $data['name'];
        $email = $data['email'];
        $roleId = $data['roleId'];
        if (isset($type) and $data['password'] != ""){
            $password = bcrypt($data['password']);
            User::where('id',$id)->update([
                'password'=> $password
            ]);
        }
        User::where('id',$id)->update(['name'=>$name,'email'=>$email,'type'=>$type]);
        $user = User::find($id);
        $user->roles()->wherePivot('user_id','=',$user->id)->detach();
        $user->roles()->attach($roleId);
        Alert::success('موفقیت', 'کاربر ویرایش شد');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $item = User::find($id);
        $roles = $item->roles->all();
        if (count($roles) > 0){
            foreach ($roles as $role){
                $item->roles()->wherePivot('role_id', '=', $role->id)->detach();
            }
        }
        $item->delete();
        Alert::success('موفقیت', 'کاربر مورد نظر حذف شد');
        return redirect()->back();
    }


    /*public function activation($token)
    {
        $activationCode = ActivationCode::all()->where('code',$token)->first();
        if (! $activationCode){
            dd('not exists');
        }

        if ($activationCode->expire < Verta::now()){
            dd('expire');
        }

        if ($activationCode->used == true){
            dd('used');
        }
        $activationCode->update([
            'used' => true
        ]);
        $userId = $activationCode->userId;
        $user = User::findOrNew($userId);
        $user->update(['active'=>1]);
        auth()->loginUsingId($userId);
        return redirect('/');
    }*/

    /*public function multiRemove(Request $request)
    {
        $ids = $request['allCheckedSelect'];
        foreach ($ids as $id) {
            User::where('id', $id)->delete();
        }
//        $admin = User::paginate(10);
        $admin= User::all();
        foreach ($admin as $a){
//                return $admin->roles()->get()->first();
            $a['role'] = $a->roles()->get()->first();
        }
        return response()->json(['delete' => 'success', 'admin' => $admin]);
    }

    public function singleRemove(Request $request)
    {
        $id = $request['adminId'];
        User::where('id', $id)->delete();
        $admin = User::all();
        foreach ($admin as $a){
//                return $admin->roles()->get()->first();
            $a['role'] = $a->roles()->get()->first();
        }
        return response()->json(['delete' => 'success', 'admin' => $admin]);
    }

    public function searchTitle(Request $request)
    {
        $title = $request['value'];

        if (sizeof($title)>0){
            $admin = DB::table('users')
                ->where('name', 'like', "%$title%")
                ->get();
        }else{
            $admin = User::all();
        }
        foreach ($admin as $a){
//                return $admin->roles()->get()->first();
            $a['role'] = $a->roles()->get()->first();
        }
        $size = count($admin);

        return response()->json(['arrive' => 'success', 'admin' => $admin,'size'=>$size]);
    }*/


}
