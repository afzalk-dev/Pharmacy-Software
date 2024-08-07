<?php //error_reporting(1); ?>
<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>
<?php  include('link.php'); ?>      
<?php
include("./constant/connect.php");
$sqlq = "SELECT brand_name FROM brands WHERE brand_status = 1"; 
$run1 = mysqli_query($connect , $sqlq);
?>

<?php
$sqlselect = "SELECT product_id , product_name FROM product";
$run6 = mysqli_query($connect, $sqlselect);
?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />



<style>
  .add
  {
    font-size: 30px;
    text-align: center;
    cursor: pointer;
  }
  .btn
  {
    display: block;
    outline: none;
    border: 0;
    background: none;
  }
  .inp
  {
    border: 0;
    outline: none;
    background: none;
    width: 35px;
  }
  /* .slc
  {
    background: none;
    outline: none;
    border: 0;
  } */
</style>

<?php

if(isset($_POST['pbtn']))
{
  for($i=0; $i<count($_POST['sl']); $i++ )
  {
      $s_no = $_POST['sl'][$i];
      $m_name = $_POST['m-name'][$i];
      $q_pkt = $_POST['qty-pkt'][$i];
      $q_pss = $_POST['qty-pss'][$i];
      $bonus = $_POST['bonus'][$i];
      $disc = $_POST['disc'][$i];
      $rate = $_POST['rate'][$i];
      $cb_no = $_POST['companyb-no'][$i];
      $tp = $_POST['tp'][$i];
      $dtr = $_POST['dtr'][$i];
      $datee = $_POST['datee'][$i];
      $sub_total = $_POST['sub-total'][$i];
      $tax = $_POST['tax'][$i];
      $total = $_POST['final-total'][$i];
      

      
             $sql3 = "INSERT INTO `purchase_invoice`( `medicine_name`, `qty_pkt`, `qty_pss`, `bonus`, `discount`, `tp`, `rate`, `bilno_company`, `company`, `date`, `sub_total`, `tax`, `final_total`, `seriel_no`) 
             VALUES ('".$m_name."','".$q_pkt."','".$q_pss."','".$bonus."','".$disc."','".$tp."','".$rate."','".$cb_no."','".$dtr."','".$datee."','".$sub_total."','".$tax."','".$total."','".$s_no."')";
             $run2 = mysqli_query($connect , $sql3);

            if($run2)
            {
              echo "<script>alert('Submit Successfully')</script>";
            }else
            {
              echo "<script>alert('Error ! Data Not Insert')</script>";
            }
      
  }
 
  
}


?>



      <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Purchase Invoice</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Invoice</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
            
            <div class="card">
                <div class="card-body">
                <a href="add-product.php" target="blank" accesskey="w" aria-atomic="true" style="display: none;" >Add Medicine</a>
                <a href="#" target="blank" accesskey="s" aria-atomic="true" style="display: none;" >Selling</a>
                <br>
              <form action="" method="post" >
                        <div class="row">
                            <div class="col-sm-3"> 
                            <input class="form-control" type="text" placeholder="Company B.No" id="companyb-no" name="companyb-no[]" >
                        <select class="form-control" name="dtr[]" required>
                        <option selected >Distrubution</option>
                        <?php
                          while($row3 = mysqli_fetch_assoc($run1))
                          {
                            echo '<option value="'.$row3['brand_name'].'" >'.$row3['brand_name'].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                            
                            </div>
                            <div class="col-sm-3">
                                <input  value="<?php echo date('d/m/Y'); ?>" class="form-control" name="datee[]" id="">
                                <?php 
$user ="select * from purchase_invoice where  pinvoice_id=(select max(pinvoice_id) from purchase_invoice)";
//echo $user;exit;
$result = $connect->query($user);
foreach ($result as $res ) {
   # code...
}

$n="100";
   $l=$res['pinvoice_id']+1;
   $stall_no= $n."".$l; ?>  
                            <input class="form-control" type="text" placeholder="" value="<?php echo $stall_no; ?>"  id="sl" name="sl[]"  ></td>
                            </div>
                        </div>
                        
                        <table class="table table-bordered table-striped " id="medicine-table">
                          
                          <thead>
                            <!-- <th>Seriel No</th> -->
                            <th>Perticular</th>
                            <th>Qty Pkt</th>
                            <th>Qty Pss</th>
                            <th>Bonus</th>
                            <th>Discount</th>
                            <th>T.P</th>
                            <th>Total</th>
                          </thead>
                          <tbody id="tbody" >
                            <!-- <td style="width: 140px; text-align:left;">
                           
                            <td  > -->
                              <td>
                            <select class="chosen" name="m-name[]" id="fetch" onchange="selectdata(this.options[this.selectedIndex].value)"  required>
                        <option selected >Medicine</option>
                        <?php
                          while($list = mysqli_fetch_assoc($run6))
                          { ?>
                          <option value="<?php echo $list['product_id']; ?>" ><?php echo $list['product_name']; ?></option>
                    <?php } ?> 
                           </select>
                            </td>
                            <td ><input class="inp" type="text" placeholder="" id="qty-pkt" name="qty-pkt[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="qty-pss" name="qty-pss[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="bonus" name="bonus[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="disc" name="disc[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" value="" id="tpv" name="rate[]" ></td>
                            <td style="width:150px;" ><input class="inp" type="text" placeholder="" id="total" name="tp[]" ></td>
                          </tbody>
                        
                          
                          
                        </table>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                  <button type="button" name='addrow' id='add-row' class='btn pull-right' accesskey="a" ><i class="fa-solid fa-circle-plus text-success add"></i></button>
                  </div>
                </div>
                 <br>
                 <div class="row">
                  <div class="col-md-8">
                  
                  <table class="table table-striped table-bordered" id="table" >
                    <thead>
                      <tr>
                        <!-- <th>Company</th> -->
                        <th>Quantity</th>
                        <th>Formulation</th>
                        <th>Rate</th>
                        <th>T.P</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <!-- <td id="cmp" ></td> -->
                        <td id="qty" ></td>
                        <td id="frm" ></td>
                        <td id="rate" ></td>
                        <td id="tp" ></td>
                      </tr>
                    </tbody>
                  </table>

                  </div>
                  <div class="col-md-4">
                    <table class="table table-bordered table-striped" >
                      <th>Sub Total</th>
                      <td ><input class="inp" type="text" placeholder="" id="total_amount"  name="sub-total[]" ></td>
                    </table>
                 
                    <table class="table table-bordered table-striped" >
                      <th>Tax</th>
                      <td ><input class="inp" type="text" placeholder="" id="tax" name="tax[]" ></td>
                    </table>
                 
                    <table class="table table-bordered table-striped" >
                      <th>Final Total</th>
                      <td ><input class="inp" type="text" placeholder="" id="final-total" name="final-total[]" ></td>
                    </table>
               
                  </div>
                 </div>
                <br><br>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <button type="submit" name="pbtn" class="btn btn-primary btn-flat btn-block " >Submit</button>
                  </div>
                </div>
              </div>
            </div>
            
           <!-- <script src="jquery-3.2.1.min.js"></script>
           <script src="bootstrap_js/bootstrap.min.js"></script> -->
           <!-- <script>
            $('#add-row').click(function()
            {
              var length = $('#sl').length;
              var i = parseInt(length)+parseInt(1001);
              // alert(i)
              var newrow = $('#next').append('<tr><td><input class="inp" type="text"  placeholder="" value="'+i+'"  name="sl[]" readonly ></td> <td >  <select class="chosen" name="m-name[]" id="fetch" onchange="selectdata(this.options[this.selectedIndex].value)"  required> <option selected >Medicine</option><?php    while($list = mysqli_fetch_assoc($run6)) { ?>  <option value="<?php echo $list['product_id']; ?>" ><?php echo $list['product_name']; ?></option>  <?php } ?>  </select></td> <td ><input class="inp" type="text" placeholder="" id="qty-pkt'+i+'" name="qty-pkt[]" ></td><td ><input class="inp" type="text" placeholder="" id="qty-pss'+i+'" name="qty-pss[]" ></td> <td ><input class="inp" type="text" placeholder="" id="bonus'+i+'" name="bonus[]" ></td>  <td ><input class="inp" type="text" placeholder="" id="disc'+i+'" name="disc[]" ></td>  <td ><input class="inp" type="text" placeholder="" id="tpv'+i+'" name="rate[]" ></td><td ><input class="inp" type="text" placeholder="" id="tp'+i+'" name="tp[]" ></td></tr>'); 
            });
           </script> -->
           


          
          
          
           </form>

</div>




            <?php include ('./constant/layout/footer.php');?>

            <script>
        function selectdata(id)
        {
         
            jQuery.ajax({
                url:'selectdata.php',
                type:'POST',
                data:'id='+id, 
                success:function(result)
                {
                    var data = jQuery.parseJSON(result);
                    //alert(data)
                    console.log(data.id); 
                   jQuery('#table').show
                   jQuery('#qty').html(data.quantity)
                   jQuery('#frm').html(data.formulation)
                   jQuery('#rate').html(data.rate)
                   jQuery('#tp').html(data.tp);

                }
            })
        }

      
    </script>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" ></script>
<script>
  jQuery('.chosen').chosen();
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>

<script>
   $(document).ready(function() {
    

    // Add row on button click
    $("#add-row").click(function() {
   
        var newRow = `<tr>
            
            <td>
                <select class="chosen" name="m-name[]"  id="select" onchange="selectdata(this.options[this.selectedIndex].value)"  required>
                    <option selected>Medicine</option>
                    </select>
            </td>
            <td ><input class="inp" type="text" placeholder="" id="qty-pkt" name="qty-pkt[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="qty-pss" name="qty-pss[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="bonus" name="bonus[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="disc" name="disc[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" value="" id="tpv" name="rate[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="total" name="tp[]" ></td>
            <td><center><button class="btn  btn-outline-danger" id="removebtn" >Remove</button></center></td>
        </tr>`;
        $("#tbody").append(newRow);
    
        fetch("addrow.php?action=getMedicineOptions")
            .then(response => response.json())
            .then(data => {
                var select = $("#tbody tr:last-child select");
                data.forEach(option => {
                    select.append(`<option value="${option.product_id}">${option.product_name}</option>`);
                    
                }); 
                  
            });
    });
   
    $(document).on("click", "#removebtn", function() {
        $(this).closest("tr").remove();
    });
});

$(document).on('keyup', '.inp', function() {
  var $row = $(this).closest('tr'); // Get the current row

  var quantity = parseInt($row.find('#qty-pkt').val());
  var mrp = parseInt($row.find('#tpv').val());
  var discount = parseInt($row.find('#disc').val());

  var total = quantity * mrp;
  var discountAmount = total * (discount / 100);
  total = total - discountAmount;

  $row.find('#total').val(total);
});

$(function()
{
  var total_amount =function()
  {
    var sum=0;
    
    $('.inp').each(function()
    {
       var num =  $(this).val();
       if(num !== 0)
       {
         sum +=parseFloat(num);
       }
    });
      $('#total_amount').val(sum);
  }
  $('.inp').keyup(function()
  {
    total_amount();
  })
})

</script>