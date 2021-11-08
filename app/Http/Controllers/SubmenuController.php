<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Menu;
use Illuminate\Support\Carbon;

class SubmenuController extends Controller
{
    public function Index(){
        $sub_menus = Submenu::where('active',1)->orderBy('updated_at','desc')->get();
        return view('sub_menu.index',compact('sub_menus'));
    }

    public function Create(){
        $menus = Menu::where('active',1)->orderBy('created_at','desc')->get();
        return view('sub_menu.create',compact('menus'));
    }

    public function Save(Request $request){
        $request->validate([
            'menu_name' => 'required|unique:menus,name',
            'sub_menu_name' => 'required|min:3|unique:submenus,name',
            'order_by' => 'required|integer|min:1|unique:submenus,order_by'
        ],[
            'sub_menu_name.required' => 'សូមបញ្ជូលឈ្មោះSubមីនុយ',
            'sub_menu_name.min' => 'សូមបញ្ជូលយ៉ាងតិច៣តួរអក្សរ',
            'sub_menu_name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'menu_name.required' => 'សូមជ្រើសរើសឈ្មោះមីនុយមួយ',
            'order_by.required' => 'សូមបញ្ជូលលេខ',
            'order_by.min' => 'សូមបញ្ជូលលេខយ៉ាងតិច១',
            'order_by.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'order_by.unique' => 'លេខនេះមានរួចហើយ'
        ]);
        Submenu::insert([
            'menu_id' => $request->menu_name,
            'name' => $request->sub_menu_name,
            'order_by' => $request->order_by,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success','Subមីនុយរក្សាទុកបានជោជ័យ!');
    }

    public function Delete($id){
        Submenu::find($id)->delete();
        return redirect()->back()->with('success','Subមីនុយលុបបានជោជ័យ!');
    }

    public function Edit($id){
        $sub_menus = Submenu::find($id);
        return view('sub_menu.edit',compact('sub_menus'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'menu_name' => 'required',
            'sub_menu_name' => "required|min:3|unique:submenus,name,$id",
            'order_by' => "required|integer|min:1|unique:submenus,order_by,$id"
        ],[
            'sub_menu_name.required' => 'សូមបញ្ជូលឈ្មោះSubមីនុយ',
            'sub_menu_name.min' => 'សូមបញ្ជូលយ៉ាងតិច៣តួរអក្សរ',
            'sub_menu_name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'menu_name.required' => 'សូមជ្រើសរើសឈ្មោះមីនុយមួយ',
            'order_by.required' => 'សូមបញ្ជូលលេខ',
            'order_by.min' => 'សូមបញ្ជូលលេខយ៉ាងតិច១',
            'order_by.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'order_by.unique' => 'លេខនេះមានរួចហើយ'
        ]);
        Submenu::find($id)->update([
            'menu_id' => $request->menu_name,
            'name' => $request->sub_menu_name,
            'order_by' => $request->order_by,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('sub_menu.index')->with('success','Subមីនុយកែបានជោជ័យ!');
    }
}
