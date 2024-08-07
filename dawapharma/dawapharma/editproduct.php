<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>
<?php include('./constant/layout/sidebar.php');?>
<?php include('link.php');?>


<?php include('./constant/connect.php');

$sql="SELECT * from product where  product_id='".$_GET['id']."'";
  $result=$connect->query($sql)->fetch_assoc();  
  ?> 

<script type="text/javascript">

$(document).keyup(function()
          {
              prc = $('#prc').val();
              $("#mrpno").on("keyup" , function(){
                var a = parseInt($("#mrpno").val());
                    b = a * (prc / 100 );
                    c = a - b;
                    document.getElementById("tp").value = c;  
              });
          })

        </script>
        <script type="text/javascript">

         $(document).ready(function()
       {
       $("#tp").on("keyup" , function(){
       var a = parseInt($("#tp").val());
          b = a*0.15;
          c = a + b;
          document.getElementById("mrpno").value = c;  
      });
      })

    </script>

  <?php
 $productId = $_GET['id'];
  if(isset($_POST['updbtn']))
  {
    
    
    $pname = $_POST['pname'];
    $qty = $_POST['qty'];
    $rate = $_POST['rate'];
    $prc = $_POST['prc'];
    $mrp = $_POST['mrp'];
    $tp = $_POST['tp'];
    $frm = $_POST['frm'];
    $expdate = $_POST['expdate'];
    $c_name = $_POST['companyn'];
    $catogary = $_POST['catogaryn'];
    $status = $_POST['status'];
    
    $sqlupd = "UPDATE product SET product_name='".$pname."', brand_id='".$c_name."',categories_id='".$catogary."',quantity='".$qty."',rate='".$rate."',
    percente='".$prc."',  mrp='".$mrp."',tp='".$tp."',formulation='".$frm."',expdate='".$expdate."',active = '".$status."', status = 1 WHERE product_id = $productId";
  $run3 = mysqli_query($connect , $sqlupd);

  if($run3)
  {
    echo "<script>alert('Update Successfully')</script>";
  }else{
     echo "<script>alert('While Error Found')</script>";
  }
  }

   
  ?>

 <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Medicine Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Medicine</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                
                

                
                
                
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div id="add-brand-messages"></div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form action="php_action/editProductImage.php?id=<?php echo $_GET['id'];?>" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">

                                        <fieldset>
                        <h1>Update Photo</h1>
<div class="changeUsenrameMessages"></div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Medicine Image:</label>
                                                <div class="col-sm-9">
                                                 
                                                   <img src="assets/myimages/<?php echo $result['product_image']?>" style="width:250px; height:250px;" >
                                                     <input type="hidden" name="old_image" value="<?php echo $result['product_image']?>">



                                                   
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                      <div class="row">
                                                <label for="editProductImage" class="col-sm-3 control-label">Select Photo: </label>
                                               
                                                <div class="col-sm-9">
                                                  
                                                  <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>              
                                                  <div class="kv-avatar center-block">                  
                                                      <input type="file" class="form-control" id="productImage" placeholder="Medicine Name" name="productImage" class="file-loading" style="width:auto;"/>
                                                  </div>
                                                  
                                                </div>
                                              </div> 
                                            </div>
                                            <div class="col-md-2 mx-auto">
                                        <button type="submit"  name="btn" id="changeUsernameBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Save Changes</button></div>
                                        </fieldset>


                                    </form>
                                     <form method="POST"  enctype="multipart/form-data">

                                    <fieldset>
                                        <h1>Medicine Info</h1>

                                       
                                <div class="row">
                                    <div class="form-group col-md-6">
                                                <label class="control-label">Medicine Name</label>
                                                  <input type="text" class="form-control" id="editProductName" value="<?php echo $result['product_name']?>"  name="pname" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Quantity</label>
                                                  <input type="text" class="form-control" id="editQuantity" value="<?php echo $result['quantity']?>" name="qty" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label class="control-label">Rate</label>
                                                   <input type="text" class="form-control" id="editRate" value="<?php echo $result['rate']?>" name="rate" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label class="control-label">Percente</label>
                                                   <input type="text" class="form-control" id="prc" placeholder="Percente" name="prc" autocomplete="off" required="" pattern="^[0-9]+$"/>
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label class="control-label">MRP</label>
                                                   <input type="text" class="form-control" id="mrpno" placeholder="MRP" name="mrp" autocomplete="off" value="<?php echo $result['mrp']?>" required="" />
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label class="control-label">T.P</label>
                                                   <input type="text" class="form-control" id="tp" placeholder="T.P" name="tp" autocomplete="off" value="<?php echo $result['tp']?>" required="" />
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Formulation</label>
                                                   <input type="text" class="form-control" id="frm" placeholder="Formulation" name="frm" value="<?php echo $result['formulation']?>" autocomplete="off" required="" />
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Expiry Date</label>
                                                   <input type="date" class="form-control" id="expdate" placeholder="Expiry Date" name="expdate" value="<?php echo $result['expdate']?>" autocomplete="off" required="" pattern="^[0-9]+$"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Company Name</label>
                                                 <select   name="companyn"  required class="form-control">
<?php
     $sql = ("SELECT * FROM brands  where brand_status=1 ");
     //echo $sql;exit;
     $results = mysqli_query($connect, $sql);
     //echo "23";exit;
 while ($rows = mysqli_fetch_assoc($results)){
  //echo $row['categories_name'];exit;?>
     <option value="<?php echo $rows['brand_id']; ?>"<?php if($result['brand_id']==$rows['brand_id']){echo "selected";}?>><?php echo $rows['brand_name']; ?></option>";
 <?php   }                    
?></select>
                                    </div>
                                        <div class="form-group col-md-6">
                                                <label class="control-label">Category Name</label>
                                                     <select  name="catogaryn"  required class="form-control">
<?php
     $sql = ("SELECT * FROM categories  where categories_status=1 ");
     //echo $sql;exit;
     $result1 = mysqli_query($connect, $sql);
     //echo "23";exit;
 while ($row = mysqli_fetch_assoc($result1)){
  //echo $row['categories_name'];exit;?>
     <option value="<?php echo $row['categories_id']; ?>"<?php if($result['categories_id']==$row['categories_id']){echo "selected";}?>><?php echo $row['categories_name']; ?></option>";
 <?php   }                    
?></select>
                                        </div>

                                        <div class="form-group col-md-6">
                                                <label class="control-label">Status</label>
                                                     <select class="form-control" id="editProductStatus" name="status">
                        <option value="1" <?php 
                                                        if($result['active']=="1") 
                                                            { 
                                                                echo "selected";
                                                            }
                                                        ?>>Available</option>
                                                        <option value="2" <?php if($result['active']=="2"){ echo "selected";}?>>Not Available</option>
                      </select>
                                        </div>

                                        <div class="col-md-12 mx-auto text-center">
                                             <button type="submit" name="updbtn"  class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                        </div>
                                       
                                        </fieldset>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               


 
                <?php include('./constant/layout/footer.php');?>


<script src="custom/js/product.js"></script>
