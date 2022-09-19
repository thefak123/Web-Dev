<?php 
    include_once("../model/Office.php");
    if(!isset($_SESSION)){
        session_start();
    }
    
    if(!isset($_SESSION["data_office"])){
        $_SESSION["data_office"] = array();
    }

   

    function insertOfficeData(){
        $newOffice = new Office();
        $newOffice->id = count($_SESSION["data_office"]) != 0 ? json_decode($_SESSION["data_office"][count($_SESSION["data_office"]) - 1])->id + 1 : 0;
        $newOffice->officeName = $_POST["officeName"];
        $newOffice->address = $_POST["address"];
        $newOffice->city = $_POST["city"];
        $newOffice->phone = $_POST["phone"];
        array_push($_SESSION["data_office"], json_encode($newOffice));

    }

    function updateOffice(){
      
        
        $newOffice = new Office();
        $newOffice->id = $_POST["id"];
        $newOffice->officeName = $_POST["officeName"];
        $newOffice->address = $_POST["address"];
        $newOffice->city = $_POST["city"];
        $newOffice->phone = $_POST["phone"];
    
        $_SESSION["data_office"][(int) $_POST["id"]] = json_encode($newOffice);
        
    }

    function getOfficeData(){
        return $_SESSION["data_office"];
    }

    function deleteOfficeData(){
        unset($_SESSION["data_office"][$_POST["id"]]);
    }
?>  