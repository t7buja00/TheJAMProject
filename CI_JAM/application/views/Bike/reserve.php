<head>
<style>
input:disabled {
 	 background: none;
    border: none;
    color: black;  
}
</style>

</head>
<form action="<?php echo site_url('bike/add_rental'); ?>" target="_self" method="POST">
Brand:
<input name="brand" value="<?php echo $_POST['brand']?>" readonly>
<br> 
Model:
<input name="model" value ="<?php echo $_POST['model']?>"readonly>
<br>
Size:
<input name="size" value="<?php echo $_POST['size']?>"readonly>
<br>
Gender:
<input name="gender" value="<?php echo $_POST['gender']?>"readonly>
<br>
Rent Price: €
<input name="rented_price" value="<?php echo $_POST['rent_price']?>"readonly>
<br>
Rent From: 
<input name="date_rented" type="date" value="<?php echo $_POST['rent_from']?>"readonly>
<br>
Until: 
<input name="date_returned" type="date" value="<?php echo $_POST['rent_to']?>"readonly>
<br>
Total Price: € 
<input name="total_rent_price" value="<?php
 $rentstart = strtotime($_POST['rent_from']);
 $rentend   = strtotime($_POST['rent_to']);
 $totalrent = (($rentend - $rentstart) / 86400)+1;
if ($totalrent >= 7){
    $totalcost = ($totalrent * $_POST['rent_price']) * .9;
}
else {
    $totalcost = ($totalrent * $_POST['rent_price']);
}
 echo $totalcost; ?>" readonly>
<br>
<input type=submit value="Confirm">
<input name="customer_id"  type="hidden" value="0" >
<input name="bike_id" type="hidden" value="<?php echo $selected_bike[0]['bike_id'];?>" >
<input name="distance_out" type="hidden" value="0" >
<input name="distance_back" type="hidden" value="0" >
<input name="date_booked" type="hidden" value="<?php echo date("Y-m-d");?>" >

</form>
