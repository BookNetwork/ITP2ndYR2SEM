<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class acaStaffController extends Controller
{
    function save_academic(){

    //staff personal details
             $this->validate(request(), [
              'regNo' => 'required|max:6|min:6|unique:staff',
              'fullName' => 'required',
              'permanantAddress' => 'required',
              'currentAddress' => 'required',
              'nationality' => 'required',
              'image' => 'required|mimes:jpeg,png',
              'nic' => 'required|max:9|min:9',
              'dob' => 'required',
              'phone' => 'required|max:10|min:10',
              'email' => 'required|email',
              'position' => 'required',
              'gender' => 'required',
            ]);
            //
            $regNo =request()->input('regNo');
            $name = request()->input('fullName');
            $perAddrs =request()->input('permanantAddress');
            $curAddrs= request()->input('currentAddress');
            $nationality = request()->input('nationality');
            $nic = request()->input('nic');
            $dob = request()->input('dob');
            $phone = request()->input('phone');
            $email = request()->input('email');
            $position = request()->input('position');
            $gender = request()->input('gender');


            $image = request()->file('image');
            $des_path = 'img/staff_imageupload/';
            $image_name = request()->image->getClientOriginalName();
            $image->move($des_path, $image_name);

            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-";
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
                                                'pos' => $position,
                                                'gender' => $gender,
                                                'passKey' => $password, //automatically gnrt
                                                'staffType' => 'academic'
                                            ]);

            $qry12 = \DB::table('staff_sal')->insert(['regNo' => $regNo,
                                                      'fundID' => 1,
                                                  ]);


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


        // //TECHING EXPRNC DETAILS
                $from1 = request()->input('from1');
                $to1 = request()->input('to1');
                $institute1 =request()->input('institute1');
                $pos1 = request()->input('pos1');


                $from2 = request()->input('from2');
                $to2 = request()->input('to2');
                $institute2 =request()->input('institute2');
                $pos2 = request()->input('pos2');


                $from3 = request()->input('from3');
                $to3 = request()->input('to3');
                $institute3 =request()->input('institute3');
                $pos3 = request()->input('pos3');


                if(request()->input('from1') != null){
                    $qry6 = \DB::table('staff_teaching_exp')->insert([ 'regNo' => $regNo,
                                                              'frm' => $from1,
                                                              'to2' => $to1,
                                                              'institute' =>$institute1 ,
                                                              'position' => $pos1]);

                }

                if(request()->input('from2') != null){
                    $qry7 = \DB::table('staff_teaching_exp')->insert([ 'regNo' => $regNo,
                                                              'frm' => $from2,
                                                              'to2' => $to2,
                                                              'institute' =>$institute2 ,
                                                              'position' => $pos2]);

                }

                if(request()->input('from3') != null){
                    $qry8 = \DB::table('staff_teaching_exp')->insert([ 'regNo' => $regNo,
                                                              'frm' => $from3,
                                                              'to2' => $to3,
                                                              'institute' =>$institute3 ,
                                                              'position' => $pos3]);

                }

        // // Other Achievements

                $event1 = request()->input('event1');
                $achivments1 = request()->input('achivments1');
                $achyear1 = request()->input('achyear1');

                $event2 = request()->input('event2');
                $achivments2 = request()->input('achivments2');
                $achyear2 = request()->input('achyear2');

                $event3 = request()->input('event3');
                $achivments3 = request()->input('achivments3');
                $achyear3 = request()->input('achyear3');

                if(request()->input('event1') != null){
                    $qry15 = \DB::table('staff_achivments')->insert([ 'regNo' => $regNo,
                                                              'name' => $artical1,
                                                              'achivment' => $achivments1,
                                                              'yr' =>$achyear1
                                                          ]);
                }

                if(request()->input('event2') != null){
                    $qry16 = \DB::table('staff_achivments')->insert([ 'regNo' => $regNo,
                                                              'name' => $artical2,
                                                              'achivment' => $achivments2,
                                                              'yr' =>$achyear2
                                                          ]);



                }

                if(request()->input('event3') != null){
                    $qry17 = \DB::table('staff_achivments')->insert([ 'regNo' => $regNo,
                                                              'name' => $artical3,
                                                              'achivment' => $achivments3,
                                                              'yr' =>$achyear3
                                                          ]);
                }

        // // Any further Information relevant to the Application

                $details = request()->input('details');

                if( request()->input('details') != null){
                    $qry18 = \DB::table('staff_other_details')->insert([ 'regNo' => $regNo,
                                                              'details' => $details
                                                          ]);
                }


            return back()->with('succc','staff details of Academic staff has been success fully added');

    }

    function staff_aca_promotion(){


         $this->validate(request(), [
             'regNo' => 'required|min:6|max:6',
             'position' => 'required',
         ]);

         $regNo = request()->input('regNo');
         $position = request()->input('position');

         $qry2 = \DB::table('sal_details')->where('position','=',$position)->get();
            foreach ($qry2 as $value) {
                $salDeId = $value->salDeId;

            }

         $qry1 = \DB::table('staff')->select('regNo')
                                   ->where('regNo','=',$regNo)
                                   ->get()
                                   ->count();

         if($qry1 == 0){
             return back()->with('failPro','Somthing went wrong in Staff Identity number !!');
         }
         ////in here update query

         $qry3 = \DB::table('staff')->where(['regNo'=> $regNo])
                                    ->update(['salDeId' => $salDeId,'pos'=>$position]);

        if($qry3){

            return back()->with('succPro','Success fully updated');
        }

        return back()->with('failPro','Somthing went wrong');

    }

}
