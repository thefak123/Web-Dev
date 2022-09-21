<?php 
    require("../controller/KaryawanController.php");
    $curKaryawan = "";
    $curId = "";
    if(isset($_POST["add"])){
        insert();
    }
    if(isset($_POST["delete"])){
        delete($_POST["id"]);
    }
    if(isset($_POST["update"])){
        updateKaryawan();
    }
    if(isset($_GET["updateId"])){
        $curId =  $_GET["updateId"];
        foreach($_SESSION["data_office"] as $index => $data){
            
            $data = json_decode($data);
            
            if($data->id == $_GET["updateId"]){
                $curKaryawan = $_SESSION["data_karyawan"][$index];
            }
        }
        
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
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Usia</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach(getKaryawanData() as $karyawan){ 
                $karyawan = json_decode($karyawan);
            ?>
            <div >

            
                <tr>
                    <td><?= $karyawan->id?></td>
                    <td><?= $karyawan->nama?></td>
                    <td><?= $karyawan->jabatan?></td>
                    <td><?= $karyawan->usia?></td>
                    <td>
                        <form method="GET">
                            <input type="hidden" name="updateId" value="<?=$karyawan->id?>">
                            
                            <button class="btn btn-primary" type="submit" >
                            Edit
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" id="confirmDeleteForm">
                            <input type="hidden" name="id" value="<?=$karyawan->id?>">
                            <input type="hidden" name="delete">
                            <button class="btn btn-danger" type="button" name="delete" id="btnDeleteConfirm">
                            X
                            </button>
                    </td>
                        </form>
                    
                </tr>
                </div>
            <?php } ?>
        </tbody>
    </table>
    <?php if($curId != ""){  ?>
        <button class="btn btn-primary"><a href="karyawanView.php" class="text-white">TAMBAH KARYAWAN</a> </button>
    <?php } ?>
    <h1 class="my-2 text-center" id="formTitle">Tambah Karyawan</h1>
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
        <input type="hidden" name="id" value="<?= ($curId != "") ? $curId : 0 ?>">
        <input type="hidden" name="<?= ($curId != "") ? "update" : "add" ?>">
        <button type="button" name="add" class="btn btn-primary mt-2" id="btnConfirm">Submit</button>
    </form>
    </div>
    
    <script type="text/javascript">
        var id = '<?= $curId?>';
        var value = '<?= $curKaryawan ?>';
        
      
        
    </script>
    <?php include("footer.php"); ?>