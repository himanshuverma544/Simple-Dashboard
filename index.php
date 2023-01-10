<html>

<head>

 <title>Dashboard</title>

 <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<h1>DASHBOARD</h1>

<?php

include "php/database.php";

/* Create */
if(isset($_POST["create"])) {

$done = false;
include "php/data.php";

if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {

   $sql = "INSERT INTO users (name, occupation, age, phone_no, address) VALUES ('$name', '$occupation', $age, $phone_no, '$address')";

   if($conn->query($sql)) {
      $done = true;
    }
}
else {
   if($uploadOk) {
       $sql = " INSERT INTO users (name, occupation, age, phone_no, address, image) VALUES ('$name', '$occupation', $age, $phone_no, '$address', '$fileName') ";
       if(move_uploaded_file($tempName,$folder) && $conn->query($sql)) { // running the statements and checking them
         $done = true;
       }
   }
}

if($done) { ?>
   <div class = "msg_positive" id="msg_positive">
   <?php  echo "Record Added Successfully."; ?>
   </div>
   <?php
  }
  else if(!$done && $uploadOk) { ?>
  <div class = "msg_negative">
  <?php   echo "Error: " . $sql . "<br>" . $conn->error; ?>
  </div>
  <?php   
  }  
}

/* Update */
else if(isset($_POST["update"])) {

   $done = false;
   $id = $_POST["id"];
   include "php/data.php";

   if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {  // if($fileName == "") {

      $sql = "UPDATE users SET name = '$name', occupation = '$occupation', age = $age, phone_no = '$phone_no', address = '$address' WHERE id = $id";

      if($conn->query($sql)) {
         $done = true;
       }
   }    
   else {
      if($uploadOk) {
      $sql = "SELECT image from users where id = $id";
      $row = mysqli_query($conn,$sql);
      $column = mysqli_fetch_assoc($row);

        if($column["image"] != "") {
           unlink("uploads/".$column["image"]);
        }
        $sql = "UPDATE users SET name = '$name', occupation = '$occupation', age = $age, phone_no = '$phone_no', address = '$address', image = '$fileName' WHERE id = $id";

        if ($conn->query($sql) && move_uploaded_file($tempName,$folder)) {
           $done = true;
         }   
      }
    }

    if($done) { ?>
     <div class = "msg_positive" id="msg_positive">
     <?php  echo "Record Updated Successfully."; ?>
     </div>
     <?php
    }
    else if(!$done && $uploadOk) { ?>
    <div class = "msg_negative">
    <?php   echo "Error: " . $sql . "<br>" . $conn->error; ?>
    </div>
    <?php   
    }
 }
/* Delete */
else if(isset($_POST['delete'])) {

   $id = $_POST["id"];
   $sql = "SELECT image from users where id = $id";
   $row = mysqli_query($conn,$sql);
   $column = mysqli_fetch_assoc($row);

   $sql = "DELETE FROM users WHERE id = $id";

   if($conn->query($sql)) {
      
      if($column["image"] != null) {
         unlink("uploads/".$column["image"]);
      } ?>
         <div class="msg_positive" id="msg_positive"> <?php
             echo ("Record Deleted Successfully."); ?>
         </div> <?php
   } 
   else { ?> <div class="msg_negative">
            <?php echo "Error: ".$sql."<br>".$conn->error; ?>
              </div>
  <?php }
}  


/* Read | Representing Data in a table */
$sql = " SELECT * from users ";

$result = $conn->query($sql);
?>

<table>
<tr>
<th>S.No.</th>
<th>Profile Photo</th>   
<th>Name</th>
<th>Occupation</th>
<th>Age</th>
<th>Phone No.</th>
<th>Address</th>
<th class="th_center" colspan="2">Action</th>
</tr>

<?php
if($result->num_rows > 0) {

   $sNo = 1;
   while($row = $result->fetch_assoc()) {
?>      
  <tr>
  <td> <?php echo $sNo++ ?> </td>
  <?php
  if($row["image"] == "") { ?>
      <td> <img src = "images/default_profile_pic.webp" style = "width:100px; height:100px;"> </td>
<?php } 
  else { ?>
      <td> <img src = "<?php echo "uploads/".$row["image"];?>" style="width:100px; height:100px;"> </td>
<?php  } ?>
  <td> <?php echo $row["name"]; ?> </td>
  <td> <?php echo $row["occupation"]; ?> </td>
  <td> <?php echo $row["age"]; ?> </td>
  <td> <?php echo $row["phone_no"]; ?> </td>
  <td> <?php echo $row["address"]; ?> </td>
  <td class="edit_btn" onclick="document.location='php/create_update.php?id=<?php echo $row['id']; ?>'">Update</td>
  <td>
     <form style = "height: 100%;" name = "deleteForm" method = "post">
        <input type = "hidden" name = "id" value = "<?php echo $row['id']; ?>">
        <input class = "del_btn" onclick= "return confirm('Are you sure?');" type = "submit" name = "delete" value = "Delete">
     </form>
   </td> 
  </tr>
<?php 
   }
} 
else { ?> <div class = "msg_neutral">
  <?php echo "No results"; ?> </div>
<?php }
$conn->close();
?>
</table>

<button class = "create_btn" onclick="document.location='php/create_update.php'">Create</button>

<script src="js/index.js"></script>

</body>
</html>