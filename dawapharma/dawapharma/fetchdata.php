<?php
include('constant/connect.php'); // Assuming `connect.php` contains your database connection

if (isset($_POST['action']) && $_POST['action'] === 'addData') {
    $data = ''; // Initialize output data

    // Fetch medicine options from database (replace with your query)
    $sql = "SELECT product_id, product_name FROM product";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data .= '<td><input class="inp" type="text" placeholder="" value="" id="sl" name="sl[]" readonly></td>';
        $data .= '<td>';
        $data .= '<select class="chosen" name="m-name[]" id="fetch" onchange="selectdata(this.options[this.selectedIndex].value)" required>';
        $data .= '<option selected>Medicine</option>';

        while ($row = mysqli_fetch_assoc($result)) {
            $data .= '<option value="' . $row['product_id'] . '">' . $row['product_name'] . '</option>';
        }

        $data .= '</select>';
        $data .= '</td>';
      }
    }
      ?>
