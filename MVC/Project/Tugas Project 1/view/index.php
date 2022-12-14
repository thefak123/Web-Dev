<?php
    require_once("../controller/KaryawanController.php"); 
    require_once("../controller/OfficeController.php"); 
    require_once("../controller/RelationController.php");
    
    $curRelation = "";
    $curId = "";

    if(isset($_POST["add"])){
        save();
    }

    if(isset($_POST["update"])){
        updateRelation();
    }

    if(isset($_POST["delete"])){
        deleteRelation();
    }
    if(isset($_GET["updateId"])){
        $curId = $_GET["updateId"];
        $curRelation = $_SESSION["data_relation"][$_GET["updateId"]];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Relation</title>
</head>
<body>
    <?php include("header.php"); ?>
    <?php $karyawanData =  getKaryawanData();
    $officeData = getOfficeData();
    if(count($karyawanData) > 0 && count($officeData) > 0){ 
    ?>
    <div class="container">
    <table class="table table-dark mt-2 w-100 mx-auto">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Office</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach(getRelationData() as $index => $data){ ?>
                <tr>
                    <td><?= $data["model"]->id ?></td>
                    <td><?= $data["employee"]->karyawanName ?></td>
                    <td><?= $data["dataOffice"]->officeName  ?></td>
                    <td>
                        <form action="" method="GET">
                            <input type="hidden" name="updateId" value="<?= $data["model"]->id ?>">
                            <button class="btn btn-primary">EDIT</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="" id="confirmDeleteForm">
                            <input type="hidden" name="id" value="<?= $data["model"]->id ?>">
                            <input type="hidden" name="delete">
                            <button class="btn btn-danger" type="button" id="btnDeleteConfirm">DELETE</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php if($curId != ""){ ?>
        <button class="btn btn-primary"><a href="index.php" class="text-white">Tambah Relasi</a></button>
    <?php } ?>
    <h1 class="mt-2" id="formTitle">Tambah Relasi</h1>
    <form method="POST" id="confirmForm">
        <select class="form-select" name="idK">
            <?php foreach($karyawanData as  $karyawan){  
                $karyawan = json_decode($karyawan); ?>
                <option value="<?=$karyawan->id ?>" 
                <?= ($curRelation != "") ? (($karyawan->id == (int) json_decode($curRelation)->idKaryawan) ? 'selected="selected"' : "") : ""?> >
                <?= $karyawan->nama ?></option>
            <?php } ?>
        </select>
        <select class="form-select" name="idO">
            <?php foreach($officeData as  $office){ 
                $office = json_decode($office);?>
                <option value="<?=$office->id ?>" 
                <?= ($curRelation != "") ? (($office->id == (int) json_decode($curRelation)->idOffice) ? 'selected="selected"' : "") : ""?>>
                <?= $office->officeName ?></option>
            <?php } ?>
        </select>
        <input type="hidden" name="<?= ($curId != "") ? 'update' : 'add' ?>">
        <input type="hidden" name="id" value="<?= ($curId != "") ? $curId : '' ?>">
        <button type="button" class="btn btn-primary mt-2"  id="btnConfirm"> <?= ($curId != "")  ? "Update" : "Save" ?></button>
    </form>
    </div>
    <?php }else{  ?>
        <div class="container vw-100 vh-100 d-flex justify-content-center align-items-center">
            <h1 class="h-50">Silahkan Isi Data Karyawan dan Office Terlebih Dahulu</h1>
        </div>
    <?php }?>
    <script type="text/javascript">
        var id = '<?= $curId?>';
        var value = '<?= $curRelation ?>';  
    </script>
    <?php include("footer.php"); ?>