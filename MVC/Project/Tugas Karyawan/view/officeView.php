<?php 
    require("../controller/OfficeController.php");
<<<<<<< HEAD
    $curOffice = "";
    $curId = "";
=======
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
    if(isset($_POST["add"])){
        insertOfficeData();
    }
    if(isset($_POST["delete"])){
<<<<<<< HEAD
        deleteOfficeData();
    }

    if(isset($_POST["update"])){
        updateOffice();
    }

    if(isset($_GET["updateId"])){
        $curId =  $_GET["updateId"];
        $curOffice = $_SESSION["data_office"][$_GET["updateId"]];
=======
        deleteOfficeData($_POST["id"]);
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Office View</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container">
    <div class="d-flex justify-content-around">
        <a href=""></a>
        <a href=""></a>
    </div>
    <h1 class="my-2 text-center">List Office</h1>
    <table class="table table-dark mt-2 w-100 mx-auto">
        <thead>
            <tr>
<<<<<<< HEAD
                <th>ID</th>
=======
                <th>No</th>
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
                <th>Nama Office</th>
                <th>Address</th>
                <th>City</th>
                <th>Phone</th>
<<<<<<< HEAD
                <th>Update</th>
=======
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
<<<<<<< HEAD
                foreach(getOfficeData() as  $office){ 
                    $office = json_decode($office);
            ?>
                <tr >
                    <td name="index"><?= $office->id ?></td>
=======
                foreach(getOfficeData() as $index => $office){ 
            ?>
                <tr>
                    <td><?= $index + 1?></td>
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
                    <td><?= $office->officeName?></td>
                    <td><?= $office->address?></td>
                    <td><?= $office->city?></td>
                    <td><?= $office->phone?></td>
                    <td>
<<<<<<< HEAD
                        <form method="GET">
                            <input type="hidden" name="updateId" value="<?= $office->id  ?>">
                            <button class="btn btn-primary" type="submit">
                                Edit
                            </button>
                        </form>
                        
                    </td>
                    <td>
                        <form method="POST" id="confirmDeleteForm">
                            <input type="hidden" name="delete" value="delete">
                            <input type="hidden" name="id" value="<?=$office->id ?>">
                            <button class="btn btn-danger" id="btnDeleteConfirm" type="button" name="delete">
                            X
                            </button>
                        </form>
                    </td>
=======
                        <form method="POST" id="confirmDeleteForm">
                            <input type="hidden" name="delete" value="delete">
                            <input type="hidden" name="id" value="<?=$index?>">
                            <button class="btn btn-danger" id="btnDeleteConfirm" type="button" name="delete">
                            X
                            </button></td>
                        </form>
                    
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
                </tr>
            <?php } ?>
        </tbody>
    </table>
<<<<<<< HEAD
    <?php if($curId != ""){ ?>
        <button class="btn btn-primary"><a href="officeView.php" class="text-white">ADD OFFICE</a> </button>
    <?php } ?>
    <h1 class="my-2 text-center" id="formTitle">Tambah Office</h1>
    <form method="POST" id="confirmForm">
        <div class="form-group">
            <label>Office Name</label>
            <input type="text" class="form-control" name="officeName" placeholder="Enter office name">
           
        </div>
=======
    <h1 class="my-2 text-center">Tambah Office</h1>
    <form method="POST" id="confirmForm">
        <div class="form-group">
            <label>Office Name</label>
            <input type="text" class="form-control" name="nama" placeholder="Enter office name">
           
        </div>
        <input type="hidden" name="add" value="add">
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
        <div class="form-group">
            <label >Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter address">
        </div>
        <div class="form-group">
            <label >City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter city">
        </div>
        <div class="form-group">
            <label >Phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Enter phone">
        </div>
<<<<<<< HEAD
        <input type="hidden" name="id" value="<?= ($curId != "") ? $curId : 0 ?>">
        <input type="hidden" name="<?= ($curId != "") ? "update" : "add" ?>">
        <button type="button" name="add" class="btn btn-primary mt-2" id="btnConfirm" >Submit</button>
    </form>
    
    </div>
    
    <script type="text/javascript">
        var id = '<?= $curId?>';
        var value = '<?= $curOffice ?>';  
    </script>
=======
        <button type="button" name="add" class="btn btn-primary" id="btnConfirm" >Submit</button>
    </form>
    </div>
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
<?php include("footer.php");?>