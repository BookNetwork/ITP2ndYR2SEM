<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nonAcaStaffController extends Controller
{
    function save_nonAcademic(){
        $this->validate(request(), [
          'regNo' => 'required|max:6|min:6|unique:staff',
          'permanantAddress' => 'required',
          'currentAddress' => 'required',
          'nationality' => 'required',
          'fullName' => 'required',
          'image' => 'required|mimes:jpeg,png',
          'nic' => 'required|max:9|min:9',
          'dob' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'position' => 'required',
          'gender' => 'required',
          'department' => 'required'
        ]);

        $regNo =request()->input('regNo');
        $name = request()->input('fullName');
        $perAddrs =request()->input('permanantAddress');
        $curAddrs= request()->input('currentAddress');
        $nationality = request()->input('nationality');
        $nic = request()->input('nic');
        $dob = request()->input('dob');
        $phone = request()->input('phone');
        $email = request()->input('email');
        $dept = request()->input('department');
        $position = request()->input('position');
        $gender = request()->input('gender');


        $image = request()->file('image');
        $des_path = 'img/staff_imageupload/';
        $image_name = request()->image->getClientOriginalName();
        $image->move($des_path, $image_name);

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_?";
        $password = substr( str_shuffle( $chars ), 0, 8);


        $qry2 = \DB::table('sal_details')->where('position',$position)->get();
        foreach ($qry2 as $value) {
            $salDeId = $value->salDeId;

        }

        // insert in to staff table
        $qry = \DB::table('staff')->insert(['regNo' => $regNo,
                                            'salDeId' => $salDeId,
                                            'name' => $name,
                                            'perAddr' => $perAddrs,
                                            'curAddr' => $curAddrs,
                                            'nationality' => $nationality.'V',
                                            'img' => $image_name,
                                            'nic' => $nic,
                                            'dob' => $dob,
                                            'phone' => $phone,
                                            'email' => $email,
                                            'dept' => $dept,
                                            'pos' => $position,
                                            'gender' => $gender,
                                            'passKey' => $password, //automatically gnrt
                                            'staffType' => 'nonAcademic'
                                        ]);

        $qry12 =\DB::table('staff_sal')->insert(['regNo' => $regNo,
                                                  'fundID' => 1,
                                              ]);


    //staff School setails

        $school1  = request()->input('school1');
        $Gfrom1  = request()->input('Gfrom1');
        $Gto1  = request()->input('Gto1');
        $qli1  = request()->input('qli1');
        $qliyear1  = request()->input('qliyear1');

        $school2 = request()->input('school2');
        $Gfrom2 = request()->input('Gfrom2');
        $Gto2 = request()->input('Gto2');
        $qli2 = request()->input('qli2');
        $qliyear2 = request()->input('qliyear2');

        $school3 = request()->input('school3');
        $Gfrom3 = request()->input('Gfrom3');
        $Gto3 = request()->input('Gto3');
        $qli3 = request()->input('qli3');
        $qliyear3 = request()->input('qliyear3');



            if(request()->input('school1') != null ){

                $qry3 = \DB::table('staff_school')->insert([ 'regNo' => $regNo,
                                                             'schName' => $school1,
                                                             'frm' =>$Gfrom1,
                                                             'to2' => $Gto1,
                                                             'qli' => $qli1,
                                                             'yr' => $qliyear1]);

            }


            if(request()->input('school2') != null){
                $qry4 = \DB::table('staff_school')->insert([ 'regNo' => $regNo,
                                                          'schName' => $school2,
                                                          'frm' => $Gfrom2,
                                                          'to2' => $Gto2,
                                                          'qli' => $qli2,
                                                          'yr' => $qliyear2]);


            }

            if(request()->input('school3') != null){
                $qry5 = \DB::table('staff_school')->insert([ 'regNo' => $regNo,
                                                          'schName' => $school3,
                                                          'frm' => $Gfrom3,
                                                          'to2' => $Gto3,
                                                          'qli' => $qli3,
                                                          'yr' => $qliyear3]);

            }

    //staff uni setails

        $degree1  = request()->input('degree1');
        $uni1  = request()->input('uni1');
        $speci1  = request()->input('speci1');
        $uniyear1  = request()->input('uniyear1');
        $country1  = request()->input('country1');

        $degree2 = request()->input('degree2');
        $uni2 = request()->input('uni2');
        $speci2 = request()->input('speci2');
        $uniyear2 = request()->input('uniyear2');
        $country2 = request()->input('country2');

        $degree3 = request()->input('degree3');
        $uni3 = request()->input('uni3');
        $speci3 = request()->input('speci3');
        $uniyear3 = request()->input('uniyear3');
        $country3 = request()->input('country3');



            if(request()->input('degree1') != null ){
                $qry3 = \DB::table('staff_uni')->insert([ 'regNo' => $regNo,
                                                          'degree' => $degree1,
                                                          'uni' => $uni1,
                                                          'spec' =>$speci1 ,
                                                          'yr' => $uniyear1,
                                                          'country' => $country1]);

            }

            if(request()->input('degree2') != null){
                $qry4 = \DB::table('staff_uni')->insert([ 'regNo' => $regNo,
                                                          'degree' => $degree2,
                                                          'uni' => $uni2,
                                                          'spec' =>$speci2 ,
                                                          'yr' => $uniyear2,
                                                          'country' => $country2]);


            }

            if(request()->input('degree3') != null){
                $qry5 = \DB::table('staff_uni')->insert([ 'regNo' => $regNo,
                                                          'degree' => $degree3,
                                                          'uni' => $uni3,
                                                          'spec' =>$speci3 ,
                                                          'yr' => $uniyear3,
                                                          'country' => $country3]);

            }


    // //working EXPRNC DETAILS
            $from1 = request()->input('from1');
            $to1 = request()->input('to1');
            $company1 =request()->input('company1');
            $pos1 = request()->input('pos1');


            $from2 = request()->input('from2');
            $to2 = request()->input('to2');
            $company2 =request()->input('company2');
            $pos2 = request()->input('pos2');


            $from3 = request()->input('from3');
            $to3 = request()->input('to3');
            $company3 =request()->input('company3');
            $pos3 = request()->input('pos3');


            if(request()->input('from1') != null){
                $qry6 = \DB::table('staff_work_exp')->insert([ 'regNo' => $regNo,
                                                          'frm' => $from1,
                                                          'to2' => $to1,
                                                          'company' => $company1 ,
                                                          'position' => $pos1]);


            }

            if(request()->input('from2') != null){
                $qry7 = \DB::table('staff_work_exp')->insert([ 'regNo' => $regNo,
                                                          'frm' => $from2,
                                                          'to2' => $to2,
                                                          'company' => $company2 ,
                                                          'position' => $pos2]);


            }

            if(request()->input('from3') != null){
                $qry8 = \DB::table('staff_work_exp')->insert([ 'regNo' => $regNo,
                                                          'frm' => $from3,
                                                          'to2' => $to3,
                                                          'company' => $company3 ,
                                                          'position' => $pos3]);


            }


    // // Any further Information relevant to the Application

            $details = request()->input('details');

            if( request()->input('details') != null){
                $qry18 = \DB::table('staff_other_details')->insert([ 'regNo' => $regNo,
                                                                     'details' => $details]);
            }


        return back()->with('nonsuccc','Non Academic staff Detais has been Success fully added'); //need to return regNo and password
    }

    function staff_NONaca_promotion(){


         $this->validate(request(), [
             'NregNo' => 'required|min:6|max:6',
             'dept' => 'required',
             'Npos' => 'required',
         ]);

         $regNo = request()->input('NregNo');
         $dept = request()->input('dept');
         $position = request()->input('Npos');

         $qry2 = \DB::table('sal_details')->where('position','=',$position)->where('dept','=',$dept)->get();
            foreach ($qry2 as $value) {
                $salDeId = $value->salDeId;

            }

         $qry1 = \DB::table('staff')->select('regNo')
                                   ->where('regNo','=',$regNo)
                                   ->get()
                                   ->count();

         if($qry1 == 0){
             return back()->with('nonfailPro','Somthing went wrong in Staff Identity number !!');
         }
         ////in here update query

         $qry3 = \DB::table('staff')->where(['regNo'=> $regNo])
                                    ->update(['salDeId' => $salDeId,'pos'=>$position,'dept'=>$dept]);

        if($qry3){

            return back()->with('nonsuccPro','Success fully updated');
        }

        return back()->with('nonfailPro','Somthing went wrong');

    }

}
