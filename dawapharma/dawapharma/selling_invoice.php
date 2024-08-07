<?php //error_reporting(1); ?>
<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php  include('link.php'); ?>      
<?php include("./constant/connect.php"); ?>

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

if(isset($_POST['sbtn']))
{
  for($i=0; $i<count($_POST['sl']); $i++ )
  {
      $s_no = $_POST['sl'][$i];
      $m_name = $_POST['m-name'][$i];
      $q_pkt = $_POST['qty-pkt'][$i];
      $q_pss = $_POST['qty-pss'][$i];
      $discount = $_POST['discount'][$i];
      $mrp = $_POST['mrp'][$i];
      $total = $_POST['total'][$i];
      $date = $_POST['datee'][$i];
      $subtotal = $_POST['subtotal'][$i];
      $roundoff = $_POST['roundoff'][$i];
      $ftotal = $_POST['finaltotal'][$i];
      

      
             $sqlins = "INSERT INTO `selling_invoice`( `serial_no`, `medicine`, `qty_pkt`, `qty_pss`, `discount`, `mrp`, `total`, `sub_total`, `round_off`, `final_total`, `date`)
              VALUES ('$s_no','$m_name','$q_pkt','$q_pss','$discount','$mrp','$total','$subtotal','$roundoff','$ftotal','$date')";
             $res = mysqli_query($connect , $sqlins);

             if($res)
             {
                echo "<script>alert('Submit Successfully')</script>";
             }else
             {
                echo "<script>alert('Error ! Data Not Insert')</script>";
             }
      
  }

  
}


?>


<script type="text/javascript">
$(document).on('keyup', '.inp', function() {
  var $row = $(this).closest('tr'); // Get the current row

  var quantity = parseInt($row.find('#qty-pkt').val());
  var mrp = parseInt($row.find('#mrpno').val());
  var discount = parseInt($row.find('#discount').val());

  var total = quantity * mrp;
  var discountAmount = total * (discount / 100);
  total = total - discountAmount;

  $row.find('#tp').val(total);
});

// $(document).keyup(function() {

//   var quantity = parseInt($("#qty-pkt").val());
//   var mrp = parseInt($("#mrpno").val());
//   var discount = parseInt($("#discount").val());


//   var total = quantity * mrp;

//   var discountAmount = total * (discount / 100);

  
//   total = total - discountAmount;

//   $("#tp").val(total);
// });
</script> 

<!-- <script>
  $(document).ready(function()
  {
    $("#add-row").click(function(){
        $.ajax({
            url: 'addrow.php', // PHP file to handle data
            type: 'POST',
            data: { action: 'addrow' }, // Action to perform in PHP
            success: function(response){
                // Append the response to the table body
                $('#data-table').append(response);
            }
        });
    });
  });
</script> -->

      <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Selling Invoice</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Selling Invoice</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
            
            <div class="card">
                <div class="card-body">
                <a href="add-product.php" target="blank" accesskey="w" aria-atomic="true" style="display: none;" >Add Medicine</a>
                <a href="p_invoice.php" target="blank" accesskey="p" aria-atomic="true" style="display: none;" >Selling</a>
                <br>
              <form action="" method="post" >
              <input type="hidden" name="action" value="saveAddMore">
                        <div class="row">
                            <div class="col-sm-3"> 
                       
                    </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3">
                                <input  value="<?php echo date('d/m/Y'); ?>" class="form-control" name="datee[]" id="">
                            </div>
                        </div>
                        
                        <table class="table table-bordered table-striped " id="data-table">
                          
                          <thead>
                            <tr>
                            <th>Seriel No</th>
                            <th class="text-center">Perticular</th>
                            <th>Qty Pkt</th>
                            <th>Qty Pss</th>
                            <th>Discount</th>
                            <th>MRP</th>
                            <th>Total</th>
                            </tr>
                          </thead>
                          <tbody id="tbody">
                            <tr>
                            <td><input class="inp" type="text" placeholder="" value="1001"  id="sl" name="sl[]" readonly ></td>
                            <td class="text-center" >
                            <select class="chosen" name="m-name[]" id="select" onchange="selectdata(this.options[this.selectedIndex].value)"  required>
                        <option selected >Medicine</option>
                        <?php
                          while($list = mysqli_fetch_assoc($run6))
                          { ?>
                          <option value="<?php echo $list['product_id']; ?>" ><?php echo $list['product_name'] ?></option>';
                          <?php }
                        ?> 
                      </select>
                            </td>
                            <td ><input class="inp" type="text" placeholder="" id="qty-pkt" name="qty-pkt[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="qty-pss" name="qty-pss[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="discount" name="discount[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="mrpno" name="mrp[]" ></td>
                            <td ><input class="inp" type="text" placeholder="" id="tp" name="total[]" ></td>
                            </tr>
                          </tbody>
                        
                          
                          <br><tbody id="next" ></tbody>
                        </table>
                     
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                  <button type="button" name='addBtn' id="addrow" class='btn pull-right' accesskey="a" ><i class="fa-solid fa-circle-plus text-success add"></i></button>
                  </div>
                </div>
                 <br>
                 <div class="row">
                  <div class="col-md-8">
                  
                  <table class="table table-striped table-bordered" id="table" >
                    <thead>
                      <tr>
                        <th>Quantity</th>
                        <th>Formulation</th>
                        <th>MRP</th>
                        <th>T.P</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="qty" ></td>
                        <td id="frm" ></td>
                        <td id="mrp" ></td>
                        <td id="tpl" ></td>
                      </tr>
                    </tbody>
                  </table>

                  </div>
                  <div class="col-md-4">
                    <table class="table table-bordered table-striped" >
                      <th>Sub Total</th>
                      <td ><input class="inp" type="text" placeholder=""  name="subtotal[]" ></td>
                    </table>
                 
                    <table class="table table-bordered table-striped" >
                      <th>Round off</th>
                      <td ><input class="inp" type="text" placeholder=""  name="roundoff[]" ></td>
                    </table>
                 
                    <table class="table table-bordered table-striped" >
                      <th>Final Total</th>
                      <td ><input class="inp" type="text" placeholder=""  name="finaltotal[]" ></td>
                    </table>
               
                  </div>
                 </div>
                <br><br>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <button type="submit" name="sbtn" class="btn btn-outline-primary btn-block" >Submit</button>
                  </div>
                </div>
              </div>
            </div>
            


           <!-- <script src="jquery-3.2.1.min.js"></script>
           <script src="bootstrap_js/bootstrap.min.js"></script> -->
           <!-- <script>
            $('#addrow').click(function()
            {
              var length = $('#sl').length;
              var i = parseInt(length)+parseInt(1001);
              // alert(i)
              var newrow = $('#next').append('<tr><td><input class="inp" type="text"  placeholder="" value="'+i+'"  name="sl[]" readonly ></td>  <td > </td><td ><input class="inp" type="text" placeholder="" id="qty-pkt'+i+'" name="qty-pkt[]" ></td><td ><input class="inp" type="text" placeholder="" id="qty-pss'+i+'" name="qty-pss[]" ></td><td ><input class="inp" type="text" placeholder="" id="discount'+i+'" name="discount[]" ></td>  <td ><input class="inp" type="text" placeholder="" id="mrpno'+i+'" name="mrp[]" ></td><td ><input class="inp" type="text" placeholder="" id="tp'+i+'" name="total[]" ></td></tr>'); 
            });
           </script> -->
           <script>
        $(document).ready(function() {
    var rowNumber = 1002; // Initialize serial number variable

    // Add row on button click
    $("#addrow").click(function() {
        var newRow = `<tr>
            <td>${rowNumber++}</td>
            <td>
                <select class="chosen" name="m-name[]"  id="select" onchange="selectdata(this.options[this.selectedIndex].value)"  required>
                    <option selected>Medicine</option>
                    </select>
            </td>
            <td><input class="inp" type="text" id="qty-pkt"  name="qty-pkt[]"></td>
            <td><input class="inp" type="text" id="qty-pss" name="qty-pss[]"></td>
            <td><input class="inp" type="text" id="discount" name="discount[]"></td>
            <td><input class="inp" type="text" id="mrpno" name="mrp[]"></td>
            <td><input class="inp" type="text" id="tp" name="total[]"></td>
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

            </script>
          
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
                    // alert(data)
                    console.log(data.id);
                   jQuery('#table').show
                   jQuery('#qty').html(data.quantity)
                   jQuery('#frm').html(data.formulation)
                   jQuery('#mrp').html(data.mrp)
                   jQuery('#tpl').html(data.tp);

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
