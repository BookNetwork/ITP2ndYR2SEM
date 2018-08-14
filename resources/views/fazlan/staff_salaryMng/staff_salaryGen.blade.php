@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/staff_CSS/staff_salGen.css">

<div class="col-md-12 view_det">
  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
    <label for=""><h2 class="h2">Staff Salary Managment</h2></label>
  </div>
  <hr>
</div>

<div class="staff_salGen">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<a href="staffSalaryGen?done=true"><input type="button" class="btn btn-success col-md-2" style="margin:30px 10px 20px 19px;" value="Genarate Salary" name="submit"></a>

<a href="printSal"><input type="button" class="btn btn-success col-md-2" style="margin:30px 20px 20px 0px;" value="print" name="submit"></a>

<!-- staff salary genarator -->
    <div class="col-md-12">
        <script type="text/javascript">

            $(document).ready(function(){
                $("#flip").click(function(){
                    $("#panel").slideToggle("slow");
                });
            });

        </script>

        <?php
                function runMyFunction() {
                    $qry = \DB::table('staff')->get();
                    foreach ($qry as $key) {
                        $regNo = $key->regNo;
                        $name = $key->name;
                        $dept = $key->dept;
                        $pos= $key->pos;
                        \DB::table('temp')->insert([ 'regNo' => $regNo,'name' => $name,'position'=> $pos,'department'=>$dept]);

                        $qry2 = \DB::table('staff')->join('sal_details', 'staff.salDeId', '=', 'sal_details.salDeId')
                                                   ->where('staff.regNo',$regNo)
                                                   ->get();

                        $qry3 = \DB::table('staff')->join('loan', 'staff.regNo', '=', 'loan.regNo')
                                                    ->where('staff.regNo',$regNo)
                                                    ->get();

                        $qry4 = \DB::table('staff')->join('staff_sal', 'staff.regNo', '=', 'staff_sal.regNo')
                                                    ->where('staff.regNo',$regNo)
                                                    ->get();

                        $qry5 = DB::table('emp_fund')->get();

                        foreach ($qry2 as $key) {
                            $basicSal = $key->basicSal;
                            \DB::table('temp')->where('regNo','=',$regNo)->update([ 'basicSal' => $basicSal]);

                        }
                        foreach ($qry3 as $key) {
                            $instlment = $key->instalmentAmount;
                            \DB::table('temp')->where('regNo','=',$regNo)->update([ 'loanInstlment' => $instlment]);

                        }
                        foreach ($qry4 as $key) {
                            $whrs = $key->whrs;
                            \DB::table('temp')->where('regNo','=',$regNo)->update([ 'whrs' => $whrs]);

                        }
                        foreach ($qry5 as $key) {
                            $epf = $key->epf;
                            $etf = $key->etf;
                            \DB::table('temp')->where('regNo','=',$regNo)->update([ 'etf' => $etf, 'epf' => $epf]);

                        }
                    }
                }

                if (isset($_GET['done'])) {
                    \DB::table('temp')->delete();
                    runMyFunction();

                }
                 $salCount = \DB::table('temp')->count();
                 $salGen = \DB::table('temp')->get();
        ?>


        <fieldset>
            <legend id="flip"><center>Staff Salary Report <?php if(isset($_GET['done'])){ echo "for ".date("Y/m/d");}else{ echo "for Last updated Month";}?></center></legend>
                    <div style="height:1000px;width:auto;overflow:scroll;">
                      <div style="padding-top:10px" id="panl">
                              <table class="table table-bordered col-md-12" >
                                    <tr >
                                      <th rowspan="2">Reg No</th>
                                      <th rowspan="2">Name</th>
                                      <th rowspan="2">Department</th>
                                      <th rowspan="2">Position</th>
                                      <th colspan="2">Earnings</th>
                                      <th rowspan="2">Gross Sal</th>
                                      <th colspan="2">Decreases</th>
                                      <th rowspan="2">Net Sal</th>
                                      <th rowspan="2">EPF 15%</th>
                                    </tr>
                                    <tr>
                                      <td>Basic Sal</td>
                                      <td>OT allwnc</td>
                                      <td>Loan instlmnt</td>
                                      <td>ETF 10%</td>
                                    </tr>

                                    @foreach($salGen as $val)
                                    <tr>
                                        <?php $etf = $val->etf; $epf = $val->epf;?>
                                        <td>{{$val->regNo}}</td>
                                        <td>{{$val->name}}</td>
                                        <td><?php if($val->department == null){echo "-";}else{echo $val->department;}?></td>
                                        <td>{{$val->position}}</td>
                                        <td><?php $bsal = $val->basicSal; echo $bsal ?></td>
                                    <?php
                                       $qryOT = \DB::table('staff')->join('sal_details', 'staff.salDeId', '=', 'sal_details.salDeId')
                                                                    ->where('staff.regNo',$val->regNo)
                                                                    ->get();
                                    ?>
                                        <td><?php
                                            if($val->whrs < 180 || $val->whrs == 180){
                                                echo "-";
                                            }else{
                                                foreach ($qryOT as $key){
                                                    $otRate = $key->othR;
                                                }
                                                echo ($val->whrs - 180) * $otRate ;
                                            }?>
                                        </td>
                                        <td><?php
                                            foreach ($qryOT as $key){
                                                $otRate = $key->othR;
                                            }
                                            $v =  ($val->whrs - 180) * $otRate ;

                                            echo $val->basicSal + $v;?>
                                        </td>
                                        <td><?php
                                            if($val->loanInstlment ==  null){
                                                echo "-";
                                            }else{
                                                $v = $val->loanInstlment;
                                                echo $v;
                                                $remLoan = \DB::table('loan')->where('regNo',$val->regNo)->get();
                                                foreach ($remLoan as $val) {
                                                    $rem = $val->remLoanAmount;
                                                    if($rem == 0){
                                                        echo "-";
                                                        \DB::table('loan')->where('regNo','=',$val->regNo)->delete();
                                                    }
                                                }
                                                    $update = $rem - $v;
                                                    \DB::table('loan')->where('regNo',$val->regNo)->update(['remLoanAmount'=>$update]);
                                            }?>
                                        </td>
                                        <td><?php echo $etfVal = $bsal * ($etf/100); ?></td>
                                        <td><?php echo $bsal - $v - $etfVal; ?></td>
                                        <td><?php echo $bsal * ($epf/100);?></td>
                                    </tr>
                                    @endforeach
                              </table>

                      </div>
                   </div>

                   	<div class="clearfix"></div>
        </fieldset>
    </div>

</div>
@endsection
