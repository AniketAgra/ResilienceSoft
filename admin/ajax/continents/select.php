<?php include("../../include/config.php"); ?>
<table class="table">
   <thead>
      <th>#</th>
      <th>Continent Name</th>
      <th>Image</th>
      <th>Status</th>
      <th>Date</th>
      <th>Action</th>
   </thead>
   <tbody>
      <?php
      $i = 1;
      $select = mysqli_query($con, "select * from continents");
      while ($row = mysqli_fetch_array($select)) {
      ?>
      <tr>
         <td><?php echo $i++; ?></td>
         <td><?php echo $row['continent_name']; ?></td>
         <td><img src="../images/continent/<?php echo $row['image']; ?>" style="max-width: 90px;"></td>
         <td><?php if($row['status']=="A"){ echo "Active"; } else{ echo "Deactive"; }; ?></td>
         <td><?php echo $row['date']; ?></td>
         <td>
            <!-- <a href="#" class="text-info mr-2"><i class="fa fa-pen"></i></a> -->

            <a class="text-info mr-2" id="<?php echo $row['id']; ?>">
               <i class="fa fa-pen"></i>
            </a>
            <a class="text-danger" onclick="DeleteRecord(<?php echo $row['id']; ?>)">
               <i class="fa fa-trash"></i>
            </a>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>