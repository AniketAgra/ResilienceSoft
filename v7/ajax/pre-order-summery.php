<?php
include("../include/config.php");

if(isset($_GET['planid']))
{
    $planid   = $_GET['planid'];
    $select_plan = mysqli_query($con, "select * from plans where id='$planid'");
    $plan_row = mysqli_fetch_assoc($select_plan);
}

if(isset($_GET['val']))
{
	$addonid = $_GET['val'];
	$select_addon = mysqli_query($con, "select * from addons where id='$addonid'");
	$addon_row = mysqli_fetch_assoc($select_addon);
}

if(isset($_GET['esimlive']))
{
    $esimlive = $_GET['esimlive'];
}

$active = mysqli_query($con, "select * from esimlive where id='2'");
$active_row = mysqli_fetch_assoc($active);
if($active_row['status']=="A"){
$active_price = $active_row['USD'];
?>
<tr>
    <th><?php echo $active_row['name']; ?>:</th>
    <th class="text-center"></th>
    <th class="text-right">$<?php echo $active_row['USD']; ?></th>
</tr>

<?php }else{ $active_price = 0; } ?>

<?php if(isset($_GET['val'])){ ?>
<tr>
    <th>Add-on:</th>
    <th class="text-center"><?php echo $addon_row['Value']; ?>GB</th>
    <th class="text-right">$<?php echo $addon_row['USD']; ?></th>
</tr>
<?php } ?>

<?php if(isset($_GET['esimlive'])){ ?>
<tr>
    <th>eSIM Live:</th>
    <th class="text-center"></th>
    <th class="text-right">$<?php echo $_GET['esimlive']; ?></th>
</tr>
<?php } ?>


<?php if(isset($_GET['val']) && isset($_GET['planid']) && isset($_GET['esimlive'])){ ?>
<tr>
    <th colspan="2" style="font-weight:bold">Total Price:</th>
    <th class="text-right" style="font-weight:bold">
        $<?php echo $plan_row['USD'] + $addon_row['USD'] + $_GET['esimlive'] + $active_price; ?>
        <input type="hidden" name="USD" value="<?php echo $plan_row['USD'] + $addon_row['USD'] + $_GET['esimlive'] + $active_price; ?>">
    </th>
</tr>
<?php } ?>

<?php if(isset($_GET['val']) && isset($_GET['planid']) && !isset($_GET['esimlive'])){ ?>
<tr>
    <th colspan="2" style="font-weight:bold">Total Price:</th>
    <th class="text-right" style="font-weight:bold">
        $<?php echo $plan_row['USD'] + $addon_row['USD'] + $active_price;?>
        <input type="hidden" name="USD" value="<?php echo $plan_row['USD'] + $addon_row['USD'] + $active_price; ?>">
    </th>
</tr>
<?php } ?>

<?php if(!isset($_GET['val']) && isset($_GET['planid']) && isset($_GET['esimlive'])){ ?>
<tr>
    <th colspan="2" style="font-weight:bold">Total Price:</th>
    <th class="text-right" style="font-weight:bold">
        $<?php echo $plan_row['USD'] + $_GET['esimlive'] + $active_price;?>
        <input type="hidden" name="USD" value="<?php echo $plan_row['USD'] + $_GET['esimlive'] + $active_price;?>">
    </th>
</tr>
<?php } ?>

<?php if(!isset($_GET['val']) && isset($_GET['planid']) && !isset($_GET['esimlive'])){ ?>
<tr>
    <th colspan="2" style="font-weight:bold">Total Price:</th>
    <th class="text-right" style="font-weight:bold">
        $<?php echo $plan_row['USD'];?>
        <input type="hidden" name="USD" value="<?php echo $plan_row['USD'];?>">
    </th>
</tr>
<?php } ?>