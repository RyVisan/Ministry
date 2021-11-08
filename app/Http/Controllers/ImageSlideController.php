<?php

namespace App\Http\Controllers;

use App\Models\ImgSlide;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class ImageSlideController extends Controller
{
    public function Index(){
        $img_slides = ImgSlide::where('active',1)->orderBy('updated_at','desc')->get();
        return view('slide.index',compact('img_slides'));
    }

    public function Create(){
        return view('slide.create');
    }

    public function Save(Request $request){
        $request->validate([
            'slide_title' => 'required|min:3|unique:img_slides,slide_title',
            'image' => 'required|mimes:jpg,png',
            'order_by' => 'required|min:1|integer|unique:img_slides,order_by'
        ],[
            'slide_title.required' => 'សូមបញ្ជូលឈ្មោះចំណងជើង',
            'slide_title.min' => 'សូមបញ្ជូលយ៉ាងតិច៣តួរអក្សរ',
            'slide_title.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'image.required' => 'សូមជ្រើសរើសរូបភាពមូយ',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពណាប្រភេទជា PNG ឬ JPG',
            'order_by.required' => 'សូមបញ្ជូលលេខ',
            'order_by.min' => 'សូមបញ្ជូលលេខយ៉ាងតិច១',
            'order_by.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'order_by.unique' => 'លេខនេះមានរួចហើយ'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $image_extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$image_extension;
            $image->move('uploads/images_slide/',$image_name);
        }
        ImgSlide::insert([
            'slide_title' => $request->slide_title,
            'description' => $request->description,
            'order_by' => $request->order_by,
            'status' => $request->status,
            'image' => $image_name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success','ស្លាយរូបភាពបានរក្សាទុកជោកជ័យ!');
    }

    public function Edit($id){
        $img_slides = ImgSlide::find($id);
        return view('slide.edit',compact('img_slides'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'slide_title' => "required|min:3|unique:img_slides,slide_title,$id",
            'image' => "mimes:jpg,png,$id",
            'order_by' => "required|min:1|integer|unique:img_slides,order_by,$id"
        ],[
            'slide_title.required' => 'សូមបញ្ជូលឈ្មោះចំណងជើង',
            'slide_title.min' => 'សូមបញ្ជូលយ៉ាងតិច៣តួរអក្សរ',
            'slide_title.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពណាប្រភេទជា PNG ឬ JPG',
            'order_by.required' => 'សូមបញ្ជូលលេខ',
            'order_by.min' => 'សូមបញ្ជូលលេខយ៉ាងតិច១',
            'order_by.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'order_by.unique' => 'លេខនេះមានរួចហើយ'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $image_extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$image_extension;
            $image->move('uploads/images_slide/',$image_name);
            ImgSlide::find($id)->update([
                'slide_title' => $request->slide_title,
                'description' => $request->description,
                'order_by' => $request->order_by,
                'status' => $request->status,
                'image' => $image_name,
                'created_at' => Carbon::now()
            ]);
        }
            ImgSlide::find($id)->update([
                'slide_title' => $request->slide_title,
                'description' => $request->description,
                'order_by' => $request->order_by,
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);
        return redirect()->route('img_slide.index')->with('success','ស្លាយរូបភាពបានកែជោគជ័យ!');
    }

    public function Delete($id){
        ImgSlide::find($id)->delete();
        return redirect()->back()->with('success','ស្លាយរួបភាពបានលុបជោគជ័យ!');
    }
}
