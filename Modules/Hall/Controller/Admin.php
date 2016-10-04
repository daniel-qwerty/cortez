<?PHP

class Hall_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Salones de eventos";
        Com_Helper_BreadCrumbs::getInstance()->add("Salones de eventos", "/Admin/Hall");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Hall/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {
            $fileName = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $fileName = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $capacity = "";
            if (Com_File_Handler::getInstance()->setFile(get("Capacity"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $capacity = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $id = Hall_Model_Hall::getInstance()->doInsert($this->getPostObject(), $languages, $fileName, $capacity);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Hall/Edit/id/' . $id);
        }
        $this->assign('Name');
        $this->assign('Description');
        $this->assign('Resume');
        $this->assign('Amenities');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign('Type');
        $this->assign('Capacity');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Hall/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);
        
        if ($this->isPost()) {
            $fileName = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $fileName = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $capacity = "";
            if (Com_File_Handler::getInstance()->setFile(get("Capacity"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $capacity = Com_File_Handler::getInstance()->getFileName();
                }
            }
            Hall_Model_Hall::getInstance()->doUpdate(get('id'), $this->getPostObject(), $fileName, $capacity);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Hall/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Hall_Model_Hall::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->HallId);
        $this->assign("Language", $entity->HallLanId);
        $this->assign('Name', $entity->HallName);
        $this->assign('Description', $entity->HallDescription);
        $this->assign('Resume', $entity->HallResume);
        $this->assign('Amenities', $entity->HallAmenities);
        $this->assign('Image', $entity->HallImage);
        $this->assign('Status', $entity->HallStatus);
        $this->assign('Type', $entity->HallType);
        $this->assign('Capacity', $entity->HallCapacity);


        $this->assign("languages", $languages);
    }

    public function Delete() {
        Hall_Model_Hall::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Hall');
    }
    
    public function Images() {
        Com_Helper_BreadCrumbs::getInstance()->add("Media", "/Admin/Hall/Images");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $fileName = "";
            if (!(Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors())) {
                $fileName = (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image") ? Com_File_Handler::getInstance()->getFileName() : "");
            }

            if (($fileName != "") || (get("Youtube") != "")) {
                Hall_Model_Media::getInstance()->doInsert($this->getPostObject(), $fileName, get('lan'));
                $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Hall/Images/lan/' . $language . '/id/' . get('id'));
            }

            Hall_Model_Media::getInstance()->doUpdate(get('id'), $this->getPostObject());
        }

        $this->assign('Id', get('id'));
        $this->assign('Image');
        $this->assign('Footer');
        $this->assign('Youtube');
        $this->assign('Images', Hall_Model_Media::getInstance()->getListByProject(get('id'), get('lan')));
        $this->assign("languages", $languages);
        $this->assign("Language", $language);
    }

    public function DeleteMedia() {
        Hall_Model_Media::getInstance()->doDelete(get('media'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Hall/Images/lan/' . get('lan') . '/id/' . get('id'));
    }

}

?>