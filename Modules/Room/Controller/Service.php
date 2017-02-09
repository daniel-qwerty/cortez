<?PHP

class Room_Controller_Service extends Com_Module_Controller_Json {

    public function ListRoom() { 
            $objs = Room_Model_RoomType::getInstance()->getListByLanService(empty($_GET['lanId'])?'1':$_GET['lanId']); 
            $r=[];
            foreach ($objs as $obj){
                $r[$obj->TypeId]=$obj;
            }
            echo json_encode($r);
            return;     
        
    }

    

}
