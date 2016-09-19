<?PHP

class Promos_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Promociones";
        Com_Helper_BreadCrumbs::getInstance()->add("Promociones", "/Admin/Promos");
        
//        $obj = get('userType');
//        if($obj == 1){
//            $this->redirect(Com_Helper_Url::getInstance()->generateUrl("es", "error"));
//            exit;
//        }
        
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Promos/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }

            $id = Promos_Model_Promo::getInstance()->doInsert($this->getPostObject(), $languages, $imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Promos/Edit/id/' . $id);
        }
        $this->assign('Title');
        $this->assign('Date');
        $this->assign('Description');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign('Link');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Promos/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }

            Promos_Model_Promo::getInstance()->doUpdate(get('id'), $this->getPostObject(), $imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Promos/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Promos_Model_Promo::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->ProId);
        $this->assign("Language", $entity->ProLanId);
        $this->assign('Title', $entity->ProTitle);
        $this->assign('Date', $entity->ProDate);
        $this->assign('Description', $entity->ProDescription);
        $this->assign('Image', $entity->ProImage);
        $this->assign('Status', $entity->ProStatus);
        $this->assign('Link', $entity->ProLink);
        $this->assign("languages", $languages);
        
        
    }

    public function Delete() {
        Promos_Model_Promo::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Promos');
    }

}

?>