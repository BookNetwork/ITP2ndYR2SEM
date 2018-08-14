<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staffDetails_EditController extends Controller
{

    function name_edit(){
        $this->validate(request(),[
            'name' => 'required',
        ]);
        $regNo = request()->input('regNo');
        $name = request()->input('name');

        $qry =\DB::table('staff')->where('regNo','=',$regNo)->update(['name'=>$name]);
        if($qry){
            return back()->with('sss','Name has been updated successfully');
        }
        return back()->with('fff','Somthing went wrong');
    }

    function perAddr_edit(){
        $this->validate(request(),[
            'perAddr' => 'required',
        ]);
        $regNo = request()->input('regNo');
        $name = request()->input('perAddr');

        $qry =\DB::table('staff')->where('regNo','=',$regNo)->update(['perAddr'=>$name]);
        if($qry){
            return back()->with('sss','Permenant Address has been updated successfully');
        }
        return back()->with('fff','Somthing went wrong');

    }

    function curAddr_edit(){
        $this->validate(request(),[
            'curAddr' => 'required',
        ]);
        $regNo = request()->input('regNo');
        $name = request()->input('curAddr');

        $qry =\DB::table('staff')->where('regNo','=',$regNo)->update(['curAddr'=>$name]);
        if($qry){
            return back()->with('sss','Current Address has been updated successfully');
        }
        return back()->with('fff','Somthing went wrong');

    }

    function nic_edit(){
        $this->validate(request(),[
            'nic' => 'required',
        ]);
        $regNo = request()->input('regNo');
        $name = request()->input('nic');

        $qry =\DB::table('staff')->where('regNo','=',$regNo)->update(['nic'=>$name]);
        if($qry){
            return back()->with('sss','NIC has been updated successfully');
        }
        return back()->with('fff','Somthing went wrong');

    }

    function phone_edit(){
        $this->validate(request(),[
            'phone' => 'required',
        ]);
        $regNo = request()->input('regNo');
        $name = request()->input('phone');

        $qry =\DB::table('staff')->where('regNo','=',$regNo)->update(['phone'=>$name]);
        if($qry){
            return back()->with('sss','Phone Number has been updated successfully');
        }
        return back()->with('fff','Somthing went wrong');

    }

    function email_edit(){
        $this->validate(request(),[
            'email' => 'required',
        ]);
        $regNo = request()->input('regNo');
        $name = request()->input('email');

        $qry =\DB::table('staff')->where('regNo','=',$regNo)->update(['email'=>$name]);
        if($qry){
            return back()->with('sss','Email has been updated successfully');
        }
        return back()->with('fff','Somthing went wrong');

    }
}
