@extends('fazlan.staff')
@section('section')

<link rel="stylesheet" href="/css/staff_CSS/staff_register.css">

<?php
  $regNo =$_SERVER['QUERY_STRING'];
?>
<div class="col-md-12 view_det">
  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
    <label for=""><h2 class="h2">Edit Staff Details</h2></label>
  </div>
 <hr>
<div class="salary_staff">

    <div class="col-md-12">


<!--//////////////////////////////////////////////////////  -->
            <form action="name_edit" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if ($mess = Session::get('fff'))
                    <span class="alert alert-danger col-md-12">
                        <strong >{{ $mess }}</strong>
                    </span>
                @endif
                @if($mess = Session::get('sss'))
                    <span class="alert alert-success col-md-12">
                        <strong>{{$mess}}</strong>
                    </span>
                @endif
                <div class=" col-md-6">
                        <legend style="border: 2px dotted #32AD32;border-radius:5px;font-size:1.2em;text-align:center;">Name</legend>
                        <div class="container1 col-md-12">
                                <table class="col-md-12" style="margin:0px 0px 50px 0px;">
                                <tbody>

                                    <input type="hidden" class="form-control" name="regNo" value="<?php echo $regNo;?>">


                                    <tr>
                                        <div class="form-group">
                                            <td><input type="text" class="form-control" name="name" class="col-md-"></td>
                                            <td><input type="submit" class="btn btn-success col-md-02" value="Edit" style="margin-left:10px"></td>

                                        </div>
                                    </tr>
                                        @if ($errors->has('name'))
                                        <tr><td colspan="2">

                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                                  </span>

                                        </td></tr>
                                        @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
        </div>
</div>

    <div class="col-md-12">
        <div class=" col-md-6">
                        <legend style="border: 2px dotted #32AD32;border-radius:5px;font-size:1.2em;text-align:center;">Permenant address</legend>
                        <div class="container1 col-md-12">
    <!--//////////////////////////////////////////////////////  -->
                            <form action="perAddr_edit" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <table class="col-md-12" style="margin:0px 0px 50px 0px;">
                                <tbody>
                                    <input type="hidden" class="form-control" name="regNo" value="<?php echo $regNo;?>">

                                    <tr>
                                        <div class="form-group">
                                            <td><input type="text" class="form-control" name="perAddr" class="col-md-"></td>
                                            <td><input type="submit" class="btn btn-success col-md-02" value="Edit" style="margin-left:10px"></td>

                                        </div>
                                    </tr>
                                        @if ($errors->has('perAddr'))
                                        <tr><td colspan="2">

                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('perAddr') }}</strong>
                                                  </span>

                                        </td></tr>
                                        @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
        </div>
    </div>

    <div class="col-md-12">
            <div class=" col-md-6">
                            <legend style="border: 2px dotted #32AD32;border-radius:5px;font-size:1.2em;text-align:center;">Current Address </legend>
                            <div class="container1 col-md-12">
        <!--//////////////////////////////////////////////////////  -->
                                <form action="curAddr_edit" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <table class="col-md-12" style="margin:0px 0px 50px 0px;">
                                    <tbody>
                                        <input type="hidden" class="form-control" name="regNo" value="<?php echo $regNo;?>">

                                        <tr>
                                            <div class="form-group">
                                                <td><input type="text" class="form-control" name="curAddr" class="col-md-"></td>
                                                <td><input type="submit" class="btn btn-success col-md-02" value="Edit" style="margin-left:10px"></td>

                                            </div>
                                        </tr>
                                            @if ($errors->has('curAddr'))
                                            <tr><td colspan="2">

                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('curAddr') }}</strong>
                                                      </span>

                                            </td></tr>
                                            @endif
                                    </tbody>
                                </table>
                            </form>
                        </div>
            </div>
    </div>

    <div class="col-md-12">
        <div class=" col-md-6">
                        <legend style="border: 2px dotted #32AD32;border-radius:5px;font-size:1.2em;text-align:center;">NIC</legend>
                        <div class="container1 col-md-12">
    <!--//////////////////////////////////////////////////////  -->
                            <form action="nic_edit" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <table class="col-md-12" style="margin:0px 0px 50px 0px;">
                                <tbody>
                                    <input type="hidden" class="form-control" name="regNo" value="<?php echo $regNo;?>">

                                    <tr>
                                        <div class="form-group">
                                            <td><input type="text" class="form-control" name="nic" class="col-md-" placeholder="enter nic without 'V'"></td>
                                            <td><input type="submit" class="btn btn-success col-md-02" value="Edit" style="margin-left:10px"></td>

                                        </div>
                                    </tr>
                                        @if ($errors->has('nic'))
                                        <tr><td colspan="2">

                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('nic') }}</strong>
                                                  </span>

                                        </td></tr>
                                        @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class=" col-md-6">
                        <legend style="border: 2px dotted #32AD32;border-radius:5px;font-size:1.2em;text-align:center;">Phone Number</legend>
                        <div class="container1 col-md-12">
    <!--//////////////////////////////////////////////////////  -->
                            <form action="phone_edit" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table class="col-md-12" style="margin:0px 0px 50px 0px;">
                                <tbody>
                                    <input type="hidden" class="form-control" name="regNo" value="<?php echo $regNo;?>">

                                    <tr>
                                        <div class="form-group">
                                            <td><input type="text" class="form-control" name="phone" class="col-md-"></td>
                                            <td><input type="submit" class="btn btn-success col-md-02" value="Edit" style="margin-left:10px"></td>

                                        </div>
                                    </tr>
                                        @if ($errors->has('phone'))
                                        <tr><td colspan="2">

                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('phone') }}</strong>
                                                  </span>

                                        </td></tr>
                                        @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class=" col-md-6">
                        <legend style="border: 2px dotted #32AD32;border-radius:5px;font-size:1.2em;text-align:center;">Email</legend>
                        <div class="container1 col-md-12">
    <!--//////////////////////////////////////////////////////  -->
                            <form action="email_edit" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table class="col-md-12" style="margin:0px 0px 50px 0px;">
                                <tbody>
                                    <input type="hidden" class="form-control" name="regNo" value="<?php echo $regNo;?>">

                                    <tr>
                                        <div class="form-group">
                                            <td><input type="email" class="form-control" name="email" class="col-md-"></td>
                                            <td><input type="submit" class="btn btn-success col-md-02" value="Edit" style="margin-left:10px"></td>

                                        </div>
                                    </tr>
                                        @if ($errors->has('email'))
                                        <tr><td colspan="2">

                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                                  </span>

                                        </td></tr>
                                        @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
        </div>
    </div>

 </div><!-- css end-->



@endsection
