<?PHP

class TextsEngine_Controller_Service extends Com_Module_Controller_Json {

    public function ListText() {   
       
            
            $obj = TextsEngine_Model_Text::getInstance()->getListByLan(empty($_GET['lanId'])?'1':$_GET['lanId']);            
            echo json_encode($obj);
            return;
       
        
    }

    

}
