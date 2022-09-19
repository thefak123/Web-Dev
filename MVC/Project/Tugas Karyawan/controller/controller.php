
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
        $relationModel->id = count($_SESSION["data_relation"]) != 0 ? json_decode($_SESSION["data_relation"][count($_SESSION["data_relation"]) - 1])->id + 1 : 0;
        $relationModel->idKaryawan = $_POST["idK"];
        $relationModel->idOffice = $_POST["idO"];
    
        array_push($_SESSION["data_relation"], json_encode($relationModel));
    }

    function deleteRelation(){

        unset($_SESSION["data_relation"][$_POST["id"]]);
    }

    function updateRelation(){
        $relationModel = new Relational();
        
        $relationModel->idKaryawan = $_POST["idK"];
        $relationModel->idOffice = $_POST["idO"];
        
        $_SESSION["data_relation"][$_POST["id"]] = json_encode($relationModel);
    }

    function getRelationData(){
        $result = array();
        // echo "<script>console.log(" . json_encode($_SESSION["data_office"]) . ");</script>";
        foreach($_SESSION["data_relation"] as $data){
            $curData = json_decode($data);
            $dataK = array("karyawanName" => "Data telah terhapus");
            $dataO = array("officeName" => "Data telah terhapus");
            
            foreach($_SESSION["data_karyawan"] as $index => $karyawan){
                
                if($index == $curData->idKaryawan){
                    $dataK = array("karyawanName" => $karyawan->nama);
                    break;
                }
            }

            foreach($_SESSION["data_office"] as $index => $office){
                if($index == $curData->idOffice){
                    $dataO = array("officeName" => $office->officeName);
                    break;
                }
            }
        
            array_push($result, ["employee" => (object) $dataK, "dataOffice" => (object) $dataO, "model" => (object) array("id" => $curData->id)]);
        }
        return $result;
    }
?>