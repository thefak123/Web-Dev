
<?php 
    
    include_once("../model/Relational.php");
    include_once("../model/Office.php");
    include_once("../model/Karyawan.php");
    if(!isset($_SESSION)){
        session_start();
    }
<<<<<<< HEAD

=======
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
  
    if(!isset($_SESSION["data_relation"])){
        $_SESSION["data_relation"] = array();
    }
<<<<<<< HEAD
   
   
    
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
=======
    
    function save($idK, $idO){
        $relationModel = new Relational();
        $relationModel->idKaryawan = $idK;
        $relationModel->idOffice = $idO;
    
        array_push($_SESSION["data_relation"], serialize($relationModel));
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
    }

    function getRelationData(){
        $result = array();
<<<<<<< HEAD
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
=======
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
>>>>>>> 33c7d779b515b324591beae52b66ef1c7d28ede5
        }
        return $result;
    }
?>