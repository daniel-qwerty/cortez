<?PHP

class Links_Controller_Service extends Com_Module_Controller_Json {

    public function getIconos() {   
       
            
            $obj = Links_Model_Links::getInstance()->getIcons();            
            echo json_encode($obj);
            return;
       
        
    }   

}
