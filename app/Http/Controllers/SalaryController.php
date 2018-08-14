<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    function save_admin_Asal_details(){
        if(request()->input('remove') != null){
            echo "yes0";
        }
        else{

        $this->validate(request(), [
          'ACslId' => 'required',
          'AcademicPosition' => 'required',
          'AcademicBasicSal' => 'required',
          'AcademicOTR' => 'required',

        ]);
        $slId = request()->input('ACslId');
        $AcademicPosition = request()->input('AcademicPosition');
        $AcademicBasicSal = request()->input('AcademicBasicSal');
        $AcademicOTR = request()->input('AcademicOTR');




        $qry = \DB::table('sal_details')->insert(['salDeId'=>$slId ,'position'=>$AcademicPosition, 'basicSal'=>$AcademicBasicSal, 'othR'=>$AcademicOTR ]);

            if($qry){
                return back()->with('acasucc',"Salary details of Academic staff has been success fully added");
            }else{
                return back()->with('acafail','Somthing went wrong!');
            }
        }
    }


    function save_admin_NAsal_details(){
        $this->validate(request(), [
            'NCslId' => 'required',
            'NonAcademicPosition' => 'required',
            'NonAcademicBasicSal' => 'required',
            'NonAcademicOTR' => 'required',
        ]);

            $slId = request()->input('NCslId');
            $department = request()->input('department');
            $NonAcademicPosition = request()->input('NonAcademicPosition');
            $NonAcademicBasicSal = request()->input('NonAcademicBasicSal');
            $NonAcademicOTR = request()->input('NonAcademicOTR');

            $qry = \DB::table('sal_details')->insert(['salDeId'=>$slId ,'position'=>$NonAcademicPosition , 'dept'=>$department, 'basicSal'=>$NonAcademicBasicSal, 'othR'=>$NonAcademicOTR ]);

            if($qry){
                return back()->with('nacasucc',"Salary details of Academic staff has been success fully added");
            }else{
                return back()->with('nacafail','Somthing went wrong!');
            }

        return back();
    }

    function save_admin_Asal_rm_details(){

        $this->validate(request(), [
              'RMACslId' => 'required',
        ]);

        $slId = request()->input('RMACslId');

        $qry2 = \DB::table('staff')->select('salDeId')
                                   ->where('salDeId',$slId)
                                   ->get()
                                   ->count();
        if($qry2 = 0){

            $qry = \DB::table('sal_details')->where('salDeId', '=', $slId)->delete();
            if($qry){
                return back()->with('acasucc',"Salary details of Academic staff has been success fully deleted");
            }
        }else{
            return back()->with('acafail',"Salary ID is already Assigned to another staff if, You want to delete You need to delete the staff");
        }

        return back()->with('acafail','Somthing went wrong');
    }


    function save_admin_NAsal_rm_details(){

        $this->validate(request(), [
            'RMNCslId' => 'required',
        ]);

        echo $slId = request()->input('RMNCslId');

        $qry2 = \DB::table('staff')->select('salDeId')
                                   ->where('salDeId',$slId)
                                   ->get()
                                   ->count();
        if($qry2 = 0){
        // remove the row
            $qry = \DB::table('sal_details')->where('salDeId', '=' , $slId)->delete();
            if($qry){
                return back()->with('nacasucc','Salary details of Academic staff has been success fully Deleted');
            }
        }else{
            return back()->with('nacafail',"Salary ID is already Assigned to another staff if, You want to delete You need to delete the staff");
        }

        return back()->with('nacafail','Somthing went wrong');
    }

    function update_Fund(){
        echo "hello";
        $epf = request()->input('epf');
        $etf = request()->input('etf');

        echo $epf;

        if( request()->input('epf') != null & request()->input('etf') != null ){
            echo "hello1";

                if(\DB::table('emp_fund')->where('fundId','=','1')->update(['etf' => $etf , 'epf' => $epf])){
                    return back()->with('fsucc',"Salary details of Academic staff has been success fully Updded");
                }

        }else if(request()->input('epf') != null &  request()->input('etf') == null ){
            echo "hello2";

            if(\DB::table('emp_fund')->where('fundId','=','1')->update(['epf' => $epf])){
                return back()->with('fsucc',"Salary details of Academic staff has been success fully added");
            }

        }else if(request()->input('epf') == null & request()->input('etf') != null ){
            echo "hello3";

            if(\DB::table('emp_fund')->where('fundId','=','1')->update(['etf' => $etf])){
                return back()->with('fsucc',"Salary details of Academic staff has been success fully added");
            }

        }else{
            echo "hello4";
                return back()->with('ffail','Somthing went wrong! one or more fields are empty !');

        }


    }

    function update_acaSalary(){

        $this->validate(request(),[
            'Academic_salID' => 'required',
        ]);

        $salID = request()->input('Academic_salID');
        $B_sal = request()->input('B_sal');
        $Aca_OTR = request()->input('Aca_OTR');


        if(request()->input('B_sal') != null && request()->input('Aca_OTR') != null){
            $qry1 = \DB::table('sal_details')->where('salDeId','=',$salID)
                                                    ->update(['basicSal'=>$B_sal,'othR'=>$Aca_OTR]);
            if($qry1){
                return back()->with('AsuccPro','OTH Rate have been Successfully Updated');
            }
        }


        if(request()->input('B_sal') != null){
            $qry = \DB::table('sal_details')->where('salDeId','=',$salID)
                                            ->update(['basicSal'=>$B_sal]);
            if($qry){
                return back()->with('AsuccPro','Basic Salary have been Successfully Updated');
            }

        }
        if(request()->input('Aca_OTR') != null){
            $qry1 = \DB::table('sal_details')->where('salDeId','=',$salID)
                                            ->update(['othR'=>$Aca_OTR]);
            if($qry1){
                return back()->with('AsuccPro','OTH Rate have been Successfully Updated');
            }
        }

        return back()->with('AfailPro','One more fields are Empty !');



    }

    function update_nonAcaSalary(){

        $this->validate(request(),[

            'NonAcademic_salID' => 'required',

        ]);

        $salID = request()->input('NonAcademic_salID');
        $B_sal = request()->input('B_sal');
        $NAca_OTR = request()->input('NAca_OTR');

                if(request()->input('B_sal') != null  && request()->input('NAca_OTR') != null){
                    $qry2 = \DB::table('sal_details')->where('salDeId','=',$salID)
                                                    ->update(['basicSal'=>$B_sal,'othR'=>$NAca_OTR]);
                    if($qry2){
                        return back()->with('NAsuccPro','OTH Rate have been Successfully Updated');
                    }
                }

                if(request()->input('B_sal') != null){
                    $qry = \DB::table('sal_details')->where('salDeId','=',$salID)
                                                    ->update(['basicSal'=>$B_sal]);
                    if($qry){
                        return back()->with('NAsuccPro','Basic Salary have been Successfully Updated');
                    }

                }
                if(request()->input('NAca_OTR') != null){
                    $qry1 = \DB::table('sal_details')->where('salDeId','=',$salID)
                                                    ->update(['othR'=>$NAca_OTR]);
                    if($qry1){
                        return back()->with('NAsuccPro','OTH Rate have been Successfully Updated');
                    }
                }

                return back()->with('NAfailPro','One more fields are Empty !');
    }

    function addAdmin(){



    }

}
