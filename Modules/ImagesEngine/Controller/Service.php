<?PHP

class ImagesEngine_Controller_Service extends Com_Module_Controller_Json {

    public function ListImages() {
                   
            $obj = ImagesEngine_Model_Image::getInstance()->getListByLan(empty($_GET['lanId'])?'1':$_GET['lanId']);            
            echo json_encode($obj);
            return;
       
    }   
}
