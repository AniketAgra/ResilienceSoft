<?php 
include("../../../includes/config.php");
$i = 1;
$select = mysqli_query($con, "select * from faq");
while($row = mysqli_fetch_array($select)){
?>
<tr>
   <th scope="row"><?php echo $i++; ?></th>
   <td><?php echo $row['title']; ?></td>
   <td>
      <?php if($row['status']=='A') { ?>
      <span class="badge badge-success px-4">Active</span>
      <?php } else{ ?>
      <span class="badge badge-danger px-3">Deactive</span>
      <?php } ?>
   </td>
   <td>
      <button type="button" class="btn btn-primary btn-sm px-3 py-1 edit_data" name="edit" id="<?php echo $row['id']; ?>">
         <i class="fas fa-pen"></i>
      </button>
      <?php if($row['status']=='A') { ?>
      <button class="btn btn-success btn-sm px-3 btn-secondary" onclick="DeleteRecord(<?php echo $row['id']; ?>)">
         <i class="fa fa-unlock"></i>
      </button>
      <?php } else{ ?>
      <button class="btn btn-danger btn-sm px-3 btn-secondary" onclick="DeleteRecord(<?php echo $row['id']; ?>)">
         <i class="fa fa-lock"></i>
      </button>
      <?php } ?>
   </td>
</tr>
<?php } ?>

