<?PHP

class Sports_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Sports";
        Com_Helper_BreadCrumbs::getInstance()->add("Sports", "/Admin/Sports");
        
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Sports/Add");
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
            
            $marker = "";
            if (Com_File_Handler::getInstance()->setFile(get("Banner"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $marker = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $id = Sports_Model_Sport::getInstance()->doInsert($this->getPostObject(), $languages, $image, $marker);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Sports/Edit/id/' . $id);
        }
        $this->assign('Title');
        $this->assign('Description');
        $this->assign('Image');
        $this->assign('Banner');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
        
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Sports/Add");
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
            
            $marker = "";
            if (Com_File_Handler::getInstance()->setFile(get("Banner"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $marker = Com_File_Handler::getInstance()->getFileName();
                }
            }

            Sports_Model_Sport::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image, $marker);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Sports/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Sports_Model_Sport::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->SpoId);
        $this->assign("Language", $entity->SpoLanId);
        $this->assign('Title', $entity->SpoTitle);
        $this->assign('Description', $entity->SpoDescription);
        $this->assign('Image', $entity->SpoImage);
        $this->assign('Banner', $entity->SpoBanner);
        $this->assign('Status', $entity->SpoStatus);
        $this->assign("languages", $languages);
        
    }

    public function Delete() {
        Sports_Model_Sport::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Sports');
    }

    public function Images() {
        Com_Helper_BreadCrumbs::getInstance()->add("Media", "/Admin/Sports/Images");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $fileName = "";
            if (!(Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors())) {
                $fileName = (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image") ? Com_File_Handler::getInstance()->getFileName() : "");
            }

            if (($fileName != "") || (get("Youtube") != "")) {
                Sports_Model_Media::getInstance()->doInsert($this->getPostObject(), $fileName, get('lan'));
                $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Sports/Images/lan/' . $language . '/id/' . get('id'));
            }

            Sports_Model_Media::getInstance()->doUpdate(get('id'), $this->getPostObject());
        }

        $this->assign('Id', get('id'));
        $this->assign('Image');
        $this->assign('Footer');
        $this->assign('Youtube');
        $this->assign('Images', Sports_Model_Media::getInstance()->getListBySport(get('id'), get('lan')));
        $this->assign("languages", $languages);
        $this->assign("Language", $language);
    }

    public function DeleteMedia() {
        Sports_Model_Media::getInstance()->doDelete(get('media'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Sports/Images/lan/' . get('lan') . '/id/' . get('id'));
    }

}

?>