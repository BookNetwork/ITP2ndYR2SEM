<?php

function passgen($length = 8){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

function setOtRate(){
    if($val->whrs < 180 || $val->whrs == 180){
        echo "-";
    }else{
        $qryOT = \DB::table('staff')->join('sal_details', 'staff.salDeId', '=', 'sal_details.salDeId')
                                    ->where('staff.regNo',$val->regNo)
                                    ->get();
        foreach ($qryOT as $key){
            $otRate = $key->othR;
        }
        $otAllowns =  ($val->whrs - 180) * $otRate ;
        echo $otAllowns;
    }
}

function updateLonInstlmnt(){
    if($val->loanInstlment == null){
        echo "-";
    }else{
        $loanIns = $val->loanInstlment;
        echo $loanIns;
        $remLoan = \DB::table('loan')->where('regNo',$val->regNo)->get();
        foreach ($remLoan as $val) {
            $rem = $val->remLoanAmount;
        }
            $update = $rem - $loanIns;
            \DB::table('loan')->where('regNo',$val->regNo)->update(['remLoanAmount'=>$update]);
    }
}



?>
