<?php
include("../include/config.php");

$zoneid = $_GET['zoneid'];
$search = $_GET['search'];


$select_zone = mysqli_query($con, "select * from zones where id='$zoneid'");
$zone_row = mysqli_fetch_assoc($select_zone);

$array = explode(",", $zone_row['countries']);

if(empty($search)){
      $select_country = mysqli_query($con, "select * from countries");
} else{
      $select_country = mysqli_query($con, "select * from countries where country_name LIKE '%$search%'");
}
while($country_row = mysqli_fetch_assoc($select_country))
{
      if(in_array($country_row['id'], $array))
      {
      ?>
            <div class="d-inline"><?php echo $country_row['country_name']; ?></div>
            <div class="pull-right d-inline"><img src="images/flag/<?php echo $country_row['flag']; ?>" class="img"></div>
            <hr>
<?php 
      } 
} 
?>