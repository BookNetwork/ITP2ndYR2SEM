@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="css/staff_CSS/staff_loan.css">


<link rel="stylesheet" href="css/staff_CSS/staff_salary.css">

<div class="salary_staff">


        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Principal</h2></label>
          </div>

        </div>

        <!--Top bttns -->
        <div class="btn-group">
            <div class="col-md-12 nav_btn" style="padding: 0px">
                <a type="button" href="staff_principal_search" class="btn btn-success" name="button">Search Staff</a>

            </div>
        </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_presentDetails" class="btn btn-success" name="button">Present staff Details</a>

                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_principal_leave" class="btn btn-success" name="button">leave staff Details</a>
                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_principal_loan" class="btn btn-success" name="button">Loan Details</a>
                </div>
            </div>

            <hr>
</div>
<div class="staff_loan">

    <?php $loanDetails = \DB::table('loan')->join('staff', 'loan.regNo', '=', 'staff.regNo')
                                           ->select('loan.regNo', 'staff.name', 'staff.pos', 'loan.amount', 'loan.period','loan.instalmentAmount','loan.remLoanAmount','loan.dt')
                                           ->orderBy('loanId', 'desc')
                                           ->get();

          $count = 1;
    ?>



<div class="details col-md-12">
    <legend style="width:100%;background-color:#addead;border:1px solid #32AD32">Staff Loan Details</legend>

    <div style="height:360px;width:auto;overflow:scroll;">
      <div style="padding-top:10px">

          <table class="table table-srtipped col-md-12">
                <tr>
                  <th>No</th>
                  <th>regNo</th>
                  <th>Name</th>
                  <th>Loan Amnt</th>
                  <th>Instalment(month)</th>
                  <th>Remaining Loan Amnt</th>
                </tr>
        @foreach($loanDetails as $details)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$details->regNo}}</td>
                    <td>{{$details->name}}</td>
                    <td>{{$details->amount}}</td>
                    <td>{{$details->period}}</td>
                    <td>{{$details->remLoanAmount}}</td>
                </tr>
        @endforeach
          </table>

      </div>
   </div>

    <div class="clearfix"></div>

</div>

</div>
@endsection
