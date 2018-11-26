<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "ramcel");

  // Initialize message variable
  $msg = "";
 

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    $filename = $_FILES["image"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    //$filesize = $_FILES["image"]["size"];
    $allowed_file_types = array('.jpg','.jpeg','.gif','.png');  

    if (in_array($file_ext,$allowed_file_types) )
    { 
      // Rename file
      $newfilename = rand() . $file_ext;

      move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $newfilename);

      $msg = "You have successfully Uploaded.";
    }

    $title = mysqli_real_escape_string($db, $_POST['title']);

    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    $sql = "INSERT INTO photo(image,title,image_text) VALUES ('$newfilename', '$title', '$image_text')";
    
    // execute query
    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
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

<?php 

$sql="SELECT * FROM photo  ORDER BY id DESC";
$result = mysqli_query($db,$sql);

function getImageById($imageId, $con)
{
  $sql="SELECT * FROM photo WHERE id = $imageId";
  $result = mysqli_query($con,$sql);
  return mysqli_fetch_array($result)['image'];
}

$rowId = 1;
$currentImageId = mysqli_num_rows($result);
$colId = 1;

while ($row = mysqli_fetch_array($result)) {

  if ($rowId % 2 == 0) {
    echo '<div class="row">';
    if ($colId == 1) {
      echo '<div class="col-sm-6">';
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
      echo '</div>';
      $colId++;
    }
    if ($colId == 2) {
      echo '<div class="col-sm-3">';
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
      echo '</div>';
      $colId++;
    }
    if ($colId == 3) {
      echo '<div class="col-sm-3">';
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
      echo '</div>';
      $colId++;
    }
    echo '</div>';
    $colId = 1;
  } else {
    echo '<div class="row">';
    if ($colId == 1) {
      echo '<div class="col-sm-3">';
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
      echo '</div>';
      $colId++;
    }
    if ($colId == 2) {
      echo '<div class="col-sm-6">';
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
      echo '</div>';
      $colId++;
    }
    if ($colId == 3) {
      echo '<div class="col-sm-3">';
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
        echo '<img src="images/'.getImageById($currentImageId, $db).'">';
        $currentImageId --;
      echo '</div>';
      $colId++;
    }
    echo '</div>';

    $colId = 1;
  }

$rowId++;
}
?>

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