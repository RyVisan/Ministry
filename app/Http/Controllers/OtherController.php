<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Cover;

class OtherController extends Controller
{
    public function Index(){
        $covers = Cover::all();
        $images = Image::all();
        return view('other.index',compact('covers','images'));
    }

    public function Create(){
        return view('other.create');
    }

    public function Save(Request $request){
        $request->validate([
            'name' => 'required|min:3|unique:covers',
            'date' => 'required',
            'cover' => 'required|mimes:jpg,png|max:41943040',
            'image.*' => 'required|mimes:jpg,png|max:41943040',
//            'image' => 'required|mimes:jpg,png',
        ],[
            'name.required' => 'សូមបញ្ជូលចំណងជើងកម្មវិធី',
            'name.min' => 'សូមបញ្ជូលចំណងជើងកម្មវិធីយ៉ាងតិច៣តួរអក្សរ',
            'name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'date.required' => 'សូមជ្រើសរើសកាលបរិច្ឆេទ',
            'cover.required' => 'សូមជ្រើសរើសរូបភាព',
            'image.required' => 'សូមជ្រើសរើសរូបភាព',
            'cover.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ JPG ឬ PNG',
            'cover.max' => 'រូបភាពមិនអាចធំជាងទំហំ 41943040​bytes ទេ',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ JPG ឬ PNG',
            'image.max' => 'រូបភាពមិនអាចធំជាងទំហំ 41943040​bytes ទេ',
        ]);

        $cover = $request->file('cover');
        $cover_name = time().$cover->getClientOriginalName();
        $cover->move('uploads/images_other/cover',$cover_name);
        $img = Cover::create([
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $cover_name,
            'status' => $request->status,
            'location' => $request->location,
            'created_at' => Carbon::now(),
        ]);

        $cover_id = $img->id;
        $images = $request->file('image');
        foreach ($images as $image) {
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/images_other/images', $image_name);
            Image::create([
                'image' => $image_name,
                'cover_id' => $cover_id
            ]);
        }
        return redirect()->back()->with('success','រូបភាពទាំងអស់បានរក្សាទុកជោគជ័យ');
    }

    public function Edit($id){
        $covers = Cover::find($id);
        $images = Image::where('cover_id',$id)->get();
        return view('other.edit',compact('covers','images'));
    }

    public function Delete($id){
        Cover::find($id)->delete();
        return back()->with('success','រូបភាពបានលុបជោគជ័យ');
    }

    public function Delete_img($id){
        $images = Image::findOrFail($id);
        Image::findOrFail($id)->delete();
        $path_img = public_path('uploads/images_other/images/'.$images->image);
        if ($path_img){
            unlink(public_path('uploads/images_other/images/'.$images->image));
        }
        return back()->with('success','រូបភាពបានលុបជោគជ័យ');
    }

    public function Update(Request $request, $id){
        $request->validate([
            'name' => "required|min:3|unique:covers,name,$id",
            'date' => 'required',
            'cover' => 'mimes:jpg,png|max:41943040',
            'image.*' => 'required|mimes:jpg,png|max:41943040',
//            'image' => 'required|mimes:jpg,png',
        ],[
            'name.required' => 'សូមបញ្ជូលចំណងជើងកម្មវិធី',
            'name.min' => 'សូមបញ្ជូលចំណងជើងកម្មវិធីយ៉ាងតិច៣តួរអក្សរ',
            'name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'date.required' => 'សូមជ្រើសរើសកាលបរិច្ឆេទ',
            'cover.required' => 'សូមជ្រើសរើសរូបភាព',
            'image.required' => 'សូមជ្រើសរើសរូបភាព',
            'cover.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ JPG ឬ PNG',
            'cover.max' => 'រូបភាពមិនអាចធំជាងទំហំ 41943040​bytes ទេ',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ JPG ឬ PNG',
            'image.max' => 'រូបភាពមិនអាចធំជាងទំហំ 41943040​bytes ទេ',
        ]);
        if ($request->file('cover')) {
            $cover = $request->file('cover');
            $cover_name = time() . $cover->getClientOriginalName();
            $cover->move('uploads/images_other/cover', $cover_name);
            Cover::find($id)->update([
                'name' => $request->name,
                'date' => $request->date,
                'description' => $request->description,
                'image' => $cover_name,
                'status' => $request->status,
                'location' => $request->location,
                'created_at' => Carbon::now(),
            ]);
        }
        if ($request->file('image')) {
            $cover_id = Cover::find($id);
            $new_id = $cover_id->id;
            Image::where('cover_id',$new_id)->delete();
            $images = $request->file('image');
            foreach ($images as $image) {
                $image_name = time().$image->getClientOriginalName();
                $image->move('uploads/images_other/images', $image_name);
                Image::create([
                    'image' => $image_name,
                    'cover_id' => $cover_id
                ]);
            }
        }
        if (!$request->file('image') && !$request->file('cover')){
            Cover::find($id)->update([
                'name' => $request->name,
                'date' => $request->date,
                'description' => $request->description,
                'status' => $request->status,
                'location' => $request->location,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('other.index')->with('success','រូបភាពទាំងអស់បានកែជោគជ័យ');
    }
}

