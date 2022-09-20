<?php 
    require("../controller/KaryawanController.php");
<<<<<<< HEAD
    $curKaryawan = "";
    $curId = "";
=======
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
    if(isset($_POST["add"])){
        insert();
    }
    if(isset($_POST["delete"])){
        delete($_POST["id"]);
    }
<<<<<<< HEAD
    if(isset($_POST["update"])){
        updateKaryawan();
    }
    if(isset($_GET["updateId"])){
        $curId =  $_GET["updateId"];
        $curKaryawan = $_SESSION["data_karyawan"][$_GET["updateId"]];
    }
    
    
   
=======
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
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
<<<<<<< HEAD
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Usia</th>
                <th>Edit</th>
=======
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Usia</th>
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
<<<<<<< HEAD
                foreach(index() as $karyawan){ 
                $karyawan = json_decode($karyawan);
            ?>
            <div >

            
                <tr>
                    <td><?= $karyawan->id?></td>
=======
                foreach(index() as $index => $karyawan){ 
            ?>
                <tr>
                    <td><?= $index + 1?></td>
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
                    <td><?= $karyawan->nama?></td>
                    <td><?= $karyawan->jabatan?></td>
                    <td><?= $karyawan->usia?></td>
                    <td>
<<<<<<< HEAD
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
=======
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
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
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
<<<<<<< HEAD
        <input type="hidden" name="id" value="<?= ($curId != "") ? $curId : 0 ?>">
        <input type="hidden" name="<?= ($curId != "") ? "update" : "add" ?>">
        <button type="button" name="add" class="btn btn-primary mt-2" id="btnConfirm">Submit</button>
    </form>
    </div>
    
    <script type="text/javascript">
        var id = '<?= $curId?>';
        var value = '<?= $curKaryawan ?>';
        
      
        
    </script>
=======
        <input type="hidden" name="add">
        <button type="button" name="add" class="btn btn-primary" id="btnConfirm">Submit</button>
    </form>
    </div>
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
    <?php include("footer.php"); ?>