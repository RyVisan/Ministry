<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use App\Models\ImgSlide;
use App\Models\Document;
use PDF;
use App\Models\User;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function Index(){
        $menus = Menu::where('status',1)->orderBy('order_by','asc')->get();
        $submenus = Submenu::where('status',1)->orderBy('order_by','asc')->get();
        $imgSlides = ImgSlide::where('status',1)->orderBy('order_by','asc')->get();
        $belowSlides = Document::where('status',1)
                                ->where('location',2)->inRandomOrder()->take(2)->get();
        $other = Document::where('status',1)
                                ->where('location',3)->inRandomOrder()->take(4)->get();
        $printed_doc = Document::where('status',1)
                                ->where('location',4)->inRandomOrder()->take(6)->get();
        $right_slide = Document::where('status',1)
                                ->where('location',1)->inRandomOrder()->take(4)->get();
        return view('frontend.index',compact('menus','submenus','imgSlides','right_slide','belowSlides','other','printed_doc'));
    }

    public function Post($id, $mode){
        if ($mode == "menu"){
            $menus = Menu::where('status',1)->orderBy('order_by','asc')->get();
            $submenus = Submenu::where('status',1)->orderBy('order_by','asc')->get();
            $imgSlides = ImgSlide::where('status',1)->orderBy('order_by','asc')->get();
            $documents = Document::where('menu_id',$id)->orderBy('date','desc')->get();
            $belowSlides = Document::where('status',1)->inRandomOrder()->take(2)->get();
            $menu_name = Menu::find($id);
            $aboveFoots = Document::where('status',1)->inRandomOrder()->take(4)->get();
            return view('frontend.document.index',compact('menus','submenus','documents','imgSlides','belowSlides','aboveFoots','menu_name'));
        }elseif ($mode == "submenu"){
            $menus = Menu::where('status',1)->orderBy('order_by','asc')->get();
            $submenus = Submenu::where('status',1)->orderBy('order_by','asc')->get();
            $documents = Document::where('submenu_id',$id)->where('status', 1)->orderBy('date','desc')->get();
            $imgSlides = ImgSlide::where('status',1)->orderBy('order_by','asc')->get();
            $belowSlides = Document::where('status',1)->inRandomOrder()->take(2)->get();
            $menu_name = Submenu::find($id);
            $aboveFoots = Document::where('status',1)->inRandomOrder()->take(4)->get();
            return view('frontend.document.index',compact('menus','submenus','documents','imgSlides','belowSlides','aboveFoots','menu_name'));
        }
    }

    function Logout(){
        if (session()->has('Logged')){
            session()->pull('Logged');
            return redirect()->route('user.login');
        }
    }

    public function View($id){
        $menus = Menu::where('status',1)->orderBy('order_by','asc')->get();
        $view_file = Document::find($id);
        return view('frontend.document.view',compact('view_file','menus'));
    }
}
