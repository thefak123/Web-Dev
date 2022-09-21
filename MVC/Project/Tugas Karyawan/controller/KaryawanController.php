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
        if(!is_numeric($_POST["usia"])){
            echo json_encode("wrong");
        }else{
            $newKaryawan = new Karyawan();
            $newKaryawan->id = count($_SESSION["data_karyawan"]) != 0 ? json_decode(end($_SESSION["data_karyawan"]))->id + 1 : 0;
            $newKaryawan->nama = $_POST["nama"];
            $newKaryawan->jabatan = $_POST["jabatan"];
            $newKaryawan->usia = $_POST["usia"];
            array_push($_SESSION["data_karyawan"], json_encode($newKaryawan));
            echo json_encode("success");
        }
        
    }

    function updateKaryawan(){
        if(!is_numeric($_POST["usia"])){
            echo json_encode("wrong");
        }else{
            $newKaryawan = new Karyawan();
            $newKaryawan->id = $_POST["id"];
            $newKaryawan->nama = $_POST["nama"];
            $newKaryawan->jabatan = $_POST["jabatan"];
            $newKaryawan->usia = $_POST["usia"];
        
            foreach($_SESSION["data_karyawan"] as $index => $data){
                $data = json_decode($data);
                if($data->id == $_POST["id"]){
                    $_SESSION["data_karyawan"][$index] = json_encode($newKaryawan);
                }
            }
            echo json_encode("success");
        }
        
        
 
    }

    function getKaryawanData(){
        return $_SESSION["data_karyawan"];
    }

    function delete(){
        foreach($_SESSION["data_karyawan"] as $index => $data){
            $data = json_decode($data);
            if($data->id == $_POST["id"]){
                unset($_SESSION["data_karyawan"][$index]);
            }
        }
    }
?>  