
<?php 
    
    include_once("../model/Relational.php");
    include_once("../model/Office.php");
    include_once("../model/Karyawan.php");
    if(!isset($_SESSION)){
        session_start();
    }
  
    if(!isset($_SESSION["data_relation"])){
        $_SESSION["data_relation"] = array();
    }
    
   
    
    function save(){
        $relationModel = new Relational();
        $relationModel->id = count($_SESSION["data_relation"]) != 0 ? json_decode(end($_SESSION["data_relation"]))->id + 1 : 0;
        $relationModel->idKaryawan = $_POST["idK"];
        $relationModel->idOffice = $_POST["idO"];
    
        array_push($_SESSION["data_relation"], json_encode($relationModel));
    }

    function deleteRelation(){

        foreach($_SESSION["data_relation"] as $index => $data){
            $data = json_decode($data);
            if($data->id == $_POST["id"]){
                unset($_SESSION["data_relation"][$index]);
            }
        }
    }

    function updateRelation(){
        $relationModel = new Relational();
        $relationModel->id = $_POST["id"];
        $relationModel->idKaryawan = $_POST["idK"];
        $relationModel->idOffice = $_POST["idO"];
        foreach($_SESSION["data_relation"] as $index => $data){
            $data = json_decode($data);
            if($data->id == $_POST["id"]){
                $_SESSION["data_relation"][$index] = json_encode($relationModel);
            }
        }
    
    }

    function getRelationData(){
        $result = array();
        // echo "<script>console.log(" . json_encode($_SESSION["data_office"]) . ");</script>";
        foreach($_SESSION["data_relation"] as $data){
            $curData = json_decode($data);
            echo "<script>console.log(" . json_encode($curData) . ");</script>";
            $dataK = array("karyawanName" => "Data telah terhapus");
            $dataO = array("officeName" => "Data telah terhapus");
            
            foreach($_SESSION["data_karyawan"] as $karyawan){
                $karyawan = json_decode($karyawan);
                if($karyawan->id == $curData->idKaryawan){
                    $dataK = array("karyawanName" => $karyawan->nama);
                    break;
                }
            }

            foreach($_SESSION["data_office"] as $office){
                $office = json_decode($office);
                if($office->id == $curData->idOffice){
                    $dataO = array("officeName" => $office->officeName);
                    break;
                }
            }
        
            array_push($result, ["employee" => (object) $dataK, "dataOffice" => (object) $dataO, "model" => (object) array("id" => $curData->id)]);
        }
        return $result;
    }
?>