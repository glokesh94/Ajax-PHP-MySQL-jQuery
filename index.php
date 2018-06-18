<html>
<head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script> 
  <link rel="stylesheet" type="text/css" href="toastr.min.scss" />
  <script type="text/javascript" src="toastr.min.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
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
    $("#div1").html(response); 
    //alert(response);
    }
    });
    }
  </script>
</head>
<body>
  <br>  
  <div class="container">
    <h2 class="text-center">Ajax Data</h2>
     <a href="add.php" class="btn btn-info pull-right">ADD</a>
      <div class="table" border="1" id="div1"></div>
  </div>
</body> 	
</html>		
