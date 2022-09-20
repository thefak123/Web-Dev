<?php 
    include_once("../model/Karyawan.php");
    include_once("../model/Office.php");
    if(!isset($_SESSION)){
        session_start();
<<<<<<< HEAD
     
    }

  
=======
    }
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
    if(!isset($_SESSION["data_karyawan"])){
        $_SESSION["data_karyawan"] = array();
    }

<<<<<<< HEAD
    

    function insert(){
        $newKaryawan = new Karyawan();
        $newKaryawan->id = count($_SESSION["data_karyawan"]) != 0 ? json_decode($_SESSION["data_karyawan"][count($_SESSION["data_karyawan"]) - 1])->id + 1 : 0;
        $newKaryawan->nama = $_POST["nama"];
        $newKaryawan->jabatan = $_POST["jabatan"];
        $newKaryawan->usia = $_POST["usia"];
        array_push($_SESSION["data_karyawan"], json_encode($newKaryawan));

    }

    function updateKaryawan(){
      
        
        $newKaryawan = new Karyawan();
        $newKaryawan->id = $_POST["id"];
        $newKaryawan->nama = $_POST["nama"];
        $newKaryawan->jabatan = $_POST["jabatan"];
        $newKaryawan->usia = $_POST["usia"];
    
        $_SESSION["data_karyawan"][(int) $_POST["id"]] = json_encode($newKaryawan);
 
=======
    function insert(){
        $newKaryawan = new Karyawan();
        $newKaryawan->id = count($_SESSION["data_karyawan"]);
        $newKaryawan->nama = $_POST["nama"];
        $newKaryawan->jabatan = $_POST["jabatan"];
        $newKaryawan->usia = $_POST["usia"];
        array_push($_SESSION["data_karyawan"], $newKaryawan);

>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
    }

    function index(){
        return $_SESSION["data_karyawan"];
    }

    function delete($id){
        unset($_SESSION["data_karyawan"][$id]);
    }
?>  