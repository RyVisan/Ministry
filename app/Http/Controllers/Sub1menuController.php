<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Sub1_menu;
use Illuminate\Support\Carbon;

class Sub1menuController extends Controller
{
    public function Index(){
        $sub1_menus = Sub1_menu::where('active',1)->orderBy('updated_at','desc')->get();
        return view('sub1_menu.index',compact('sub1_menus'));
    }

    public function Create(){
        $submenus = Submenu::where('active',1)->orderBy('created_at','desc')->get();
        return view('sub1_menu.create',compact('submenus'));
    }

    public function Save(Request $request){
        $request->validate([
            'submenu_name' => 'required',
            'sub1_menu_name' => 'required|min:3'
        ],[
            'submenu_name.required' => 'Please select one sub menu name.',
            'sub1_menu_name.required' => 'Please input sub1 menu name.',
            'sub1_menu_name.min' => 'Please input at least 3 characters.'
        ]);
        Sub1_menu::insert([
            'submenu_id' => $request->submenu_name,
            'sub1menu_name' => $request->sub1_menu_name,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success','Sub1 Menu inserted successful!');
    }

    public function Delete($id){
        Sub1_menu::find($id)->delete();
        return redirect()->back()->with('success','Sub1 Menu deleted successful!');
    }

    public function Edit($id){
        $sub1_menus = Sub1_menu::find($id);
        return view('sub1_menu.edit',compact('sub1_menus'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'submenu_name' => 'required',
            'sub1_menu_name' => 'required|min:3'
        ],[
            'submenu_name.required' => 'Please select one sub menu name.',
            'sub1_menu_name.required' => 'Please input sub1 menu name.',
            'sub1_menu_name.min' => 'Please input at least 3 characters.'
        ]);
        Sub1_menu::find($id)->update([
            'submenu_id' => $request->submenu_name,
            'sub1menu_name' => $request->sub1_menu_name,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('sub1_menu.index')->with('success','Sub1 Menu updated successful!');
    }
}
