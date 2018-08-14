@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="css/staff_CSS/staff_salary.css">

<div class="salary_staff">


        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Staff Promotion</h2></label>
          </div>
<hr>
        </div>

<!--acad -->
            <div class="container col-md-12">
                <div class="container2 col-md-6">
                    <div class="col-md-12">
                            <fieldset class="col-md-11" style="border: 1px solid #32AD32 !important;">
                                <legend style="border: 1px solid #32AD32;">Academic Staff Promotion</legend>

                                <div class="container1 col-md-12">
<!--//////////////////////////////////////////////////////  -->
                                    <form action="staff_aca_promotion" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    @if ($mess = Session::get('failPro'))
                                                        <span class="alert alert-danger col-md-12">
                                                            <strong >{{ $mess }}</strong>
                                                        </span>
                                                    @endif
                                                    @if($mess = Session::get('succPro'))
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
                                                        <td class="col-md-3"><label for="">Position :</label></td>
                                                        <td>
                                                                <select class="form-control" id="" name="position">
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
                                                @if ($errors->has('position'))
                                                <tr><td colspan="2">
                                                          <span class="help-blocks">
                                                              <strong style="color: red;">{{ $errors->first('position') }}</strong>
                                                          </span>
                                                </td></tr>
                                                @endif
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success" style="width:100px;margin-top:52px;" id="button1" onclick="enableButton2()" enable> Update</button>
                                </form>

                            </div>
                </div>
            </div>

<!--non acad -->
            <div class="container2 col-md-6">
                <div class="col-md-12">
                    <fieldset class="col-md-11" style="border: 1px solid #327AC1 !important;">
                            <legend style="border: 1px solid #327AC1 !important;">Non Academic Staff Promotion</legend>

                            <div class="container1 col-md-12">
<!-- //////////////////////////////////////// -->
                                <form action="staff_NONaca_promotion" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        @if ($mess = Session::get('nonfailPro'))
                                            <span class="alert alert-danger col-md-12">
                                                <strong >{{ $mess }}</strong>
                                            </span>
                                        @endif
                                        @if($mess = Session::get('nonsuccPro'))
                                              <span class="alert alert-success col-md-12">
                                                  <strong>{{ $mess }}</strong>
                                              </span>
                                        @endif

                                    <table class="col-md-12" style="margin:20px 0px 50px 0px;">
                                        <tbody>

                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-4"><label for="">Reg No :</label></td>
                                                    <td><input type="text" class="form-control" id="" placeholder="" name="NregNo"></td>
                                                </div>
                                            </tr>
                                            @if ($errors->has('NregNo'))
                                            <tr><td colspan="2">
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('NregNo') }}</strong>
                                                      </span>
                                            </td></tr>
                                            @endif
                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-3"><label for="">Department :</label></td>
                                                    <td>
                                                        <select class="form-control" id="" name="dept">
                                                            <option></option>
                                                            <option>Finance </option>
                                                            <option>Human Resource</option>
                                                            <option>Operation</option>
                                                        </select>
                                                    </td>
                                                </div>
                                            </tr>
                                            @if ($errors->has('dept'))
                                            <tr><td colspan="2">
                                                      <span class="help-blocks">
                                                          <strong style="color: red;">{{ $errors->first('dept') }}</strong>
                                                      </span>
                                            </td></tr>
                                            @endif
                                                <tr>
                                                    <div class="form-group">
                                                        <td class="col-md-4"><label for="">Position :</label></td>
                                                        <td>
                                                                <select class="form-control" id="" name="Npos">
                                                                    <option></option>
                                                                    <option>Manager</option>
                                                                    <option>Assosiate</option>
                                                                    <option>Internship</option>
                                                                </select>
                                                        </td>
                                                    </div>
                                                </tr>
                                                @if ($errors->has('Npos'))
                                                <tr><td colspan="2">
                                                          <span class="help-blocks">
                                                              <strong style="color: red;">{{ $errors->first('Npos') }}</strong>
                                                          </span>
                                                </td></tr>
                                                @endif
                                        </tbody>
                                </table>

                                <button type="submit" class="btn btn-primary" style="width:100px;margin-right:0px;" id="button1" onclick="" enable>Update</button>

                                </form>

                            </div>


                    </div>
                </div>
        </div>
</div>
@endsection
