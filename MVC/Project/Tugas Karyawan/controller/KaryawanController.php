<?php 
    include_once("../model/Karyawan.php");
    include_once("../model/Office.php");
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION["data_karyawan"])){
        $_SESSION["data_karyawan"] = array();
    }

    function insert(){
        $newKaryawan = new Karyawan();
        $newKaryawan->id = count($_SESSION["data_karyawan"]);
        $newKaryawan->nama = $_POST["nama"];
        $newKaryawan->jabatan = $_POST["jabatan"];
        $newKaryawan->usia = $_POST["usia"];
        array_push($_SESSION["data_karyawan"], $newKaryawan);

    }

    function index(){
        return $_SESSION["data_karyawan"];
    }

    function delete($id){
        unset($_SESSION["data_karyawan"][$id]);
    }
?>  