<?php

namespace App\Http\Controllers;


use App\Models\UserRecored;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function view(){
        $users_records=UserRecored::all();
        return view('user.users',compact('users_records'));
    }
    public function user_insert(Request $request){

    if($request->file('image')){
        $file= $request->file('image');
        $filename= rand(111111111, 9999999999) . '.'.$file->extension();
        $file-> move(public_path('image'), $filename);
        
    }
           
        $user_insert=new UserRecored();
        $user_insert->email=$request->email;
        $user_insert->name=$request->name;
        $user_insert->joindate=$request->joindate;
        if($request->leavedate==!null){
         $user_insert->leavedate=$request->leavedate;
        }else{
            $user_insert->vch_working_status=$request->status;
        }
        $user_insert->image=$filename;
        $user_insert->save();
        
        return redirect()->back()->with('msg','User Inserted Successfully');
    }
    public function user_delete($id){

        $model = UserRecored::find( Crypt::decrypt($id) );
        $model->delete();
       return redirect()->back()->with('msg','Record Delete Successfully');
    }
}
