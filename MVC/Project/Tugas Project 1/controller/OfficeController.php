<?php 
    include_once("../model/Office.php");
    if(!isset($_SESSION)){
        session_start();
    }
    
    if(!isset($_SESSION["data_office"])){
        $_SESSION["data_office"] = array();
    }
   
    function insertOfficeData(){
        if(!is_numeric($_POST["phone"])){
            echo json_encode("wrong");
        }else{
            $newOffice = new Office();
            $newOffice->id = count($_SESSION["data_office"]) != 0 ? json_decode(end($_SESSION["data_office"]))->id + 1 : 0;
            $newOffice->officeName = $_POST["officeName"];
            $newOffice->address = $_POST["address"];
            $newOffice->city = $_POST["city"];
            $newOffice->phone = $_POST["phone"];
            array_push($_SESSION["data_office"], json_encode($newOffice));
            echo json_encode("success");
        }      
    }

    function updateOffice(){
        if(!is_numeric($_POST["phone"])){
            echo json_encode("wrong");
        }else{
            $newOffice = new Office();
            $newOffice->id = $_POST["id"];
            $newOffice->officeName = $_POST["officeName"];
            $newOffice->address = $_POST["address"];
            $newOffice->city = $_POST["city"];
            $newOffice->phone = $_POST["phone"];

            foreach($_SESSION["data_office"] as $index => $data){
                $data = json_decode($data);
                
                if($data->id == $_POST["id"]){
                    
                    $_SESSION["data_office"][$index] = json_encode($newOffice);
                    break;
                }
            }
            echo json_encode("success");
        }
    }

    function getOfficeData(){
        return $_SESSION["data_office"];
    }

    function deleteOfficeData(){
        foreach($_SESSION["data_office"] as $index => $data){
            $data = json_decode($data);
            if($data->id == $_POST["id"]){
                unset($_SESSION["data_office"][$index]);
            }
        }
        
    }
?>  