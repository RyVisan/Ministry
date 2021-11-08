<?php

namespace App\Http\Controllers;
use App\Models\Menu;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function Index(){
        $menus = Menu::where('active',1)->orderBy('updated_at','desc')->get();
        return view('menu.index',compact('menus'));
    }

    public function Create(){
        return view('menu.create');
    }

    public function Save(Request $request){
        $request->validate([
            'menu_name' => 'required|min:3|unique:menus,name',
            'order_by' => 'required|integer|min:1|unique:menus,order_by'
        ],[
            'menu_name.required' => 'សូមបញ្ជូលឈ្មោះមីនុយ',
            'menu_name.min' => 'សូមបញ្ជូលយ៉ាងតិច៣តួរអក្សរ',
            'menu_name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'order_by.required' => 'សូមបញ្ជូលលេខ',
            'order_by.min' => 'សូមបញ្ជូលលេខយ៉ាងតិច១',
            'order_by.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'order_by.unique' => 'លេខនេះមានរួចហើយ'
        ]);
        Menu::insert([
            'name' => $request->menu_name,
            'order_by' => $request->order_by,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success','មីនុយបានរក្សាទុកជោគជ័យ!');
    }

    public function Delete($id){
        Menu::find($id)->delete();
        return redirect()->back()->with('success','មីនុយបានលុបជោគជ័យ!');
    }

    public function Edit($id){
        $menus = Menu::whereId($id)->first();
        return view('menu.edit',compact('menus'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'menu_name' => "required|min:3|unique:menus,name,$id",
            'order_by' => "required|integer|min:1|unique:menus,order_by,$id"
        ],[
            'menu_name.required' => 'សូមបញ្ជូលឈ្មោះមីនុយ',
            'menu_name.min' => 'សូមបញ្ជូលយ៉ាងតិច៣តួរអក្សរ',
            'menu_name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'order_by.required' => 'សូមបញ្ជូលលេខ',
            'order_by.min' => 'សូមបញ្ជូលលេខយ៉ាងតិច១',
            'order_by.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'order_by.unique' => 'លេខនេះមានរួចហើយ'
        ]);
        Menu::find($id)->update([
            'name' => $request->menu_name,
            'order_by' => $request->order_by,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('menu.index')->with('success','មីនុយបានកែជោគជ័យ!');
    }
}
