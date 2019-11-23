<?php

namespace App\Http\Controllers;

use App\MenuDynamicTable;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $roles = Permission::where('unique_name','primary_page')->first()->roles;
//        dd(auth()->user()->hasRole('super admin'));
//        return $roles;
//        $p = Permission::where('unique_name','primary_page')->first();
//        return $p->roles()->get();
//        dd(auth()->user()->hasRole($roles));
        
        
        
        /*$this->authorize('roles_section');
        $roles = Role::paginate(10);
        return view('admin.roles.list',compact('roles'));*/


//        if ($this->authorize('roles_section') != null) {
//            $this->authorize('roles_section');
            $roles = Role::paginate(10);
            $users = User::where('status',1)->get();
            return view('roles.list',compact('roles','users'));
//        }else{
//            return redirect(route('error', ['id' => 404]));
//        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
//        if (($this->authorize('roles_section') != null) and ($this->authorize('adminCreate') != null)) {
//            $this->authorize('roles_section');
            $users = User::all()->toArray();
            $permissions= Permission::all()->toArray();
            $menus = MenuDynamicTable::all();
//            return count($menus);
           /* $one = array_slice($menus, 0, 3);
            $two = array_slice($menus, 3, 3);
            $three = array_slice($menus, 6, 3);
            $four = array_slice($menus, 9, 3);
            $five = array_slice($menus, 12, 3);*/
//            return view('admin.roles.insert',compact('users', 'permissions','one','two','three','four','five'));
            return view('roles.create',compact('users', 'permissions','menus'));
        /*}else{
            return redirect(route('error', ['id' => 404]));
        }*/
        
        
        
       /* $this->authorize('roles_section');
        $users = User::all()->toArray();
        $permissions= Permission::all()->toArray();
        $menus = MenuDynamicTable::all()->toArray();
        $one = array_slice($menus, 0, 3);
        $two = array_slice($menus, 3, 3);
        $three = array_slice($menus, 6, 3);
        $four = array_slice($menus, 9, 3);
        $five = array_slice($menus, 12, 3);
        return view('admin.roles.insert',compact('users', 'permissions','one','two','three','four','five'));*/
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
        $name = $data['name'];
        $label = $data['label'];
//        $user= $data['user'];
//        $permissions = $data['permission'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        Role::create([
            'name'=>$name,
            'label'=>$label,
            'status'=>$status
        ]);
        /*foreach ($permissions as $permission){
            $permission = (int)$permission;
            $role->permissions()->attach($permission);
        }*/
//        $role->users()->attach($user);
        Alert::success('موفقیت', 'نقش جدید ایجاد شد');
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
       /* echo '<pre>';
        var_dump($this->authorize('adminEdit'));
        echo '</pre>';
        echo '<pre>';
        var_dump($this->authorize('roles_section'));
        echo '</pre>';

        die();*/
//        if (($this->authorize('roles_section') != null) or ($this->authorize('adminEdit') != null)) {
//            $this->authorize('roles_section');

        $users = User::all()->toArray();
            $permissions= Permission::all()->toArray();
            $role = Role::find($id);
            if($role->users()->get()->first() != null){
                $userId = $role->users()->get()->first()->id;
            }else{
                $userId = 0;
            }

//        dd($userId);
            $pId = '';
//            dd()
            if ($role->permissions()->get()->first() != null){
                $permissionId= $role->permissions()->get()->first()->id;
                if (isset($permissionId)){
                    $pId = $permissionId;
                }else{
                    $pId = 0;
                }
            }

            $itselfPermission = $role->permissions()->get()->toArray();
            if (isset($itselfPermission)){
                $permissionArr = [];
                foreach ($itselfPermission as $p){
                    array_push($permissionArr, $p['pivot']['permission_id']);
                }
            }else{
                $permissionArr = [];
            }
            $menus = MenuDynamicTable::all()->toArray();
//            return $permissions;
            /*$one = array_slice($menus, 0, 3);
            $two = array_slice($menus, 3, 3);
            $three = array_slice($menus, 6, 3);
            $four = array_slice($menus, 9, 3);
            $five = array_slice($menus, 12, 3);*/
//            return view('admin.roles.edit',compact('id','users','permissions','role','pId','userId','one','two','three','four','five','permissionArr'));
//        dd($menus);
            return view('roles.edit',compact('id','users','permissions','role','pId','userId','menus','permissionArr'));
//        }else{
//            return redirect(route('error', ['id' => 404]));
//        }
        
        
        
        /*$this->authorize('roles_section');
        $users = User::all()->toArray();
        $permissions= Permission::all()->toArray();
        $role = Role::find($id);
        $userId = $role->users()->get()->first()->id;
        $pId = '';
        if (isset($role->permissions()->get()->first()->id)){
            $permissionId= $role->permissions()->get()->first()->id;
            if (isset($permissionId)){
                $pId = $permissionId;
            }else{
                $pId = 0;
            }
        }

        $itselfPermission = $role->permissions()->get()->toArray();
        if (isset($itselfPermission)){
            $permissionArr = [];
            foreach ($itselfPermission as $p){
                array_push($permissionArr, $p['pivot']['permission_id']);
            }
        }else{
            $permissionArr = [];
        }

        $menus = MenuDynamicTable::all()->toArray();
        $one = array_slice($menus, 0, 3);
        $two = array_slice($menus, 3, 3);
        $three = array_slice($menus, 6, 3);
        $four = array_slice($menus, 9, 3);
        $five = array_slice($menus, 12, 3);
        return view('admin.roles.edit',compact('id','users','permissions','role','pId','userId','one','two','three','four','five','permissionArr'));*/
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
        $name = $data['name'];
        $label = $data['label'];
//        $user = $data['user'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $permissions = $data['permission'];
//        return $permissions ;
        Role::where('id',$id)->update(['name'=>$name,'label'=>$label,'status'=>$status]);
        $role = Role::where('id',$id)->first();
//        $role->users()->sync($user);

        $role->permissions()->wherePivot('role_id','=',$role->id)->detach();
//        return $role->permissions()->get();
        foreach ($permissions as $permission){
//            $permission = (int)$permission;
            $role->permissions()->attach($permission);
        }
//        return $role->permissions()->get();


        Alert::success('موفقیت', 'نقش ویرایش شد');
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
        $item = Role::find($id);
        $permissions = $item->permissions->all();
        $users = $item->users->all();
        if (count($permissions) > 0){
            foreach ($permissions as $permission){
                $item->permissions()->wherePivot('permission_id', '=', $permission->id)->detach();
            }
        }
        if (count($users) > 0){
            foreach ($users as $user){
                $item->users()->wherePivot('user_id', '=', $user->id)->detach();
            }
        }
        $item->delete();
        Alert::success('موفقیت', 'نقش مورد نظر حذف شد');
        return redirect()->back();
    }

    public function multiRemove(Request $request)
    {
        $ids = $request['allCheckedSelect'];
        foreach ($ids as $id) {
            Role::where('id', $id)->delete();
        }
        $roles = Role::all();
        return response()->json(['delete' => 'success', 'roles' => $roles]);
    }

    public function singleRemove(Request $request)
    {
        $id = $request['roleId'];
        Role::where('id', $id)->delete();
        $roles = Role::all();
        return response()->json(['delete' => 'success', 'roles' => $roles]);
    }

    public function searchTitle(Request $request)
    {
        $title = $request['value'];

        if (sizeof($title)>0){
            $roles = DB::table('roles')
                ->where('name', 'like', "%$title%")
                ->get();
        }else{
            $roles = Role::all();
        }

        $size = count($roles);

        return response()->json(['arrive' => 'success', 'roles' => $roles,'size'=>$size]);
    }
}
