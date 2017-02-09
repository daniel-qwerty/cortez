<?PHP

class History_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Historia";
        Com_Helper_BreadCrumbs::getInstance()->add("Historia", "/Admin/History");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/History/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

                   
            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $id = History_Model_History::getInstance()->doInsert($this->getPostObject(), $languages, $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/History/Edit/id/' . $id);
        }
        
        $this->assign('Title');
        $this->assign('Description');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/History/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            
            
            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }

            History_Model_History::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/History/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = History_Model_History::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->HisId);
        $this->assign("Language", $entity->HisLanId);
        $this->assign('Title', $entity->HisTitle);
        $this->assign('Description', $entity->HisDescription);
        $this->assign('Image', $entity->HisImage);
        $this->assign('Status', $entity->HisStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        History_Model_History::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/History');
    }

}

?>