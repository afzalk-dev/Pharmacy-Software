<?php
require 'constant/connect.php';
$search = $_POST['input'];
$query ="SELECT * FROM product where product_name like '%$search%'  or formulation like '%$search%' ";
$run5 = mysqli_query($connect , $query);
if(mysqli_num_rows($run5) > 0){
?>
       <div class="table-responsive m-t-40">
                                    <table id="search_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th class="text-center">#</th>
                                                <th style="width:10%;">Photo</th>

                            <th>Medicine Name</th>
                            <th>Rate</th>    
                            <th>Percente</th>                           
                            <th>MRP</th>
                            <th>T.P</th>
                            <th>Quantity</th>
                            <th>Formulation</th>
                            <th>company</th>                
                            <th>Category</th>
                            <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
foreach ($run5 as $row) {
    
    $sql="SELECT * from brands where brand_id='".$row['brand_id']."'";
    $result1 = $connect->query($sql);
    $row1=$result1->fetch_assoc();


    $sql="SELECT * from categories where categories_id='".$row['categories_id']."'";
    $result2 = $connect->query($sql);
    $row2=$result2->fetch_assoc();
    
    
    ?>

    
                                        <tr>
                                            
                                                
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td><img src="assets/myimages/<?php echo $row['product_image'];?>" style="width: 80px; height: 80px;"></td>


                                            <?php $d1=date('Y-m-d');
                                            //echo $d1.$row['expdate'];exit;
                                             if($row['expdate']>=$d1)
                                           { //echo "abc1"; ?>
                                               
                                               <td> <label class="label label-success"><?php echo $row['product_name'];?></label></td> 
                                         <?php  }
                                            if($row['expdate']<$d1) { //echo "abc"; ?>
                                               <td><label class="label label-danger"><?php echo $row['product_name'];?></label></td> 
                                               
                                           <?php
                                               } 
                                           ?>
                                             <td><?php echo $row['rate'] ?></td>
                                             <td><?php echo $row['percente'] ?></td>
                                              <td><?php echo $row['mrp'] ?></td>
                                              <td><?php echo $row['tp'] ?></td>
                                              <td><?php echo $row['quantity'] ?></td>
                                              <td><?php echo $row['formulation'] ?></td>
                                              <td><?php echo $row1['brand_name'] ?></td>
                                             <td><?php echo $row2['categories_name'] ?></td>
                                            <td><?php  if($row['active']==1)
                                            {
                                                 
                                                 $activeBrands = "<label class='label label-success' ><h4>Available</h4></label>";
                                                 echo $activeBrands;
                                            }
                                            else{
                                                $activeBrands = "<label class='label label-danger'><h4>Not Available</h4></label>";
                                                echo $activeBrands;
                                            }?></td>
                                            <td>
            
                                                <a href="editproduct.php?id=<?php echo $row['product_id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                              

             
                                                <a href="php_action/removeProduct.php?id=<?php echo $row['product_id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                           
                                                
                                                </td>
                                                <?php $i++; ?>
                                        </tr>
                                        
                                      
                                    </tbody>
                                   <?php    
}
?>
                               </table>
                    
                                </div>
<?php } ?>