@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="css/staff_CSS/staff_salary.css">

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

        <center>    <div class="container2 col-md-6" style="">
                <div class="col-md-12">
                        <fieldset class="col-md-11" style="border: 1px solid #32AD32 !important;">
                            <legend style="border: 1px solid #32AD32;">Reset Passowrd</legend>


                            <div class="container1 col-md-12">
<!--//////////////////////////////////////////////////////  -->
                                <form action="restPASS" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                @if ($mess = Session::get('f'))
                                                    <span class="alert alert-danger col-md-12">
                                                        <strong >{{ $mess }}</strong>
                                                    </span>
                                                @endif
                                                @if($mess = Session::get('s'))
                                                      <span class="alert alert-success col-md-12">
                                                          <strong>{{ $mess }}</strong>
                                                      </span>
                                                @endif
                                    <table class="col-md-12" style="margin:20px 0px 0px 0px;">
                                    <tbody>
                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-4"><label for="">Reg No :</label></td>
                                                <td><input type="text" class="form-control" id="" placeholder="" name="regNo"></td>
                                            </div>
                                        </tr>
                                            @if ($errors->has('regNo'))
                                            <tr><td colspan="2">

                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('regNo') }}</strong>
                                                      </span>

                                            </td></tr>
                                            @endif
                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-4"><label for="">New Password :</label></td>
                                                    <td><input type="text" class="form-control" id="" placeholder="" name="pass"></td>
                                                </div>
                                            </tr>
                                                @if ($errors->has('pass'))
                                                <tr><td colspan="2">

                                                          <span class="help-blocks">
                                                              <strong style="color: red;">{{ $errors->first('pass') }}</strong>
                                                          </span>

                                                </td></tr>
                                                @endif

                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success" style="width:100px;margin-top:52px;"> Update</button>
                            </form>

                        </div>
            </div>
        </div>
</div>




@endsection
