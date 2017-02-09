<?PHP

class Links_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Links";
        Com_Helper_BreadCrumbs::getInstance()->add("Links", "/Admin/Links");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Links/Add");
        if ($this->isPost()) {
             $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }
            
            Links_Model_Links::getInstance()->doInsert($this->getPostObject(),$imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Links');
        }

        $this->assign('Name');
        $this->assign('Url');
        $this->assign('Status');
        $this->assign('Image');
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Links/Add");
        $this->setView("add");
        if ($this->isPost()) {
             $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }
            
            Links_Model_Links::getInstance()->doUpdate(get('id'), $this->getPostObject(),$imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Links');
        }
        $entity = Links_Model_Links::getInstance()->get(get('id'));
        $this->assign('Name', $entity->LinName);
        $this->assign('Url', $entity->LinUrl);
        $this->assign('Status', $entity->LinStatus);
        $this->assign('Image', $entity->LinImage);
    }

    public function Delete() {
        Links_Model_Links::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Links');
    }

    

}

?>