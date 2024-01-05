<?php 
include("../includes/config.php"); 

?>
<input type="hidden" id="usd<?php echo $plan_row['id']; ?>" value="<?php echo $plan_row['USD']; ?>">
<?php
$select_esim = mysqli_query($con, "select * from esimlive where status='A' ORDER BY id DESC");
while($esim_row = mysqli_fetch_assoc($select_esim)){
if($esim_row['status']=="A"){
?>
<tr>
    <th scope="row"><?php echo $esim_row['name']; ?></th>
    <td class="font-weight-600 text-right">$<?php echo $esim_row['USD']; ?></td>
</tr>
<?php } } ?>
<tr>
    <th>Total</th>
    <th class="text-right">$12</th>
</tr>