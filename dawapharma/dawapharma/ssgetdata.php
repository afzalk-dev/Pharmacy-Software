<?php
require 'constant/connect.php';
$search = $_POST['input'];
$query ="SELECT * FROM orders where  clientName like '%$search%' or uno like '%$search%' or orderDate like '%$search%'  ";
$run5 = mysqli_query($connect , $query);
if(mysqli_num_rows($run5) > 0){
?>
     <div id="searchresult" class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th class="text-center">#</th>
                        <th>Order Date</th>
                        <th>Client Name</th>
                        <th>Contact</th>
                        
                        <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
foreach ($run5 as $row) {
     
$no+=1;
    ?>
                                        <tr>
                                            <td class="text-center"><?=$no; ?></td>
                                            <td><?php echo $row['orderDate'] ?></td>
                                             <td><?php echo $row['clientName'] ?></td>
                                              <td><?php echo $row['clientContact'] ?></td>
                                             
                                               
                                            <td><?php  if($row['paymentStatus']==1)
                                            {
                                                 
                                                 $paymentStatus = "<label class='label label-success' ><h4>Full Payment</h4></label>";
                                                 echo $paymentStatus;
                                            }
                                            else if($row['payment_status']==2){
                                                $paymentStatus = "<label class='label label-danger'><h4>Advance Payment</h4></label>";
                                                echo $paymentStatus;
                                            }else {
                                                $paymentStatus = "<label class='label label-warning'><h4>No Payment</h4></label>";
                                                 echo $paymentStatus;
                                                } // /els
                                            ?></td>
                                            <td>
            
                                                <a href="editorder.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                              

             
                                                <a href="php_action/removeOrder.php?id=<?php echo $row['id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>

                                                <a href="invoiceprint.php?id=<?php echo $row['id']?>" ><button type="button" class="btn btn-xs btn-success" ><i class="fa fa-print"></i></button></a>
                                           
                                                
                                                </td>
                                        </tr>
                                     
                                    </tbody>
                                   <?php    
}

?>
                               </table>
                                </div>
<?php } ?>