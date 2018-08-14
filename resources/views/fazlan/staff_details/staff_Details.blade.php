@extends('fazlan.staff')
@section('section')

<link rel="stylesheet" href="/css/staff_CSS/staff_register.css">

<div class="col-md-12 view_det">
  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
    <label for=""><h2 class="h2">Staff Details</h2></label>
  </div>
  <hr>
          @if ($mess = Session::get('ff'))
              <span class="alert alert-danger col-md-12">
                  <strong >{{ $mess }}</strong>
              </span>
          @endif
          @if($mess = Session::get('ss'))
              <span class="alert alert-success col-md-12">
                  <strong>{{$mess}}</strong>
              </span>
          @endif

<?php
  $x = $_SERVER['QUERY_STRING'];
?>
    <!--SSTAFF IMAGE-->
    <?php $staffDetails = \DB::table('staff')->where('staff.regNo',$x)->get();

        $achivments = \DB::table('staff')->join('staff_achivments', 'staff.regNo', '=', 'staff_achivments.regNo')
                                         ->where('staff.regNo',$x)->get();

        $otherDetails =  \DB::table('staff')->join('staff_other_details', 'staff.regNo', '=', 'staff_other_details.regNo')
                                            ->where('staff.regNo',$x)->get();

        $reasearch =   \DB::table('staff')->join('staff_research_papers_publications', 'staff.regNo', '=', 'staff_research_papers_publications.regNo')
                                          ->where('staff.regNo',$x)->get();

        $school = \DB::table('staff')->join('staff_school', 'staff.regNo', '=', 'staff_school.regNo')
                                     ->where('staff.regNo',$x)->get();

        $teaching = \DB::table('staff')->join('staff_teaching_exp', 'staff.regNo', '=', 'staff_teaching_exp.regNo')
                                       ->where('staff.regNo',$x)->get();

        $uni = \DB::table('staff')->join('staff_uni', 'staff.regNo', '=', 'staff_uni.regNo')
                                  ->where('staff.regNo',$x)->get();

        $wrkEp = \DB::table('staff')->join('staff_work_exp', 'staff.regNo', '=', 'staff_work_exp.regNo')
                                    ->where('staff.regNo',$x)->get();

    ?>


<div class = "aca_staff" ><!--css class-->
    <!-- PERSONAL DETAILS ------------------>

<?php
        $staffIn = \DB::table('staff')->where('regNo','=',$x)->get()->count();

        if($staffIn == 1){
?>
        @foreach($staffDetails as $val)

                <div class="col-md-12">
                    <fieldset class="col-md-11" style="background-color:white;">
            				<legend>Personal Details</legend>
                                <div class="container1 col-md-6">
                                    <div class="form-group" style="width:45%">
                                        <label for="">Reg No</label>
                                        <input type="text" class="form-control" id="" placeholder="" name="regNo" value="{{$val->regNo}}" disabled>
                                    </div>
                                    <div class="form-group" >
                                        <label for="">Full Name</label>
                                            <a href="/staff_edit?{{$val->regNo}}"  style="margin-left:10px;">Edit</a>
                                            <input type="text" class="form-control" id="" placeholder=""  value="{{$val->name}}" size="10px" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Permanent Address</label>
                                        <a href="/staff_edit?{{$val->regNo}}" style="margin-left:10px;">Edit</a>
                                        <input type="text" class="form-control" id="" placeholder="" value="{{$val->perAddr}}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Current Address</label>
                                        <a href="/staff_edit?{{$val->regNo}}" style="margin-left:10px;">Edit</a>
                                        <input type="text" class="form-control" id="" placeholder=""  value="{{$val->curAddr}}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Nationality</label>
                                        <input type="text" class="form-control" id="" placeholder="" value="{{$val->nationality}}" disabled>
                                    </div>
                            </div>

                            <center><div class="container2 col-md-4">
                                    <div class="panel-body" style="backgroung-color:black;">

                                            <img class="img-thumbnail" src="img/staff_imageupload/{{$val->img}}<?php echo ".jpg"; ?>" style="height:250px;width:180px" />

                                    </div>
        <!-- //////////////////// Remove staff ///////////////////////////////  -->
                                    <form action="/staff_remove_details?{{ $val->regNo }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" value="Remove" class="btn btn-success">
                                    </form>

                            </div></center>

                            <div class="container3 col-md-12">

                                <table class="col-md-11">

                                <tr><div class="form-group">
                                        <td><div class="col-md-12"><label for="">NIC No</label></div></td>
                                        <td><div class="col-md-12"><input style="width:200px;" type="text" class="form-control"value="{{$val->nic}}" disabled>
                                        <a href="/staff_edit?{{$val->regNo}}">Edit</a></div>
                                        </td>
                                    </div>
                                    <div class="form-group">
                                        <td><div class="col-md-12"><label for="">Date of Birth</label></div></td>
                                        <td><div class="col-md-10"><input style=style="width:230px;" type="date" class="form-control" value="{{$val->dob}}" disabled></div>


                                        </td>
                                    </div></tr>

                                    <tr><div class="form-group">
                                        <td><div class="col-md-12"><label for="">Phone No</label></div></td>
                                        <td><div class="col-md-12"><input style=style="width:230px;" type="text" class="form-control" value="{{$val->phone}}" disabled>
                                            <a href="/staff_edit?{{$val->regNo}}">Edit</a></div>
                                        </td>
                                    </div>
                                    <div class="form-group">
                                        <td><div class="col-md-12"><label for="">Email </label></div></td>
                                        <td><div class="col-md-10"><input style="width:230px;" type="email" class="form-control" value="{{$val->email}}" disabled>
                                            <a href="/staff_edit?{{$val->regNo}}">Edit</a></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <td><div class="col-md-12">
                                        <div class="form-group">
                                        <label for="">Department</label>
                                    </div></td>
                                    <td><div class="col-md-10" style="width:200px;">
                                            <input style="width:230px;" type="text" class="form-control" name="dept" value="<?php if($val->dept == null){echo "------";}else{echo $val->dept;} ?>" disabled>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div class="col-md-12">
                                        <div class="form-group">
                                        <label for="">Position</label>
                                    </div></td>
                                    <td><div class="col-md-10" style="width:200px;">
                                            <input style="width:230px;" type="text" class="form-control"  value="{{$val->pos}}" disabled>
                                        </div>
                                    </div>
                                    </td>
                                    <td><div class="col-md-12">
                                        <div class="form-group">
                                        <label for="">Gender :</label>
                                    </div>
                                    </td>
                                    <td><div class="col-md-10" style="width:200px;">
                                            <input style="width:230px;" type="text" class="form-control" value="{{$val->gender}}" disabled>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                </table>
                            </div>
                        <!-- </form> -->
                        </fieldset>
            		<div class="clearfix"></div>

                </div>
        @endforeach

                <div class="col-md-12">
                    <fieldset class="col-md-11"  style="background-color:white;">
                            <legend>Education Qualification Details</legend>
                            <div class="container1 col-md-12">
                                <!-- <form action=""> -->
                                    <table>
                                        <thead>
                                            <center><h4><strong>University</strong></h4></center>
                                        </thead>
                                    <tbody>

                                        <tr>
                                           <th class="col col-md-3">Degree</th>
                                           <th class="col col-md-2">University</th>
                                           <th class="col col-md-3">Specialization/major</th>
                                           <th class="col col-md-2">Year</th>
                                           <th class="col col-md-2">Country</th>
                                        </tr>
                                        @foreach($uni as $val)
                                        <tr>
                                            <td><input type="text" class="form-control"  value="{{$val->degree}}" disabled/></td>
                                            <td><input type="text" class="form-control"  value="{{$val->uni}}" disabled/></td>
                                            <td><input type="text" class="form-control"  value="{{$val->spec}}" disabled></td>
                                            <td><input type="text" class="form-control" value="{{$val->yr}}" disabled/></td>
                                            <td><input type="text" class="form-control"  value="{{$val->country}}" disabled/></td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <hr>
                                    <table>
                                        <thead>
                                            <center><h4><strong>School</strong></h4></center>
                                        </thead>
                                    <tbody>

                                            <tr>
                                               <th class="col col-md-3">School Name</th>
                                               <th class="col col-md-2">Grade(From)</th>
                                               <th class="col col-md-3">Grade(To)</th>
                                               <th class="col col-md-2">Qulification</th>
                                               <th class="col col-md-2">Year</th>
                                            </tr>
                                    @foreach($school as $val)
                                            <tr>
                                                <td><input type="text" class="form-control" value="{{$val->schName}}" disabled/></td>
                                                <td><input type="text" class="form-control"  value="{{$val->frm}}" disabled/></td>
                                                <td><input type="text" class="form-control"  value="{{$val->to2}}" disabled/></td>
                                                <td><input type="text" class="form-control"  value="{{$val->qli}}" disabled/></td>
                                                <td><input type="text" class="form-control"  value="{{$val->yr}}" disabled/></td>
                                            </tr>
                                    @endforeach

                                        </tbody>
                                    </table>
                                </table>
                            </div>
                        </fieldset>
                    <div class="clearfix"></div>

                </div>

                <div class="col-md-12">
                    <fieldset class="col-md-11"  style="background-color:white;">
                            <legend>Working Experiance </legend>
                            <div class="container1 col-md-12">
                                <!-- <form action=""> -->
                                    <table>
                                    <tbody>
                                        <tr>
                                           <th class="col col-md-3">From</th>
                                           <th class="col col-md-2">To</th>
                                           <th class="col col-md-3">Company/Institute Name</th>
                                           <th class="col col-md-2">Position</th>
                                        </tr>
                                @foreach($wrkEp as $val)
                                        <tr>
                                           <td><input type="text" class="form-control"  value="{{$val->frm}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->to2}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->company}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->position}}" disabled/></td>
                                        </tr>
                                @endforeach
                                @foreach($teaching as $val)
                                        <tr>
                                           <td><input type="text" class="form-control"  value="{{$val->frm}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->to2}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->institute}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->position}}" disabled/></td>
                                        </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                                </table>
                            </div>
                        </fieldset>
                    <div class="clearfix"></div>

                </div>

                <div class="col-md-12">
                    <fieldset class="col-md-11"  style="background-color:white;">
                            <legend>Achivments</legend>
                            <div class="container1 col-md-12">
                                <!-- <form action=""> -->
                                    <table>
                                    <tbody>
                                        <tr>
                                           <th class="col col-md-3">Event name</th>
                                           <th class="col col-md-4">Achivment</th>
                                           <th class="col col-md-1">Year</th>
                                        </tr>
                                @foreach($achivments as $val)
                                        <tr>
                                           <td><input type="text" class="form-control"  value="{{$val->name}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->achivment}}" disabled/></td>
                                           <td><input type="text" class="form-control"  value="{{$val->yr}}" disabled/></td>
                                        </tr>

                                @endforeach
                                        </tbody>
                                    </table>
                                </table>
                            </div>
                        </fieldset>
                    <div class="clearfix"></div>

                </div>

                <div class="col-md-12">
                    <fieldset class="col-md-11"  style="background-color:white;">
                            <legend>other Details</legend>
                            <div class="container1 col-md-12">
                                <!-- <form action=""> -->
                                    <table>
                                    <tbody>
                                @foreach($otherDetails as $val)
                                        <tr>
                                           <td>{{$val->details}}</td>
                                        </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                                </table>
                            </div>
                        </fieldset>
                    <div class="clearfix"></div>

                </div>


<?php } ?>
    </div><!--CSS end-->
</div>
@endsection
