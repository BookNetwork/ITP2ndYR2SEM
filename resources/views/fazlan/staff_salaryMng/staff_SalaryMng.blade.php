@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="css/staff_CSS/staff_salary.css">

<div class="salary_staff">

    <!--Top bttns-->
    <!--    <div class="btn-group">
            <div class="col-md-12 nav_btn" style="padding: 0px">
              <a type="button" href="" class="btn btn-success" name="button">Salary Managment</a>
              <a type="button" href="" class="btn btn-success" name="button">Loan Handling</a>
              <hr style="margin-top: 5px; margin-bottom: 0px;">
            </div>
        </div>
    -->
        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Staff Salary Managment</h2></label>
          </div>
          <hr>
        </div>


    <!--//////////////////////////////-->

<!--academic staff salary Managment-->
    <div class="container col-md-12">
        <div class="container2 col-md-6">
            <div class="col-md-12">
                    <fieldset class="col-md-11" style="border: 1px solid #32AD32 !important;">
                        <legend style="border: 1px solid #32AD32;">Academic Staff Salary</legend>

                        <div class="col-md-12 view_det">
                          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
                            <label for=""><h4 class="h4">Update Salary Details</h4></label>
                          </div>
                          <hr>
                        </div>


                        <div class="container1 col-md-12">
<!-- ///////////////////////////////////////////////////  -->
                        <form action="update_acaSalary" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                @if ($mess = Session::get('AfailPro'))
                                    <span class="alert alert-danger col-md-12">
                                        <strong >{{ $mess }}</strong>
                                    </span>
                                @endif
                                @if($mess = Session::get('AsuccPro'))
                                         <span class="alert alert-success col-md-12">
                                                <strong>{{ $mess }}</strong>
                                            </span>
                                @endif
                                <table class="col-md-12">
                                <tbody>
                                    <?php
                                        $qry = \DB::table('sal_details')->select('salDeId')->where('position','=','Senior')
                                                                                           ->orWhere('position','=','Junior')
                                                                                           ->orwhere('position','=','intern')
                                                                                           ->get();
                                     ?>
                                     <tr>
                                         <div class="form-group">
                                             <td class="col-md-3"><label for="">Salary ID </label></td>
                                             <td>

                                                     <select class="form-control" name="AcademicPosition">
                                                         <option></option>
                                                    @foreach($qry as $ID)
                                                         <option>{{$ID->salDeId}}</option>
                                                    @endforeach
                                                     </select>
                                             </td>
                                         </div>
                                     </tr>
                                        @if ($errors->has('Academic_salID'))
                                        <tr><td colspan="2">

                                                  <span class="help-blocks">
                                                      <strong style="color: red;">{{ $errors->first('Academic_salID') }}</strong>
                                                  </span>

                                        </td></tr>
                                        @endif
                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-4"><label for="">Basic Sal(Rs)</label></td>
                                                <td><input type="number" class="form-control" id="" placeholder="" name="B_sal"></td>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td class="col-md-3"><label for="">OTR hour(Rs)</label></td>
                                                <td><input type="number" class="form-control" id="" placeholder="" name="Aca_OTR"></td>
                                            </div>
                                        </tr>

                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success" style="width:100px;margin-top:0px;" id="button1" onclick="enableButton2()" enable> Update</button>
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
                            <label for=""><h4 class="h4">Update Salary Details</h4></label>
                          </div>
                          <hr>
                        </div>

                        <div class="container1 col-md-12">
<!-- /////////////////////////////////////////// -->
                            <form action="update_nonAcaSalary" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    @if ($mess = Session::get('NAfailPro'))
                                        <span class="alert alert-danger col-md-12">
                                            <strong >{{ $mess }}</strong>
                                        </span>
                                    @endif
                                    @if($mess = Session::get('NAsuccPro'))
                                             <span class="alert alert-success col-md-12">
                                                    <strong>{{ $mess }}</strong>
                                                </span>
                                    @endif
                                <table class="col-md-12">
                                    <tbody>

                                        <?php
                                            $qry = \DB::table('sal_details')->select('salDeId')->where('dept','=','Finance')
                                                                                               ->orWhere('dept','=','Human_Resource')
                                                                                               ->orwhere('dept','=','Operation')
                                                                                               ->orwhere('position','=','Admin')
                                                                                               ->get();
                                         ?>
                                         <tr>
                                             <div class="form-group">
                                                 <td class="col-md-4"><label for="">Salary ID</label></td>
                                                 <td>

                                                         <select class="form-control" name="NonAcademic_salID" >
                                                             <option></option>
                                                             @foreach($qry as $ID)
                                                                  <option>{{$ID->salDeId}}</option>
                                                             @endforeach
                                                         </select>
                                                 </td>
                                             </div>
                                         </tr>
                                                @if ($errors->has('NonAcademic_salID'))
                                                <tr><td colspan="2">

                                                          <span class="help-blocks">
                                                              <strong style="color: red;">{{ $errors->first('NonAcademic_salID') }}</strong>
                                                          </span>

                                                </td></tr>
                                                @endif
                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-3"><label for="">Basic Sal(Rs)</label></td>
                                                    <td><input type="number" class="form-control" id="" placeholder="" name="B_sal"></td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">
                                                    <td class="col-md-3"><label for="">OTR hour </label></td>
                                                    <td><input type="number" class="form-control" id="" placeholder="" name="NAca_OTR"></td>
                                                </div>
                                            </tr>

                                    </tbody>
                            </table>

                        </table>
                            <button type="submit" class="btn btn-primary" style="width:100px;" id="button1" onclick="enableButton2()" enable> Update</button>
                            </form>

                        </div>


                </div>
            </div>
        </div>
</div>


@endsection
