<?php 
    require("../controller/OfficeController.php");
    if(isset($_POST["add"])){
        insertOfficeData();
    }
    if(isset($_POST["delete"])){
        deleteOfficeData($_POST["id"]);
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
                <th>No</th>
                <th>Nama Office</th>
                <th>Address</th>
                <th>City</th>
                <th>Phone</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach(getOfficeData() as $index => $office){ 
            ?>
                <tr>
                    <td><?= $index + 1?></td>
                    <td><?= $office->officeName?></td>
                    <td><?= $office->address?></td>
                    <td><?= $office->city?></td>
                    <td><?= $office->phone?></td>
                    <td>
                        <form method="POST" id="confirmDeleteForm">
                            <input type="hidden" name="delete" value="delete">
                            <input type="hidden" name="id" value="<?=$index?>">
                            <button class="btn btn-danger" id="btnDeleteConfirm" type="button" name="delete">
                            X
                            </button></td>
                        </form>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h1 class="my-2 text-center">Tambah Office</h1>
    <form method="POST" id="confirmForm">
        <div class="form-group">
            <label>Office Name</label>
            <input type="text" class="form-control" name="nama" placeholder="Enter office name">
           
        </div>
        <input type="hidden" name="add" value="add">
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
        <button type="button" name="add" class="btn btn-primary" id="btnConfirm" >Submit</button>
    </form>
    </div>
<?php include("footer.php");?>