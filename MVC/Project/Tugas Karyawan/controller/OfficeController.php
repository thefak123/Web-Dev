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
        $newOffice->id = count($_SESSION["data_office"]);
        $newOffice->officeName = $_POST["nama"];
        $newOffice->address = $_POST["address"];
        $newOffice->city = $_POST["city"];
        $newOffice->phone = $_POST["phone"];
        array_push($_SESSION["data_office"], $newOffice);

    }

    function getOfficeData(){
        return unserialize(serialize($_SESSION["data_office"]));
    }

    function deleteOfficeData($id){
        unset($_SESSION["data_office"][$id]);
    }
?>  