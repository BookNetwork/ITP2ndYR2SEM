<!DOCTYPE html>
<html>
<head>
    <title>Salary Report</title>
    <link rel="stylesheet" href="css/staff_CSS/prinSal.css">
    <link rel="stylesheet" href="css/staff_CSS/staff_salGen.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts-1.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<center>
<body>

        <div class="col-md-12" >
            <img src="img/staff_image/logo.jpg" alt="">
        </div>
        <div class="col-md-12" >
            <div style="font-size:2em;font-weight:bold;">KHAIRIYA MUSLIM GIRLS COLLEGE</div>
            <div class="">166, Dematagoda Road Colombo 09,Dematagoda</div>
        </div><br>
        <?php
            $salGen = \DB::table('temp')->get();
        ?>
        <table class="table table-bordered col-md-10" >
            <thead>
                <div style="font-weight:bold;">SALARY REPORT FOR <?php echo date("Y/m/d");?></div>
            </thead>
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
                <th>Basic Sal</th>
                <th>OT allwnc</th>
                <th>Loan instlmnt</th>
                <th>ETF 10%</th>
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
                      if($val->loanInstlment == null){
                          echo "-";
                      }else{
                          $v = $val->loanInstlment;
                          echo $v;
                          $remLoan = \DB::table('loan')->where('regNo',$val->regNo)->get();
                          foreach ($remLoan as $val) {
                              $rem = $val->remLoanAmount;
                          }
                              $update = $rem - $v;
                              \DB::table('loan')->where('regNo',$val->regNo)->update(['remLoanAmount'=>$rem]);
                      }?>
                  </td>
                  <td><?php echo $etfVal = $bsal * ($etf/100); ?></td>
                  <td><?php echo $bsal - $v - $etfVal; ?></td>
                  <td><?php echo $e = $bsal * ($epf/100);?></td>

              </tr>
              @endforeach
        </table>
        <script type="text/javascript">
            window.print();
        </script>


</body>
</center>

</html>
