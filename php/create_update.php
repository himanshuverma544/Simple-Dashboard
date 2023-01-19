<html>



<head> <title>CRUD</title>

    <link rel="stylesheet" type="text/css" href="../css/create_update.css">

</head>



<body>



<?php

$update = false;

$id = $name = $occupation = $age = $phone_no = $address = $image = "";

if (isset($_GET["id"])) {

    $update = true;

    include $_SERVER['DOCUMENT_ROOT'] . '/php/database.php';

    $id = $_GET["id"];

    $record = mysqli_query($conn, "SELECT * from users where id = $id");

    if ($record->num_rows == 1) {

        $value = mysqli_fetch_array($record);

        $name = $value['name'];

        $occupation = $value["occupation"];

        $age = $value["age"];

        $phone_no = $value["phone_no"];

        $address = $value['address'];

        $image = './uploads/' . $value["image"];

    }

    $conn->close();

}

?>



<form method="POST" action="../index.php" enctype="multipart/form-data">



<input type="hidden" name="id" value="<?php echo $id; ?>">



<?php if ($update && ($image == './uploads/')) {?>

<div class="imgcontainer">

    <img class="avatar" src="../images/default_profile_picture.webp" alt="Avatar" >

</div>

<?php } else if ($update) {?>

    <div class="imgcontainer">

        <img class="avatar" src="<?php echo '.' . $image ?> " alt="Avatar" >

    </div>

<?php } else {?>

<div class="imgcontainer">

    <img class="avatar" src="../images/default_profile_picture.webp" alt="Avatar" >

</div>

<?php }?>



<div class="input-group">

<label>Name</label> <input type = "text" name="name" value="<?php echo $name; ?>" placeholder="Enter Name" pattern="^[A-Za-z ]*$" required>

</div>

<div class="input-group">

<label>Occupation</label> <input type = "text" name="occupation" value="<?php echo $occupation; ?>" placeholder="Enter Occupation" pattern="[A-Za-z ]{1,}" required>

</div>

<div class="input-group">

<label>Age</label> <input type = "number" name="age" value="<?php echo $age; ?>" placeholder="Enter Age" min="18" max="60" required>

</div>

<div class="input-group">

<label>Phone No.</label> <input type = "tel" name="phone_no" value="<?php echo $phone_no; ?>" placeholder="Enter Phone No." pattern="[0-9]{10}" required>

</div>

<div class="input-group">

<label>Address</label> <input type = "text" name="address" value="<?php echo $address; ?>" placeholder="Enter Address" pattern="[A-za-z0-9,/- ]{1,}" required>

</div>

<div class="input-group">

<label>Upload Image</label> <input id="input-image" type = "file" name="image">

</div>

<?php if ($update) {?>

<input class = "form_btn" type = "submit" name = "update" value = "Update">

<?php } else {?>

<button class = "form_btn" type = "submit" name = "create">Create</button>

<?php }?>

</form>



<button class = "main_btn" onclick="document.location='../index.php'">Back to Dashboard</button>



<script src="../js/create_update.js"></script>



</body>

</html>

