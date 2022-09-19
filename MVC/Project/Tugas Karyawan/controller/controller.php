
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
    
    function save($idK, $idO){
        $relationModel = new Relational();
        $relationModel->idKaryawan = $idK;
        $relationModel->idOffice = $idO;
    
        array_push($_SESSION["data_relation"], serialize($relationModel));
    }

    function getRelationData(){
        $result = array();
        foreach($_SESSION["data_relation"] as $data){
            $curData = unserialize($data);
            $dataK = array();
            $dataK["nama"] = "Data telah terhapus";
            $dataO = array("officeName" => "Data telah terhapus");
            
            if(count($_SESSION["data_karyawan"]) >  $curData->idKaryawan){
                $dataK = $_SESSION["data_karyawan"][2];
            }
            $counterK = 0;
            foreach( $_SESSION["data_karyawan"] as $a){
                if($a->id === $curData->idKaryawan){
                    $dataK = $_SESSION["data_karyawan"][$a->id];
                    break;
                    $counterK++;
                }
                
            }
            echo "<script>console.log('" . json_encode($dataK) . "');</script>";
           
            if(count($_SESSION["data_office"]) > $curData->idOffice ){
                $dataO = $_SESSION["data_office"][$curData->idOffice];
            }
            array_push($result, ["employee" => (object) $dataK, "dataOffice" => (object) $dataO]);
        }
        return $result;
    }
?>