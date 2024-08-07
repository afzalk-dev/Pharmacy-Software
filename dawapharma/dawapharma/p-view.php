<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>


<?php  include('link.php'); ?> 
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
 Visit website : www.mayurik.com -->   
<?php include('./constant/connect.php');


?>
       <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View More Detailes</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View More Detailes</li>
                    </ol>
                </div>
            </div>
            <?php 
            $vid = $_GET['id'];
            $sql = "SELECT * FROM `purchase_order_tem` WHERE last_id='".$vid."'";
            $result = $connect->query($sql);
            ?>
            
            <div class="container-fluid">
                
                
                
                 <div class="card">
                            <div class="card-body">
                              
                         
                                <div class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Rate</th>
                                                <th>Total</th>
                                                <th>Date</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
foreach ($result as $row) {
    ?>
                                        <tr>
                                        
                                            <td><?php
                                            $stmt1 = "SELECT * FROM product WHERE product_id='".$row['product_name']."'";
                                            $result2 = $connect->query($stmt1);
                                            foreach($result2 as $key)
                                            {
                                             echo $key['product_name'];
                                            }
                                            ?></td>
                                            <td><?php echo $row['quantity'] ?></td>
                                            <td><?php echo $row['discount'] ?></td>
                                            <td><?php echo $row['rate'] ?></td>
                                            <td><?php echo $row['total'] ?></td>
                                            <td><?php echo $row['added_date'] ?></td>
                                        
                                           
                                          
                                        </tr>
                                      
                                    </tbody>
                                   <?php    
}
?>
                               </table>
                                </div>
                            </div>
                        </div>

 
<?php include('./constant/layout/footer.php');?>

