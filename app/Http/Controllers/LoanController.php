<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    function save_loan_details(){

        $this->validate(request(),[
            'staffId' => 'required|max:6|min:6',
            'loanAmount' => 'required',
            'InstalmentAmount' => 'required',

        ]);

        $staffId = request()->input('staffId');
        $loanAmount = request()->input('loanAmount');
        $instalmentAmount = request()->input('InstalmentAmount');
        $date = date('Y-m-d');
        echo $loanPeriod = ceil($loanAmount/$instalmentAmount);
        // reg no available or not
        $qry3 = \DB::table('staff')->select('staff.regNo')
                                  ->where('staff.regNo','=',$staffId)
                                  ->get()
                                  ->count();

        if($qry3 == 0){
            return back()->with('loanfail','Somthin went wrong in Staff Identity number !!');
        }

        //only one staff can get one loan
        $qry2 = \DB::table('loan')->select('loan.regNo')
                                  ->where('loan.regno','=', $staffId)
                                  ->get()
                                  ->count();

        if($qry2 >= 1)
        {
            return back()->with('loanfail','You already get a loan');
        }else{
        // insert into loan table
            if(\DB::table('loan')->insert(['regNo'=>$staffId, 'amount'=>$loanAmount, 'period'=>$loanPeriod, 'dt' => $date, 'remLoanAmount' => $loanAmount, 'instalmentAmount'=> $instalmentAmount])){
                return back()->with('loansucc',"Salary details of Academic staff has been success fully added");
            }
        }

    //end of the function
    }
// end of the class
}
