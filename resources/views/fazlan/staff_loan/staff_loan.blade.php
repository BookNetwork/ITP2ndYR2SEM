@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/staff_CSS/staff_loan.css">


<div class="staff_loan">

    <div class="col-md-12 view_det">
      <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
        <label for=""><h2 class="h2">Staff Loan Handling</h2></label>
      </div>
      <hr>
    </div>

    <div class="container2 col-md-12">
        <center>
            <div class="container col-md-6" style="">
                <fieldset class="col-md-12" style="border: 1px solid #32AD32 !important;margin-left:50%;">
                    <legend>Staff Details</legend>


                    <div class="container1 col-md-12">
<!--///////////////////////////////////////////-->
                    <form action="save_loan_details" method="post" enctype="multipart/form-data" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <table class="col-md-12">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        @if ($mess = Session::get('loanfail'))
                                              <span class="alert alert-danger col-md-12">
                                                  <strong >{{ $mess }}</strong>
                                              </span>
                                        @endif
                                        @if($mess = Session::get('loansucc'))
                                              <span class="alert alert-success col-md-12">
                                                  <strong>{{ $mess }}</strong>
                                              </span>
                                        @endif
                                    </td>
                                </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td class="col-md-2"><label for="">staff ID</label></td>
                                            <td class="col-md-3"><input type="text" class="form-control" id="staffId" placeholder="" name="staffId" value=""></td>
                                        </div>
                                    </tr>
                                    <tr><td></td><td >
                                        @if ($errors->has('staffId'))
                                              <span class="help-blocks">
                                                  <strong style="color: red;">{{ $errors->first('staffId') }}</strong>
                                              </span>
                                        @endif
                                    </td></tr>

                                    <tr>
                                        <div class="form-group">
                                            <td class="col-md-2"><label for="">Loan Amount</label></td>
                                            <td class="col-md-2"><input type="number" class="form-control" id="" placeholder="10,000 - 400,000" name="loanAmount" min="10000" max="300000"></td>
                                        </div>
                                    </tr>
                                    <tr><td></td><td >
                                        @if ($errors->has('loanAmount'))
                                              <span class="help-blocks">
                                                  <strong style="color: red;">{{ $errors->first('loanAmount') }}</strong>
                                              </span>
                                        @endif
                                    </td></tr>
                                    <tr>
                                        <div class="form-group">
                                            <td class="col-md-2"><label for="">Instalment Amount</label></td>
                                            <td class="col-md-2"><input type="number" class="form-control" id="" placeholder="" name="InstalmentAmount"></td>
                                        </div>
                                    </tr>
                                    <tr><td></td><td >
                                        @if ($errors->has('InstalmentAmount'))
                                              <span class="help-blocks">
                                                  <strong style="color: red;">{{ $errors->first('InstalmentAmount') }}</strong>
                                              </span>
                                        @endif


                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success" id="button1" onclick="" enable> Save</button>
                    </form>

                </div>
            </fieldset>
        </div>
        </center>


            <div class="details col-md-12">
                <legend style="width:100%;background-color:#addead;" id="flip">Loan Details</legend>


                <div style="height:700px;width:auto;overflow:scroll;" id="panel">
                  <div style="padding-top:10px">

                    <?php $loanDetails = \DB::table('loan')->join('staff', 'loan.regNo', '=', 'staff.regNo')
                                                           ->select('loan.regNo', 'staff.name', 'staff.pos', 'loan.amount', 'loan.period','loan.instalmentAmount','loan.remLoanAmount','loan.dt')
                                                           ->orderBy('loanId', 'desc')
                                                           ->get();

                          $numrows = \DB::table('loan')->count();
                    ?>


                    <?php if( $numrows > 0){?>
                          <table class="table table-bordered col-md-12" >

                                <tr>
                                  <th>Staff ID</th>
                                  <th>Name of the staff</th>
                                  <th>Postion</th>
                                  <th>Loan Amnt(Rs)</th>
                                  <th>Instalment(month)</th>
                                  <th>instalment amount(Rs)</th>
                                  <th>Remaining Loan Amnt</th>
                                  <th>date</th>
                                </tr>
                    @foreach($loanDetails as $details)
                                <tr>
                                    <td>{{$details->regNo}}</td>
                                    <td>{{$details->name}}</td>
                                    <td>{{$details->pos}}</td>
                                    <td>{{$details->amount}}</td>
                                    <td>{{$details->period}}</td>
                                    <td>{{$details->instalmentAmount}}</td>
                                    <td>{{$details->remLoanAmount}}</td>
                                    <td>{{$details->dt}}</td>
                                </tr>
                    @endforeach
                          </table>
                      <?php }else{ ?>
                            <div class="alert alert-success " style="text-align:center;height:200px;padding-top:50px">
                                    <strong>No one gets any loan</strong>
                            </div>
                      <?php } ?>

                  </div>
               </div>

                <div class="clearfix"></div>

        </div>


</div>

<script type="text/javascript">

    $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
    });

</script>



@endsection
