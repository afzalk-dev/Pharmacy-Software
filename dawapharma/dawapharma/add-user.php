<?php //error_reporting(1); ?>
<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
<?php  include('link.php'); ?>      

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  

      
      <?php
      include("./constant/connect.php");
      
      if(isset($_POST['ucreatebtn']))
      {
          $username =  $_POST['username'];
          $pass =      $_POST['pass'];
          $useremail = $_POST['email'];
          $role = 0;

          $q = "INSERT INTO `users`(username, password, email, role ) VALUES ('".$username."','".$pass."','".$useremail."' , '".$role."')";
          $run = mysqli_query($connect , $q);
          
          if($run)
          {
            echo "<script>alert('User Create SuccessFully')</script>";
          }else{
            echo "<script>alert('User Not Created | Error Found')</script>";
          }
      }

      ?>



      <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                
                
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div id="add-brand-messages"></div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"   >

                                   
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">User Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text"  class="form-control"id="username" placeholder="User Name" name="username"  required="" />
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-9">
                                                  <input type="password"  class="form-control"id="pass" placeholder="Password" name="pass"  required="" />
                                                </div>
                                            </div><br>
                                        <div class="row">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                  <input type="email"  class="form-control"id="email" placeholder="Enter Email" name="email"  required="" />
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                


                                        <button type="submit" name="ucreatebtn" id="usercreateBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Create User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                





            <?php include ('./constant/layout/footer.php');?>
        <script>
        $(function(){
            $(".preloader").fadeOut();
        })
        </script>
        <script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([ ['Contry', 'Mhl'],<?php echo $datavalue1;?>]);

var options = {
  title:'World Wide Wine Production',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);

  var chart = new google.visualization.BarChart(document.getElementById('myChart1'));
  chart.draw(data, options);
}
</script>