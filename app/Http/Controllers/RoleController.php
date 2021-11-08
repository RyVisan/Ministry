<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function Index(){
        $roles = Role::where('active',1)->orderBy('updated_at','desc')->get();
        return view('role.index',compact('roles'));
    }

    public function Create(){
        return view('role.create');
    }

    public function Save(Request $request){
        $request->validate([
           'name' => 'required|min:3|unique:roles,name'
        ],[
            'name.required' => 'សូមបញ្ជូលឈ្មោះតួនាទី',
            'name.min' => 'សូមបញ្ជូលឈ្មោះតួនាទីយ៉ាងតិច៣តួរអក្សរ',
            'name.unique' => 'ឈ្មោះនេះមានរួចហើយ'
        ]);
        Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'តួនាទីបានរក្សាទុកជោគជ័យ');
    }

    public function Delete($id){
        Role::find($id)->delete();
        return redirect()->back()->with('success', 'តួនាទីបានលុបជោគជ័យ');
    }

    public function Edit($id){
        $roles = Role::find($id);
        return view('role.edit',compact('roles'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'name' => "required|min:3|unique:roles,name,$id"
        ],[
            'name.required' => 'សូមបញ្ជូលឈ្មោះតួនាទី',
            'name.min' => 'សូមបញ្ជូលឈ្មោះតួនាទីយ៉ាងតិច៣តួរអក្សរ',
            'name.unique' => 'ឈ្មោះនេះមានរួចហើយ'
        ]);
        Role::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('role.index')->with('success', 'តួនាទីបានកែជោគជ័យ');
    }
}
