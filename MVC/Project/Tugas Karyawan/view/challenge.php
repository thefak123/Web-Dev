<?php
    require_once("../controller/KaryawanController.php"); 
      require_once("../controller/OfficeController.php"); 
    require_once("../controller/controller.php");
    
    if(isset($_POST["add"])){
        save($_POST["idK"], $_POST["idO"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Challenge</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container">
    <table class="table table-dark mt-2 w-100 mx-auto">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Office</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach(getRelationData() as $data){ 
            ?>
                <tr>
                    <td><?= $data["employee"]->nama ?></td>
                    <td><?= $data["dataOffice"]->officeName  ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <form method="POST" id="confirmForm">
        <select class="form-select" name="idK">
            <?php foreach(index() as $index => $karyawan){  ?>
            <option value="<?=$index ?>"><?= $karyawan->nama ?></option>
            <?php } ?>
        </select>
        <select class="form-select" name="idO">
            <?php foreach(getOfficeData() as $index => $office){  ?>
                <option value="<?=$index ?>"><?= $office->officeName ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="add" id="btnConfirm">Save</button>
    </form>
    </div>
    <?php include("footer.php"); ?>