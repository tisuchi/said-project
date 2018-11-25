<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "ramcel");

  // Initialize message variable
  $msg = "";
 

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $title = mysqli_real_escape_string($db, $_POST['title']);

    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "images/".basename($_FILES['image']['name']);

    $sql = "INSERT INTO photo (image,title, image_text) VALUES ('$image','$title','$image_text')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width:auto;
    padding: 5px;
    margin: 15px auto;
   
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
    
    #title{
    font-size: 20px;
    font-weight: bold;
    color:red;
    text-decoration:none;

    }


   img{
    
    margin: 5px;
    width:100%;
   
   }
</style>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-3">
  <div class="row">
  <div class="col-md-12">

<?php
 
   
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='1'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>


  </div>


  </div><br>

 <div class="row">
  <div class="col-md-12">

   <?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='2'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>


  </div>


  </div>
 
</div>


<div class="col-md-6">

<?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='3'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>


</div>








<div class="col-md-3">

<div class="row">
  <div class="col-md-12">

<?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='4'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>


  </div>


  </div><br>

 <div class="row">
  <div class="col-md-12">

   <?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='5'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>


  </div>


  </div>




</div>


</div>


<div class="row">

<div class="col-md-6">

  <?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='6'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>

</div>


<div class="col-md-6">
<div class="row">

<div class="col-md-6">

<?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='7'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>

</div>

<div class="col-md-6">
<?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='8'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>

</div>

</div>



<div class="row">

<div class="col-md-6">
<?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='9'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>

</div>

<div class="col-md-6">
<?php
 
  
   $db = mysqli_connect("localhost", "root", "", "ramcel");
   $sql="SELECT * FROM photo  WHERE id ='10'";
  $result = mysqli_query($db,$sql);
  

 while ($row = mysqli_fetch_array($result)) {



  echo "<img src='images/".$row["image"]."'  >";
        
         echo "<div id='title'>";
        echo  " <a href='detail.php?id={$row['id']}'>{$row['title']} </a>" ;
        echo "</div>";
       
}


?>
</div>
  
</div>
</div>
 
</div>




</div>


  <form method="POST" action="saidur-grid.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
      <div>
      <input type="text" width:'100%' name="title">
    </div>
    <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say something about this image..."></textarea>
    </div>
    <div>
      <button type="submit" name="upload">POST</button>
    </div>
  </form>

</body>
</html>