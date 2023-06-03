<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Sodium\compare;

class UserController extends Controller
{
    public function Index(){
        $users = User::where('active',1)->where('id', '>', 1)->orderBy('updated_at','desc')->get();
        return view('user.index',compact('users'));
    }

    public function Create(){
        $users = User::all();
        $roles = Role::where('status',1)->get();
        return view('user.create',compact('roles','users'));
    }

    public function Save(Request $request){
        $request->validate([
            'role' => 'required',
            'name' => 'required|min:3|unique:users',
            'password' => 'required|min:3',
            'email' => 'required|unique:users',
            'image' => 'mimes:jpg,png',
            'phone' => 'required|min:9|max:10|unique:users',
        ],[
            'role.required' => 'សូមជ្រើសរើសតួនាទីមួយ',
            'name.required' => 'សូមបញ្ជូលឈ្មោះអ្នកប្រើប្រាស់',
            'name.min' => 'សូមបញ្ជូលឈ្មោះអ្នកប្រើប្រាស់យ៉ាងតិច៣តួរអក្សរ',
            'name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'phone.required' => 'សូមបញ្ជូលលេខទូរស័ព្ធ',
            'phone.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'phone.min' => 'លេខទូរស័ព្ទតិចបំផុតត្រឹម៩តួរ',
            'phone.max' => 'លេខទូរស័ព្ទច្រើនបំផុតត្រឹម១០តួរ',
            'phone.unique' => 'លេខនេះមានរួចហើយ',
            'password.required' => 'សូមបញ្ជូលពាក្យសម្ងាត់',
            'password.min' => 'សូមបញ្ជូលពាក្យសម្ងាត់យ៉ាងតិច៣តួរអក្សរ',
            'email.required' => 'សូមបញ្ជូលអ៊ីម៉ែល',
            'email.unique' => 'អ៊ីម៉ែលនេះមានរួចហើយ',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ jpg ឬ png',
        ]);
        if ($request->file('image')){
            $image = $request->file('image');
            $img_extension = $image->getClientOriginalExtension();
            $img_name = time().'.'.$img_extension;
            $image->move('uploads/images_user/',$img_name);
            User::create([
                'role_id' => $request->role,
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
                'image' => $img_name,
                'created_at' => Carbon::now(),
            ]);
        }else{
            User::create([
                'role_id' => $request->role,
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->back()->with('success','អ្នកប្រើប្រាស់បានរក្សាទុកជោកជ័យ');
    }

    public function Delete($id){
        User::find($id)->delete();
        return redirect()->back()->with('success', 'អ្នកប្រើប្រាស់បានលុបជោគជ័យ!');
    }

    public function Edit($id){
        $users = User::find($id);
        $roles = Role::where('status',1)->get();
        return view('user.edit',compact('users','roles'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'role' => 'required',
            'name' => "required|min:3|unique:users,name,$id",
            // 'password' => 'required|min:3',
            // 'email' => "required|unique:users,email,$id",
            'image' => 'mimes:jpg,png',
            'phone' => "required|min:9|max:10|unique:users,phone,$id",
        ],[
            'role.required' => 'សូមជ្រើសរើសតួនាទីមួយ',
            'name.required' => 'សូមបញ្ជូលឈ្មោះអ្នកប្រើប្រាស់',
            'name.min' => 'សូមបញ្ជូលឈ្មោះអ្នកប្រើប្រាស់យ៉ាងតិច៣តួរអក្សរ',
            'name.unique' => 'ឈ្មោះនេះមានរួចហើយ',
            'phone.required' => 'សូមបញ្ជូលលេខទូរស័ព្ធ',
            'phone.integer' => 'សូមបញ្ជូលជាលេខគត់',
            'phone.min' => 'លេខទូរស័ព្ទតិចបំផុតត្រឹម៩តួរ',
            'phone.max' => 'លេខទូរស័ព្ទច្រើនបំផុតត្រឹម១០តួរ',
            'phone.unique' => 'លេខនេះមានរួចហើយ',
            // 'password.required' => 'សូមបញ្ជូលពាក្យសម្ងាត់',
            // 'password.min' => 'សូមបញ្ជូលពាក្យសម្ងាត់យ៉ាងតិច៣តួរអក្សរ',
            // 'email.required' => 'សូមបញ្ជូលអ៊ីម៉ែល',
            // 'email.unique' => 'អ៊ីម៉ែលនេះមានរួចហើយ',
            'image.mimes' => 'សូមជ្រើសរើសរូបភាពជាប្រភេទ jpg ឬ png',
        ]);
        if ($request->file('image')){
            $image = $request->file('image');
            $img_extension = $image->getClientOriginalExtension();
            $img_name = time().'.'.$img_extension;
            $image->move('uploads/images_user/',$img_name);
            User::find($id)->update([
                'role_id' => $request->role,
                'name' => $request->name,
                // 'password' => bcrypt($request->password),
                // 'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
                'image' => $img_name,
                'created_at' => Carbon::now(),
            ]);
        }else{
            User::find($id)->update([
                'role_id' => $request->role,
                'name' => $request->name,
                // 'password' => bcrypt($request->password),
                // 'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('user.index')->with('success','អ្នកប្រើប្រាស់បានកែជោគជ័យ');
    }

    function Login(){
        return view('user.login');
    }

    function Check(Request $request){
        $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ],[
            'email.required' => 'សូមបញ្ជូលអុីម៉ែល',
            'password.required' => 'សូមបញ្ជូលពាក្យសម្ងាត់'
        ]);
        $users = User::where('email',$request->email)->first();
        if (!$users){
            return back()->with('fail','អុីម៉ែលរបស់អ្នកមិនត្រឹមត្រូវទេ');
        }else{
            if (Hash::check($request->password, $users->password)){
                $request->session()->put('Logged',$users->id);
                $request->session()->put('Logged',$users->name);
                $request->session()->put('Logged',$users->status);
                if ($users->role_id == 1 && $users->status == 1){
                    return redirect('admin')->with('success','អ្នកអាចចូលទៅប្រើប្រាស់ប្រព័ន្ធបានដោយជោគជ័យ');
                }elseif ($users->name != 1 && $users->status == 1){
                    return redirect('/')->with('success','អ្នកអាចមើលWebsiteនេះបានដោយជោគជ័យ');
                }else{
                    session()->pull('Logged');
                    return back()->with('fail','សូមអធ្យាស្រ័យអុីម៉ែលនេះមិនអនុញ្ញាតឱ្យប្រើប្រាស់ទេ សូមធ្វើការប្រើប្រាស់អុីម៉ែលផ្សេង');
                }
            }else{
                return back()->with('fail', 'ពាក្យសម្ងាត់របស់អ្នកមិនត្រឹមត្រូវ');
            }
        }
    }

    function Logout(){
        if (session()->has('Logged')){
            session()->pull('Logged');
            return redirect()->route('user.login');
        }
    }
}
