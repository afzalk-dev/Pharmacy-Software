<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<table class="table table-bordered table-striped text-center" id="medicine-table">
    <thead>
        <tr>
            <th>Serial No</th>
            <th>Particular</th>
            <th>Qty Pkt</th>
            <th>Qty Pss</th>
            <th>Bonus</th>
            <th>Discount (%)</th>
            <th>T.P</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody id="medicine-body">
        </tbody>
    <tfoot>
        <tr>
            <td colspan="6" class="text-right"><b>Sub Total:</b></td>
            <td id="sub-total">0</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6" class="text-right"><b>Tax (%):</b></td>
            <td id="tax">0</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6" class="text-right"><b>Final Total:</b></td>
            <td id="final-total">0</td>
            <td></td>
        </tr>
    </tfoot>
</table>

</body>
</html>

<script>
  $(document).ready(function() {
    // ... your code for adding rows and fetching medicine data (if applicable)

    // Add event listener to quantity input fields
    $(document).on('keyup', '.inp#qty-pkt, .inp#qty-pss', function() {
        var $row = $(this).closest('tr'); // Get the current row

        // Calculate total quantity (combine values from both fields)
        var totalQuantity = parseInt($row.find('#qty-pkt').val()) || 0;
        totalQuantity += parseInt($row.find('#qty-pss').val()) || 0;

        // Fetch or calculate price (replace with your logic)
        var price = parseFloat($row.find('#tpv').val()) || 0;

        // Calculate discounted price (replace with your logic if applicable)
        var discount = parseFloat($row.find('#disc').val()) || 0;
        var discountedPrice = price * (1 - discount / 100);

        // Calculate the row's total
        var rowTotal = totalQuantity * discountedPrice;

        // Update the row's total
        $row.find('#total').val(rowTotal.toFixed(2));

        // Update sub-total (sum of all row totals)
        var subTotal = 0;
        $("#medicine-body").find("#total").each(function() {
            subTotal += parseFloat($(this).val()) || 0;
        });
        $("#sub-total").text(subTotal.toFixed(2));

        // Update final total (sub-total minus tax)
        var tax = parseFloat($("#tax").text()) || 0;
        var finalTotal = subTotal - (subTotal * (tax / 100));
        $("#final-total").text(finalTotal.toFixed(2));
    });

    // Add event listener to tax percentage input
    $(document).on('keyup', '#tax', function() {
        // Recalculate and update the final total based on the new tax value
        var subTotal = parseFloat($("#sub-total").text()) || 0;
        var tax = parseFloat($(this).val()) || 0;
        var finalTotal = subTotal - (subTotal * (tax / 100));
        $("#final-total").text(finalTotal.toFixed(2));
    });
});

</script>