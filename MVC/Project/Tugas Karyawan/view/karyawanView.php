<?php 
    require("../controller/KaryawanController.php");
    if(isset($_POST["add"])){
        insert();
    }
    if(isset($_POST["delete"])){
        delete($_POST["id"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>View</title>

</head>
<body>
    <?php include("header.php"); ?>
    <div class="container">
    <h1 class="my-2 text-center">List Karyawan</h1>
    <table class="table table-dark mt-2 w-100 mx-auto">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Usia</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach(index() as $index => $karyawan){ 
            ?>
                <tr>
                    <td><?= $index + 1?></td>
                    <td><?= $karyawan->nama?></td>
                    <td><?= $karyawan->jabatan?></td>
                    <td><?= $karyawan->usia?></td>
                    <td>
                        <form method="POST" id="confirmDeleteForm">
                            <input type="hidden" name="id" value="<?=$index?>">
                            <input type="hidden" name="delete">
                            <button class="btn btn-danger" type="button" name="delete" id="btnDeleteConfirm">
                            X
                            </button></td>
                        </form>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h1 class="my-2 text-center">Tambah Karyawan</h1>
    <form method="POST" id="confirmForm">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Enter nama">
           
        </div>
        <div class="form-group">
            <label >Jabatan</label>
            <input type="text" class="form-control" name="jabatan" placeholder="Enter jabatan">
        </div>
        <div class="form-group">
            <label >Usia</label>
            <input type="number" class="form-control" name="usia" placeholder="Enter usia">
        </div>
        <input type="hidden" name="add">
        <button type="button" name="add" class="btn btn-primary" id="btnConfirm">Submit</button>
    </form>
    </div>
    <?php include("footer.php"); ?>