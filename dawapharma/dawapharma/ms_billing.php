<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php  include('link.php'); ?> 
<?php include('./constant/connect.php');
$sql = "SELECT * FROM selling_invoice";
$rbz = mysqli_query($connect, $sql);
//echo $sql;exit;

?>
       <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Selling Invoice</h3> </div>
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
                              
                            <a href="p_invoice.php"><button class="btn btn-primary">Add Billing</button></a>
                            <br><br>
                           <div class="row">
                            <div class="col-md-4">Search<input type="text" name="search" id="search" placeholder="Search" class="form-control" autocomplete="off" ></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                
                           </div>
                           
                                <div id="searchresult" class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th class="text-center">#</th>
                                                <th >Serial No.</th>

                            <th>Perticular</th>
                            <th>Qty Pakket</th>                           
                            <th>Qty PSS</th>
                            <th>Discount</th>
                            <th>MRP</th>
                            <th>Total</th>                
                            <th>Sub Total</th>
                            <th>Round Off</th>
                            <th>Final Total</th>
                            <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                      <tbody>
                                        <?php
                                        while($list = mysqli_fetch_assoc($rbz))
                                        {
                                        ?>
                                        
                                        <tr>
                                            <td><?php  ?></td>
                                            <td><?php echo $list['serial_no']; ?></td>
                                            <td><?php echo $list['medicine']; ?></td>
                                            <td><?php echo $list['qty_pkt']; ?></td>
                                            <td><?php echo $list['qty_pss']; ?></td>
                                            <td><?php echo $list['discount']; ?></td>
                                            <td><?php echo $list['mrp']; ?></td>
                                            <td><?php echo $list['total']; ?></td>
                                            <td><?php echo $list['sub_total']; ?></td>
                                            <td><?php echo $list['round_off']; ?></td>
                                            <td><?php echo $list['final_total']; ?></td>
                                            <td><?php echo $list['date']; ?></td>
                                            <td> 
                                            <a href="editp_invoice.php?id=<?php echo $row['pinvoice_id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                              

             
                                              <a href="removeProduct.php?id=<?php echo $row['pinvoice_id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                            </td>
                                           
                                        </tr>

                                        <?php } ?>
                                      </tbody>
                               </table>
                    
                                </div>
                                
                            </div>
                        </div>

 
<?php include('./constant/layout/footer.php');?>

