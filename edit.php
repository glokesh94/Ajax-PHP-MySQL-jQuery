<?php

    $myConnection = mysqli_connect('localhost','root','', 'service') or die ("could not connect to mysql"); 

    $id = $_GET['id'];
    $sqlCommand = "SELECT * FROM tbl_service WHERE id = '".$id."'";
    $query = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));
    $res = mysqli_fetch_array($query);  
?>
<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="toastr.min.scss" />
    <script type="text/javascript" src="toastr.min.js"></script> 
  </head>
  <div class="container">
    <h2>Edit form</h2>
    <form name="form" id="form" method="post">
      <input type="hidden" name="main_id" id="main_id" value="<?php echo $res['id']; ?>"/>
      <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $res['name']; ?>">
      <span id="nameerror"></span>
      </div>
      <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $res['email'];; ?>">
      <span id="emailerror"></span>
      </div>
      <div class="form-group">
      <label for="email">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="<?php echo $res['phone'];; ?>">
      <span id="phoneerror"></span>
      </div>
      <div class="form-group">
      <label for="email">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?php echo $res['address'];; ?>">
      <span id="addresserror"></span>
      </div>
      <input id="submit" class="btn btn-info" type="button" name="submit" value="Update" onclick="updateData()">
      <a href="index.php" class="btn btn-info">Back</a>
    </form>
  </div>
</html>
<script type="text/javascript">

function updateData()
{
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  var main_id = $('#main_id').val();
  var name = $('#name').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  var address = $('#address').val();
  if(name=="")
  {
  $('#nameerror').html('please fill your name')
  toastr.error('Name is required');
  } 
  else if(phone=="" || isNaN(phone))
  {
  $('#phoneerror').html('please fill your number field')
  toastr.error('Phone is required');
  }
  else if(email=="" ||  !reg.test(email))
  {
  $('#emailerror').html('please fill your email field')
  toastr.error('Email is required');
  } 
  else if(address=="")
  {
  $('#addresserror').html('please fill your address')
  toastr.error('Address is required');
  } 
  else
  {
    var dataString = 'name='+ name + '&email='+ email + '&phone='+ phone + '&address='+ address+ '&main_id='+ main_id;
    $.ajax
    ({
        type: "POST",
        url: "ajaxupdate.php",
        data: dataString,
        cache: false,
        success: function(result)
        {
          window.location.href = "index.php";
        }
    });
    return false;
  }
}
</script> 