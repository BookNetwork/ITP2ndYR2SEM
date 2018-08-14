@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="/css/staff_CSS/staff_register.css">


<div class = "aca_staff" ><!--css main class-->

        <div class="btn-group">
            <div class="col-md-12 nav_btn" style="padding: 0px">
              <a type="button" href="/staff_AcademicReg" class="btn btn-success" name="button">Academic Staff Registration</a>
              <a type="button" href="/staff_NonAcademicReg" class="btn btn-primary" name="button">Non-Academic Staff Registration</a>
                <a type="button" href="/staff_adminReg" class="btn btn-danger" name="button">Admin Registration</a>
              <hr style="margin-top: 5px; margin-bottom: 0px;">
            </div>
        </div>
        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Non-Academic Staff Register</h2></label>
          </div>
          <hr>
        </div>

<!--PERSONAL DETAILS ------------------>
<form method="post" action="save_admin" enctype="multipart/form-data">
    <div class="col-md-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if ($mess = Session::get('nonfailll'))
                <span class="alert alert-danger col-md-12">
                    <strong >l;dfdfv</strong>
                </span>
            @endif
            @if($mess = Session::get('nonsuccc'))
                  <span class="alert alert-success col-md-12">
                      <strong>{{ $mess }}</strong>
                  </span>
            @endif
        <fieldset class="col-md-11">
				<legend>Personal Details</legend>



                <div class="container1 col-md-6">
                        <div class="form-group" style="width:35%">
                            <label for="">Reg No:</label>
                            <input type="text" class="form-control text" id="regNo" placeholder="" name="regNo" value="<?php echo 'AD';?>">

                            @if ($errors->has('regNo'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{ $errors->first('regNo') }}</strong>
                                  </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="">Name :</label>
                            <input type="text" class="form-control" id="" placeholder="" name="fullName" value="">
                            @if ($errors->has('fullName'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{ $errors->first('fullName') }}</strong>
                                  </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Permanent Address :</label>
                            <input type="text" class="form-control" id="" placeholder="" name="permanantAddress">
                            @if ($errors->has('permanantAddress'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{ $errors->first('permanantAddress') }}</strong>
                                  </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Current Address :</label>
                            <input type="text" class="form-control" id="" placeholder="" name="currentAddress">
                            @if ($errors->has('currentAddress'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{ $errors->first('currentAddress') }}</strong>
                                  </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nationality :</label>
                            <input type="text" class="form-control" id="" placeholder="" name="nationality">
                            @if ($errors->has('nationality'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{ $errors->first('nationality') }}</strong>
                                  </span>
                            @endif
                        </div>
                </div>

                <center><div class="container2 col-md-4">
                    <div class="panel panel-danger" style="height:300px;width:220px">
                        <div class="panel-heading" style="text-align:center"><strong>Attach an Image</strong></div>
                        <div class="panel-body">
                            <div class="">
                                <img class="img-thumbnail" src="img/staff_image/user.jpg" rel="pleas attach an image"  id="uploadPreview"/>
                                @if ($errors->has('image'))
                                      <span class="help-block">
                                          <strong style="color: red;">{{ $errors->first('image') }}</strong>
                                      </span>
                                @endif
                                <script type="text/javascript">

                                     function PreviewImage() {
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                        oFReader.onload = function (oFREvent) {
                                            document.getElementById("uploadPreview").src = oFREvent.target.result;
                                        };
                                    };


                                </script>

                               <input type="file" class="btn btn-danger" style="width:200px;" name="image" id="uploadImage" value=" "  onchange="PreviewImage();">

                            </div>
                        </div>
                    </div>

                </div></center>

                <div class="container3 col-md-12">

                    <table class="col-md-11">

                    <tr><div class="form-group">
                            <td><div class="col-md-12"><label for="">NIC No.:</label></div></td>
                            <td><div class="col-md-12"><input style="width:200px;" type="number" class="form-control" id="" placeholder="Enter the nic without 'V'" name="nic"></div>
                            @if ($errors->has('nic'))
                                  <span class="help-block">
                                      <strong style="color: red;padding-left:25px;">{{ $errors->first('nic') }}</strong>
                                  </span>
                            @endif
                            </td>
                        </div>
                        <div class="form-group">
                            <td><div class="col-md-12"><label for="">Date of Birth :</label></div></td>
                            <td><div class="col-md-10"><input style="width:200px;" type="date" class="form-control" id="" placeholder="" name="dob" max="<?php $date = date("Y"); $year = $date - 20; echo $year.'-12-31'; ?>"></div>
                            @if ($errors->has('dob'))
                                  <span class="help-block">
                                      <strong style="color: red;padding-left:25px;">{{ $errors->first('dob') }}</strong>
                                  </span>
                            @endif
                            </td>
                        </div></tr>

                        <tr><div class="form-group">
                            <td><div class="col-md-12"><label for="">Phone No.:</label></div></td>
                            <td><div class="col-md-12"><input style="width:200px;" type="text" class="form-control" id="" placeholder="" name="phone"></div>
                            @if ($errors->has('phone'))
                                  <span class="help-block">
                                      <strong style="color: red;padding-left:25px;">{{ $errors->first('phone') }}</strong>
                                  </span>
                            @endif
                            </td>
                        </div>
                        <div class="form-group">
                            <td><div class="col-md-12"><label for="">Email :</label></div></td>
                            <td><div class="col-md-10"><input style="width:200px;" type="email" class="form-control" id="" placeholder="" name="email"></div>
                            @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong style="color: red;padding-left:25px;">{{ $errors->first('email') }}</strong>
                                  </span>
                            @endif
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <td><div class="col-md-12">
                            <div class="form-group">
                            <label for="">Position :</label>
                        </div></td>
                        <td><div class="col-md-12" style="width:200px;">
                            <input type="text" class="form-control" name="position" value="Admin">
                        </div>
                        </td>
                        <td><div class="col-md-12">
                            <div class="form-group">
                            <label for="">Gender :</label>
                        </div>
                        </td>
                        <td><div class="col-md-10" style="width:200px;">
                                <select class="form-control" name="gender">
                                    <option></option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('gender'))
                              <span class="help-block">
                                  <strong style="color: red;padding-left:25px;">{{ $errors->first('gender') }}</strong>
                              </span>
                        @endif</td>
                    </tr>


                    </table>
                        <!-- <input type="submit" class="btn btn-dangery" style="width:100px;margin-right:0px;" id="button1" value="Save"> -->
                </div>
        <!-- </form> -->
            </fieldset>
		<div class="clearfix"></div>

    </div>


<!--EDUCATION QULI DETAILS ------------------>

    <div class="col-md-12">
        <fieldset class="col-md-11">
				<legend>Education Qualification Details</legend>
                <div class="container1 col-md-12">
                    <!-- <form action=""> -->
<!--SCHOOL DETAILS-->
                        <table>
                        <tbody>
                            <tr>
                               <th class="col col-md-3">School</th>
                               <th class="col col-md-2">Grade -from</th>
                               <th class="col col-md-2">to</th>
                               <th class="col col-md-3">Qualification(A/L | O/L)</th>
                               <th class="col col-md-2">Year</th>
                            </tr>
                            <tr>
                               <td><input type="text" class="form-control" name="school1" /></td>
                               <td><input type="text" class="form-control" name="Gfrom1"/></td>
                               <td><input type="text" class="form-control" name="Gto1"/></td>
                               <td><input type="text" class="form-control" name="qli1"/></td>
                               <td><input type="text" class="form-control" name="qliyear1"/></td>
                            </tr>
                            <tr>
                               <td><input type="text" class="form-control" name="school2" /></td>
                               <td><input type="text" class="form-control" name="Gfrom2"/></td>
                               <td><input type="text" class="form-control" name="Gto2"/></td>
                               <td><input type="text" class="form-control" name="qli2"/></td>
                               <td><input type="text" class="form-control" name="qliyear2"/></td>
                            </tr>
                            <tr>
                               <td><input type="text" class="form-control" name="school3" /></td>
                               <td><input type="text" class="form-control" name="Gfrom3"/></td>
                               <td><input type="text" class="form-control" name="Gto3"/></td>
                               <td><input type="text" class="form-control" name="qli3"/></td>
                               <td><input type="text" class="form-control" name="qliyear3"/></td>
                            </tr>
                        </tbody>
                    </table>
<!--uNIVERCITY DETAILS-->
                        <table>
                        <tbody>
                            <tr>
                               <th class="col col-md-3">Degree</th>
                               <th class="col col-md-2">university</th>
                               <th class="col col-md-3">Specialization or major</th>
                               <th class="col col-md-2">Year</th>
                               <th class="col col-md-2">Country</th>
                            </tr>
                            <tr>
                               <td><input type="text" class="form-control" name="degree1"/></td>
                               <td><input type="text" class="form-control" name="uni1"/></td>
                               <td><input type="text" class="form-control" name="speci1"/></td>
                               <td><input type="text" class="form-control" name="uniyear1"/></td>
                               <td><input type="text" class="form-control" name="country1"/></td>
                            </tr>
                            <tr>
                               <td><input type="text" class="form-control" name="degree2"/></td>
                               <td><input type="text" class="form-control" name="uni2"/></td>
                               <td><input type="text" class="form-control" name="speci2"/></td>
                               <td><input type="text" class="form-control" name="uniyear2"/></td>
                               <td><input type="text" class="form-control" name="country2"/></td>
                            </tr>
                            <tr>
                               <td><input type="text" class="form-control" name="degree3"/></td>
                               <td><input type="text" class="form-control" name="uni3"/></td>
                               <td><input type="text" class="form-control" name="speci3"/></td>
                               <td><input type="text" class="form-control" name="uniyear3"/></td>
                               <td><input type="text" class="form-control" name="country3"/></td>
                            </tr>
                        </tbody>
                    </table>
                        <!-- <button type="submit" class="btn btn-dangery" style="width:100px;margin-right:0px;" id="button1" onclick="enableButton2()" enable>Save</button>

                    </form> -->

                </div>

            </fieldset>
		<div class="clearfix"></div>

    </div>

    <!--Working EXPRNC DETAILS ------------------>

        <div class="col-md-12">
            <fieldset class="col-md-11">
    				<legend>Working Exprnc Details</legend>
                    <div class="container1 col-md-12">
                        <!-- <form action="" method="post"> -->
                            <table>
                            <tbody>
                                <tr>
                                   <th class="col col-md-2">Period (From–Year)</th>
                                   <th class="col col-md-2">Period (To–Year)</th>
                                   <th class="col col-md-4">Company</th>
                                   <th class="col col-md-2">Position</th>
                                </tr>
                                <tr>
                                   <td><input type="text" class="form-control" name="from1"/></td>
                                   <td><input type="text" class="form-control" name="to1"/></td>
                                   <td><input type="text" class="form-control" name="company1"/></td>
                                   <td><input type="text" class="form-control" name="pos1"/></td>
                                </tr>
                                <tr>
                                   <td><input type="text" class="form-control" name="from2"/></td>
                                   <td><input type="text" class="form-control" name="to2"/></td>
                                   <td><input type="text" class="form-control" name="company2"/></td>
                                   <td><input type="text" class="form-control" name="pos2"/></td>
                                </tr>
                                <tr>
                                   <td><input type="text" class="form-control" name="from3"/></td>
                                   <td><input type="text" class="form-control" name="to3"/></td>
                                   <td><input type="text" class="form-control" name="company3"/></td>
                                   <td><input type="text" class="form-control" name="pos3"/></td>
                                </tr>
                            </tbody>
                        </table>

                            </table>
                                <!-- <button type="submit" class="btn btn-dangery" style="width:100px;margin-right:0px;" enable>Save</button>

                        </form> -->

                    </div>


                </fieldset>
    		<div class="clearfix"></div>

        </div>


<!-- Any further Information relevant to the Application ------------------>

                        <div class="col-md-12">
                            <fieldset class="col-md-11">
                            	<legend>Any further Information relevant to the Application</legend>
                                    <div class="container1 col-md-6">
                                        <!-- <form action=""> -->

                                            <div class="">
                                                <textarea name="details" rows="8" cols="80" style="margin-bottom:10px"></textarea>
                                            </div>
                                                </table>
                                                    <!-- <button type="submit" class="btn btn-dangery" style="width:100px;margin-right:0px;" id="button1" onclick="enableButton2()" enable>Save</button>
                                        </form> -->

                                    </div>

                            </fieldset>
                            <div class="clearfix"></div>

                        </div>
                        <button type="submit" class="btn btn-danger" style="width:100px;margin:0px 0px 20px 50px;" id="button1" onclick="enableButton2()" enable>Save</button>

</form>
</div><!--css closing class-->
@endsection
