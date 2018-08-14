<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function restPASS(){

        $this->validate(request(),[

            'regNo' => 'required|max:6|min:6',
            'pass' => 'required',
        ]);

        $regNo = request()->input('regNo');
        $pass = request()->input('pass');

        $qry = \DB::table('staff')->select('regNo')
                                  ->where('regNo','=',$regNo)
                                  ->get()
                                  ->count();

        if($qry == 0){
            return back()->with('f','Somthin went wrong in Staff Identity number !!');
        }

        $qry2 = \DB::table('staff')->where('regNo','=',$regNo)
                                   ->update(['passKey'=>$pass]);
        if($qry){
            return back()->with('s','Success fully updated');
        }

        return back()->with('f','Somthing went wrong');
    }
}

?>
