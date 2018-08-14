@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="css/staff_CSS/staff_salary.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="salary_staff">


        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Admin</h2></label>
          </div>

        </div>

        <!--Top bttns -->
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_admin_salary" class="btn btn-success" name="button">Salary add/remove</a>
                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                    <a type="button" href="staff_principal_reg" class="btn btn-success" name="button">Principal Registration</a>
                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                    <a type="button" href="staff_admin_reSetPassword" class="btn btn-success" name="button">Staff Password</a>
                </div>
            </div>

                  <hr>
</div>

<div class="salary_staff">
<!--
        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Admin Staff Salary Managment</h2></label>
          </div>
          <hr>
      </div> -->


<!--academic staff salary Managment-->
    <div class="container col-md-12">
        <div class="container2 col-md-6">
            <div class="col-md-12">
                    <fieldset class="col-md-11" style="border: 1px solid #32AD32 !important;">
                        <legend style="border: 1px solid #32AD32;">Academic Staff Salary</legend>

                        <div class="col-md-12 view_det">
                          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
                            <label for=""><h4 class="h4">Add Salary Details</h4></label>
                          </div>
                          <hr>
                        </div>


                        <div class="container1 col-md-12">
<!--//////////////////////////////-->
                            <form action="save_admin_Asal_details" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <table class="col-md-12">
                                <tbody>
                                        <tr>
                                            <td colspan="2">
                                                @if ($mess = Session::get('acafail'))
                                                      <span class="alert alert-danger col-md-12">
                                                          <strong>{{ $mess }}</strong>
                                                      </span>
                                                @endif
                                                @if ($mess = Session::get('acasucc'))
                                                      <span class="alert alert-success col-md-12">
                                                          <strong>{{ $mess }}</strong>
                                                      </span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-3"><label for="">sallaryId:</label></td>
                                                <td><input type="text" class="form-control" id="" placeholder="" name="ACslId"></td>
                                            </div>
                                        </tr>
                                        <tr><td colspan="2">
                                            @if ($errors->has('ACslId'))
                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('ACslId') }}</strong>
                                                  </span>
                                            @endif
                                        </td></tr>
                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-3"><label for="">Position :</label></td>
                                                <td>

                                                        <select class="form-control" name="AcademicPosition">
                                                            <option></option>
                                                            <option>Principal</option>
                                                            <option>Vice Principal</option>
                                                            <option>Senior</option>
                                                            <option>Junior</option>
                                                            <option>intern</option>
                                                        </select>
                                                </td>
                                            </div>
                                        </tr>
                                        <tr><td colspan="2">
                                            @if ($errors->has('AcademicPosition'))
                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('AcademicPosition') }}</strong>
                                                  </span>
                                            @endif
                                        </td></tr>

                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-4"><label for="">Basic Sal(Rs):</label></td>
                                                <td><input type="text" class="form-control" id="sal" placeholder="" name="AcademicBasicSal" value=""></td>
                                            </div>
                                        </tr>

                                            <tr><td colspan="2">
                                                @if ($errors->has('AcademicBasicSal'))
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('AcademicBasicSal') }}</strong>
                                                      </span>
                                                @endif
                                            </td></tr>
                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-3"><label for="">OTR hour :</label></td>
                                                <td><input type="text" class="form-control" id="" placeholder="" name="AcademicOTR"></td>
                                            </div>
                                        </tr>

                                            <tr><td colspan="2">
                                                @if ($errors->has('AcademicOTR'))
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('AcademicOTR') }}</strong>
                                                      </span>
                                                @endif

                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success" style="width:100px;margin-top:95px;" id="" onclick="" enable> Add details</button>
            <!-- end of the form -->
                        </form>

                </div>
                <div class="container1 col-md-12">
                        <div class="col-md-12 view_det">
                          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
                            <label for=""><h4 class="h4">Remove Salary Details</h4></label>
                          </div>
                          <hr>
                        </div>


<!--///////////// remove aca salary details /////////////////-->
                            <form action="save_admin_Asal_rm_details" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <table class="col-md-12">
                                <tbody>

                                    <?php
                                        $qry= \DB::table('sal_details')->select('salDeId')->where('position','=','Senior')
                                                                                           ->orWhere('position','=','Junior')
                                                                                           ->orwhere('position','=','intern')
                                                                                           ->get();
                                     ?>
                                     <tr>
                                         <div class="form-group">
                                             <td class="col-md-3"><label for="">Position :</label></td>
                                             <td>

                                                     <select class="form-control" name="RMACslId">
                                                         <option></option>
                                                    @foreach($qry as $ID)
                                                         <option>{{$ID->salDeId}}</option>
                                                    @endforeach
                                                     </select>
                                             </td>
                                         </div>
                                     </tr>
                                        <tr><td colspan="2">
                                            @if ($errors->has('RMACslId'))
                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('RMACslId') }}</strong>
                                                  </span>
                                            @endif
                                        </td></tr>

                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success" style="width:130px;margin-top:;" id="" onclick="" enable>Remove details</button>

            <!-- end of the form -->
                         </form>







                    </div>
        </div>
    </div>



<!--Non academic staff salary Managment-->

        <div class="container2 col-md-6">
            <div class="col-md-12">
                <fieldset class="col-md-11" style="border: 1px solid #327AC1 !important;">
                        <legend style="border: 1px solid #327AC1 !important;">Non Academic Staff Salary</legend>

                        <div class="col-md-12 view_det">
                          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
                            <label for=""><h4 class="h4">Add/remove Salary Details</h4></label>
                          </div>
                          <hr>
                        </div>

                        <div class="container1 col-md-12">
<!--///////////////////////////////-->
                            <form action="save_admin_NAsal_details" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <table class="col-md-12">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                @if ($mess = Session::get('nacafail'))
                                                      <span class="alert alert-danger col-md-12">
                                                          <strong >{{ $mess }}</strong>
                                                      </span>
                                                @endif
                                                @if ($mess = Session::get('nacasucc'))
                                                      <span class="alert alert-success col-md-12">
                                                          <strong>{{ $mess }}</strong>
                                                      </span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-3"><label for="">sallaryId:</label></td>
                                                <td><input type="text" class="form-control" id="" placeholder="" name="NCslId"></td>
                                            </div>
                                        </tr>
                                        <tr><td colspan="2">
                                            @if ($errors->has('NCslId'))
                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('NCslId') }}</strong>
                                                  </span>
                                            @endif
                                        </td></tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-3"><label for="">Department :</label></td>
                                                    <td>
                                                            <select class="form-control" name="department">
                                                                <option></option>
                                                                <option>Finance</option>
                                                                <option>Human_Resource</option>
                                                                <option>Operation</option>
                                                            </select>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr><td colspan="2">
                                                @if ($errors->has('department'))
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('department') }}</strong>
                                                      </span>
                                                @endif
                                            </td></tr>

                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-4"><label for="">Position :</label></td>
                                                    <td>
                                                            <select class="form-control" name="NonAcademicPosition">
                                                                <option></option>
                                                                <option>Admin</option>
                                                                <option>Manager</option>
                                                                <option>Assosiate</option>
                                                                <option>Internship</option>
                                                            </select>
                                                    </td>
                                                </div>
                                            </tr>
                                            <tr><td colspan="2">
                                                @if ($errors->has('NonAcademicPosition'))
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('NonAcademicPosition') }}</strong>
                                                      </span>
                                                @endif
                                            </td></tr>

                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-3"><label for="">Basic Sal(Rs):</label></td>
                                                    <td><input type="text" class="form-control" id="" placeholder="" name="NonAcademicBasicSal"></td>
                                                </div>
                                            </tr>
                                            <tr><td colspan="2">
                                                @if ($errors->has('NonAcademicBasicSal'))
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('NonAcademicBasicSal') }}</strong>
                                                      </span>
                                                @endif
                                            </td></tr>

                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-3"><label for="">OTR hour :</label></td>
                                                    <td><input type="text" class="form-control" id="" placeholder="" name="NonAcademicOTR"></td>
                                                </div>
                                            </tr>
                                            <tr><td colspan="2">
                                                @if ($errors->has('NonAcademicOTR'))
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('NonAcademicOTR') }}</strong>
                                                      </span>
                                                @endif
                                            </td></tr>

                                    </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary" style="width:100px;margin-top:20px;" id="button1" onclick="" enable> Add Details</button>
        <!-- end of the form -->
                            </form>
                        </div>
                         <div class="container1 col-md-12">
                                <div class="col-md-12 view_det">
                                  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
                                    <label for=""><h4 class="h4">Remove Salary Details</h4></label>
                                  </div>
                                  <hr>
                                </div>


        <!--///////////// remove non aca salary details /////////////////-->
                                     <form action="save_admin_NAsal_rm_details" method="post" enctype="multipart/form-data">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <table class="col-md-12">
                                        <tbody>

                                             <?php
                                                $qry = \DB::table('sal_details')->select('salDeId')->where('dept','=','Finance')
                                                                                                   ->orWhere('dept','=','Human_Resource')
                                                                                                   ->orwhere('dept','=','Operation')
                                                                                                   ->get();
                                             ?>
                                             <tr>
                                                 <div class="form-group">
                                                     <td class="col-md-3"><label for="">Sallary ID :</label></td>
                                                     <td>

                                                             <select class="form-control" name="RMNCslId">
                                                                 <option></option>
                                                                 @foreach($qry as $ID)
                                                                      <option>{{$ID->salDeId}}</option>
                                                                 @endforeach
                                                             </select>
                                                     </td>
                                                 </div>
                                             </tr>

                                                <tr><td colspan="2">
                                                    @if ($errors->has('RMNCslId'))
                                                          <span class="help-blocks">
                                                              <strong style="color: red;">{{ $errors->first('RMNCslId') }}</strong>
                                                          </span>
                                                    @endif
                                                </td></tr>

                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary" style="width:130px;margin-top:;" id="" onclick="" enable>Remove details</button>

                    <!-- end of the form -->
                                </form>


                </div>
            </div>
        </div>
<!-- Admin --->

<!--EPF ETF details-->

<div class="container2 col-md-9" style="margin-left:15%" >
    <div class="col-md-12">
        <fieldset class="col-md-11" style="border: 1px solid #ddd !important;">
                <legend style="border: 1px solid #ddd !important;">EPF / ETF</legend>

                <div class="col-md-12 view_det">
                  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
                    <label for=""><h4 class="h4">Add/Update fund Details</h4></label>
                  </div>
                  <hr>
                </div>

                <div class="container1 col-md-12">

<!--///////////////////////////////-->
            <form action="save_admin_funds" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <table class="col-md-12">
                            <tbody>
                                <tr>
                                    <td colspan="4">
                                        @if ($mess = Session::get('ffail'))
                                              <span class="alert alert-danger col-md-12">
                                                  <strong>{{ $mess }}</strong>
                                              </span>
                                        @endif
                                        @if ($mess = Session::get('fsucc'))
                                              <span class="alert alert-success col-md-12">
                                                  <strong>{{ $mess }}</strong>
                                              </span>
                                        @endif
                                    </td>
                                </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td class="col-md-3"><label for="">EPF (%) :</label></td>
                                            <td><input type="text" class="form-control" id="" placeholder="" name="epf"></td>
                                        </div>


                                        <div class="form-group">
                                            <td class="col-md-3"><label for="">ETF (%) :</label></td>
                                            <td><input type="text" class="form-control" id="" placeholder="" name="etf"></td>
                                        </div>
                                    </tr>
                            </tbody>
                    </table>

                    <button type="submit" class="btn btn-default" name="sub" style="width:100px;margin-top:20px;"> Add </button>
<!--  end of form -->
                    </form>

                </div>


        </div>
    </div>

    <div class="details col-md-12" style="height:750px">
        <legend style="width:100%;background-color:#addead;" id="flip">Salary Details</legend>


        <div style="height:580px;width:auto;overflow:scroll;" id="panel">
          <div style="padding-top:10px">

            <?php $loanDetails = \DB::table('sal_details')->get();
                  $numrows = \DB::table('sal_details')->count();
            ?>


            <?php if( $numrows > 0){?>
                  <table class="table table-bordered col-md-12">

                        <tr>
                          <th>Salary ID</th>
                          <th>Position</th>
                          <th>Department</th>
                          <th>Basic salary(Rs)</th>
                          <th>OTH Rate(Rs)</th>
                        </tr>
            @foreach($loanDetails as $details)
                        <tr>
                            <td>{{$details->salDeId}}</td>
                            <td>{{$details->position}}</td>
                            <td><?php if($details->dept == null){echo "-";}else{echo $details->dept;}?></td>
                            <td>{{$details->basicSal}}</td>
                            <td>{{$details->othR}}</td>
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
