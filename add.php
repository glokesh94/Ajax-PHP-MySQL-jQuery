<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="toastr.min.scss" />
    <script type="text/javascript" src="toastr.min.js"></script> 
  </head>
  <div class="container">
    <h2>Add form</h2>
    <form name="form" id="form" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
         <span id="nameerror"></span>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
         <span id="emailerror"></span>
      </div>
      <div class="form-group">
        <label for="email">Phone:</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
         <span id="phoneerror"></span>
      </div>
       <div class="form-group">
        <label for="email">Address:</label>
        <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
         <span id="addresserror"></span>
      </div>
     <input id="submit" class="btn btn-info" type="button" name="submit" value="Add" onclick="addData()">
      <a href="index.php" class="btn btn-info">Back</a>
    </form>
  </div>
</html>
<script type="text/javascript">

  function addData()
  {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
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
    toastr.error('Valid email is required');
    } 
    else if(address=="")
    {
    $('#addresserror').html('please fill your address')
    toastr.error('Address is required');
    } 
    else
    {
      var dataString = 'name='+ name + '&email='+ email + '&phone='+ phone + '&address='+ address;
      $.ajax
      ({
          type: "POST",
          url: "ajax.php",
          data: dataString,
          cache: false,
          success: function(result)
          {
            getTableDataByAjax();
            $("form").trigger("reset");
            window.location.href = "index.php";
          }
      });
      return false;
    }
  }

</script> 
<script type="text/javascript">

  $(document).ready(function() 
  {
    getTableDataByAjax();
  });

  function getTableDataByAjax() 
  {
    $.ajax
    ({    //create an ajax request to display.php
        type: "POST",
        url: "ajaxtable.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response)
        {                    
        
        }
     });
  }
</script>

