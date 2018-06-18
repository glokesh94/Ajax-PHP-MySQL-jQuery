<?php
    include('config.php');
    $result = $conn->query("SELECT * FROM tbl_service");
?>

<table class="table">
  <thead>
    <tr>
      <th>NAME</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Address</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['phone'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['address'];?></td>
      <td>
      <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
      <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-info"  onclick="return deleteData()">Delete</a>
      </td>
    </tr>
    <?php } ?>
    <?php 
      $count  = mysqli_num_rows($result); 
      if ($count==0) { ?>
      <tr>
        <td colspan="8"><div class="no-record">Sorry No Record found</div></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script type="text/javascript">
  function deleteData() {
    if (confirm("Are you sure?")) 
    {
      $.ajax ({
          type: "POST",
          url: "delete.php",
          data: dataString,
          success: function(result) {

          }
      });
    }
    return false; 
  }
</script>

