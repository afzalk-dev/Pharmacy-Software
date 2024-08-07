<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php  include('link.php'); ?> 
<?php include('./constant/connect.php');
$sql = "SELECT * FROM purchase_invoice";
$result = mysqli_query($connect, $sql);
//echo $sql;exit;
$i = 1;


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){

        $("#searchdata").keyup(function()
        {
            var input = $(this).val();
            //  alert(input);
            if(input!='')
            {
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {input:input},
                    success:function(data)
                    {
                        $("#searchresult").html(data);
                      
                    }


                })
            }else{
                $("#searchresult").css("display", "none");
            }
        })
    })

</script>


       <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Purchase Invoice Managment</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Invoice Managment</li>
                    </ol>
                </div>
            </div>
             
            
            <div class="container-fluid">
                
                
                
                 <div class="card">
                            <div class="card-body">
                              
                            <a href="purchase-order.php"><button class="btn btn-primary">Add Billing</button></a>
                            <br><br>
                           <div class="row">
                            <div class="col-md-4">Search<input type="text" name="search" id="searchdata" placeholder="Search" class="form-control" autocomplete="off" ></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                
                           </div>
                           
                                <div id="searchresult" class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th class="text-center">#</th>
                                                <th>Date</th> 
                                                <th >Inv No.</th>
                                                <th>Company Bill No.</th>  

                            <th>Comapny</th>
                            <th>Total Amount</th>                           
                            <th>Tax(%)</th>
                            <th>Grand Total</th>
                            <th>Bonus</th>
                            <th>Paid</th>
                            <th>Due</th>                
                            <th>Peyment Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                       </thead>
                                      <tbody>
                                        <?php
                                        $i = 1;
                                        while($list = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $list['date']; ?></td>
                                            <td><?php echo $list['inv_no']; ?></td>
                                            <td><?php echo $list['compnaybill_no']; ?></td>
                                            <td><?php echo $list['comapny']; ?></td>
                                            <td><?php echo $list['total_amount']; ?></td>
                                            <td><?php echo $list['tax']; ?></td>
                                            <td><?php echo $list['grand_total']; ?></td>
                                            <td><?php echo $list['bonus']; ?></td>
                                            <td><?php echo $list['paid_amount']; ?></td>
                                            <td><?php echo $list['due_amount']; ?></td>
                                            
                                            <td><?php echo $list['peyment_status']; ?></td>
                                            <td> 
                                            <!-- <a href="p-editorder.php?id=<?php echo $list['pid']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a> -->
                                              <a href="php_action/p-removeOrder.php?id=<?php echo $list['pid']?>"  ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                              <a  href="p-view.php?id=<?php echo $list['pid']?>" ><button type="button" class="btn btn-xs btn-warning" ><i class="fa-solid fa-eye"></i></button></a>
                                              <a href="p-invoiceprint.php?id=<?php echo $list['pid']?>" ><button type="button" class="btn btn-xs btn-success" ><i class="fa fa-print"></i></button></a>
                                            </td>
                                            <?php $i++; } ?>
                                        </tr>
                                        
                                      
                                      </tbody>
                               </table>
                    
                                </div>
                                
                            </div>
                        </div>

 
<?php include('./constant/layout/footer.php');?>

