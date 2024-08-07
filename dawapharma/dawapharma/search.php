<?php
include 'constant/connect.php';
$srch = $_POST['input'];
$q = "SELECT * FROM purchase_invoice where inv_no like '%$srch%' or compnaybill_no like '%$srch%' or comapny like '%$srch%' or peyment_status like '%$srch%'";
$run = mysqli_query($connect, $q);
if(mysqli_num_rows($run) > 0)
{
?>

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
                                        while($list = mysqli_fetch_assoc($run))
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
                                              <a href="invoiceprint.php?id=<?php echo $list['pid']?>" ><button type="button" class="btn btn-xs btn-success" ><i class="fa fa-print"></i></button></a>
                                            </td>
                                            <?php $i++; } ?>
                                        </tr>
                                        
                                      
                                      </tbody>
                               </table>
                    
                                </div>



<?php
}
?>