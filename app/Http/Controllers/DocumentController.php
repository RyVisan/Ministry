<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Document;
use Illuminate\Support\Carbon;

class DocumentController extends Controller
{
    public function Index(){
        $documents = Document::where('active',1)->orderBy('updated_at','desc')->get();
        return view('document.index',compact('documents'));
    }

    public function Create(){
        $menus = Menu::where('active',1)->orderBy('created_at','desc')->get();
        $submenus = Submenu::where('active',1)->orderBy('created_at','desc')->get();
        return view('document.create',compact('menus','submenus'));
    }

    public function Save(Request $request){
        $request->validate([
            'menu_name' => 'required',
            'file' => 'required|mimes:pdf,docx,xlsx',
            'image' => 'mimes:jpg,png',
            'document_name' => 'required|min:3|max:300|unique:documents,name',
            'date' => 'required',
            'location' => 'required',
        ],[
            'menu_name.required' => 'សូមជ្រើសរើសឈ្មោះមីនុយមួយ',
            'file.required' => 'សូមជ្រើសរើសឯកសារមួយ',
            'file.mimes' => 'សូមជ្រើសរើសឯកសារណាដែលជាប្រភេទ PDF, Word ឬ Excel',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ png ឬ​jpg',
            'document_name.required' => 'សូមបញ្ជូលឈ្មោះឯកសារ',
            'document_name.min' => 'សូមបញ្ជូលឈ្មោះឯកសារយ៉ាងតិច៣តួរអក្សរ',
            'document_name.max' => 'សូមបញ្ជូលឈ្មោះឯកសារយ៉ាងច្រើន៣០០តួរអក្សរ',
            'document_name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'date.required' => 'សូមជ្រើសរើសកាលបរិច្ឆេទ',
            'location.required' => 'សូមជ្រើសរើសទីតាំង',
        ]);
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();
            $fileAll = $request->document_name.'.'.$file_extension;
            $file->move('uploads/files/', $fileAll);
        }
        if ($request->file('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/images_document/', $imagename);
            Document::insert([
                'menu_id' => $request->menu_name,
                'submenu_id' => $request->sub_menu_name,
                'name' => $request->document_name,
                'date' => $request->date,
                'description' => $request->description,
                'location' => $request->location,
                'file_name' => $fileAll,
                'image' => $imagename,
                'extension' => $file_extension,
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);
        }else{
            Document::insert([
                'menu_id' => $request->menu_name,
                'submenu_id' => $request->sub_menu_name,
                'name' => $request->document_name,
                'date' => $request->date,
                'description' => $request->description,
                'location' => $request->location,
                'file_name' => $fileAll,
                'extension' => $file_extension,
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);
        }
        return redirect()->back()->with('success','ឯកសារបានរក្សាទុកជោគជ័យ');
    }

    public function Delete($id){
        Document::find($id)->delete();
        return redirect()->back()->with('success','ឯកសារបានលុបជោគជ័យ');
    }

    public function Edit($id){
        $documents = Document::find($id);
        $menus = Menu::all();
        $sub_menus = Submenu::all();
        return view('document.edit',compact('documents','menus','sub_menus'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'menu_name' => 'required',
            'file' => 'mimes:pdf,docx,xlsx',
            'image' => 'mimes:jpg,png',
            'document_name' => "required|min:3|max:300|unique:documents,name,$id",
            'date' => 'required',
            'location' => 'required',
        ],[
            'menu_name.required' => 'សូមជ្រើសរើសឈ្មោះមីនុយមួយ',
            'file.required' => 'សូមជ្រើសរើសឯកសារមួយ',
            'file.mimes' => 'សូមជ្រើសរើសឯកសារណាដែលជាប្រភេទ PDF, Word ឬ Excel',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ png ឬ​jpg',
            'document_name.required' => 'សូមបញ្ជូលឈ្មោះឯកសារ',
            'document_name.min' => 'សូមបញ្ជូលឈ្មោះឯកសារយ៉ាងតិច៣តួរអក្សរ',
            'document_name.max' => 'សូមបញ្ជូលឈ្មោះឯកសារយ៉ាងច្រើន៣០០តួរអក្សរ',
            'document_name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'date.required' => 'សូមជ្រើសរើសកាលបរិច្ឆេទ',
            'location.required' => 'សូមជ្រើសរើសទីតាំង',
        ]);
        Document::find($id)->update([
            'menu_id' => $request->menu_name,
            'submenu_id' => $request->sub_menu_name,
            'name' => $request->document_name,
            'date' => $request->date,
            'description' => $request->description,
            'location' => $request->location,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        if ( ($request->file('file')) && ($request->file('image')) ) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();
            $fileAll = $request->document_name.'.'.$file_extension;
            $file->move('uploads/files/', $fileAll);

            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/images_document/', $imagename);
            Document::find($id)->update([
                'menu_id' => $request->menu_name,
                'submenu_id' => $request->sub_menu_name,
                'name' => $request->document_name,
                'date' => $request->date,
                'description' => $request->description,
                'location' => $request->location,
                'file_name' => $fileAll,
                'image' => $imagename,
                'extension' => $file_extension,
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);
        }elseif( ($request->file('file')) || ($request->file('image')) ) {
            if (($request->file('file'))) {
                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                $file_extension = $file->getClientOriginalExtension();
                $fileAll = $request->document_name . '.' . $file_extension;
                $file->move('uploads/files/', $fileAll);
                Document::find($id)->update([
                    'menu_id' => $request->menu_name,
                    'submenu_id' => $request->sub_menu_name,
                    'name' => $request->document_name,
                    'date' => $request->date,
                    'description' => $request->description,
                    'location' => $request->location,
                    'file_name' => $fileAll,
                    'extension' => $file_extension,
                    'status' => $request->status,
                    'created_at' => Carbon::now()
                ]);
            } elseif (($request->file('image'))) {
                $image = $request->file('image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/images_document/', $imagename);
                Document::find($id)->update([
                    'menu_id' => $request->menu_name,
                    'submenu_id' => $request->sub_menu_name,
                    'name' => $request->document_name,
                    'date' => $request->date,
                    'description' => $request->description,
                    'location' => $request->location,
                    'status' => $request->status,
                    'image' => $imagename,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return redirect()->route('document.index')->with('success','ឯកសារបានកែជោគជ័យ');
    }

    public function getSubmenu($id){
        return Submenu::where('menu_id',$id)->pluck('name','id');
    }

//    public function getSub1menu($id){
//        return Sub1_menu::where('submenu_id',$id)->pluck('sub1menu_name','id');
//    }
}
