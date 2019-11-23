<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        if ($this->authorize('access_section') != null) {
            $permissions= Permission::all();
            return view('permissions.list',compact('permissions'));
//        }else{
//            return redirect(route('error', ['id' => 404]));
//        }


//        $this->authorize('access_section');
//        $permissions= Permission::paginate(10);
//        return view('admin.permissions.list',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        if ($this->authorize('access_section') != null) {
            $roles= Role::all()->toArray();
            return view('permissions.create',compact('roles'));
//        }else{
//            return redirect(route('error', ['id' => 404]));
//        }



       /* $this->authorize('access_section');
        $roles= Role::all()->toArray();
        return view('admin.permissions.insert',compact('roles'));*/
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
        $role= $data['role'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $permission=Permission::create(['name'=>$name,'label'=>$label,'status'=>$status,'unique_name'=>$data['unique_name']]);
        if ($role != 0){
        $permission->roles()->sync($role);

        }
        Alert::success('موفقیت', 'اجازه دسترسی ایجاد شد');
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

//        if ($this->authorize('access_section') != null) {
//            $this->authorize('access_section');
            $roles= Role::all()->toArray();
            $permission = Permission::find($id);
//            dd($permission);
//            dd($permission);
            if ($permission->roles()->get()->first() != null){
                $roleId= $permission->roles()->get()->first()->id;
                if (isset($roleId)){
                    $rId = $roleId;
                }else{
                    $rId = 0;
                }
            }else{
                $rId = 0;
    }
            return view('permissions.edit',compact('id','rId','permission','roles'));
//        }else{
//            return redirect(route('error', ['id' => 404]));
//        }




        /*$this->authorize('access_section');
        $roles= Role::all()->toArray();
        $permission = Permission::find($id);

        if (isset($permission->roles()->get()->first()->id)){
            $roleId= $permission->roles()->get()->first()->id;
            if (isset($roleId)){
                $rId = $roleId;
            }else{
                $rId = 0;
            }
        }
        return view('admin.permissions.edit',compact('id','rId','permission','roles'));*/
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
        $role= $data['role'];
        if (isset($data['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $permission= Permission::where('id',$id)->first();
        $permission->update(['name'=>$name,'label'=>$label,'status'=>$status,'unique_name'=>$data['unique_name']]);
        if ($role != 0){
            $permission->roles()->sync($role);

        }
        Alert::success('موفقیت', 'اجازه دسترسی ویرایش شد');
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
        $item = Permission::find($id);
        $roles = $item->roles->all();
        if (count($roles) > 0){
            foreach ($roles as $role){
                $item->roles()->wherePivot('role_id', '=', $role->id)->detach();
            }
        }
        $item->delete();
        Alert::success('موفقیت', 'دسترسی مورد نظر حذف شد');
        return redirect()->back();
    }

    public function multiRemove(Request $request)
    {
        $ids = $request['allCheckedSelect'];
        foreach ($ids as $id) {
            Permission::where('id', $id)->delete();
        }
        $permissions= Permission::all();
        return response()->json(['delete' => 'success', 'permissions' => $permissions]);
    }

    public function singleRemove(Request $request)
    {
        $id = $request['permissionId'];
        Permission::where('id', $id)->delete();
        $permissions= Role::all();
        return response()->json(['delete' => 'success', 'permissions' => $permissions]);
    }

    public function searchTitle(Request $request)
    {
        $title = $request['value'];

        if (sizeof($title)>0){
            $permissions = DB::table('permissions')
                ->where('name', 'like', "%$title%")
                ->get();
        }else{
            $permissions= Role::all();
        }

        $size = count($permissions);

        return response()->json(['arrive' => 'success', 'permissions' => $permissions,'size'=>$size]);
    }
}
