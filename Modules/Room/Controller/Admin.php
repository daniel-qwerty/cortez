<?PHP

class Room_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Tipo de Habitacion";
        Com_Helper_BreadCrumbs::getInstance()->add("Tipo de Habitacion", "/Admin/Room");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Room/Add");
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
            
            $id = Room_Model_RoomType::getInstance()->doInsert($this->getPostObject(), $languages, $fileName);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Room/Edit/id/' . $id);
        }
        $this->assign('Name');
        $this->assign('Description');
        $this->assign('Resume');
        $this->assign('Amenities');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Room/Add");
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
            Room_Model_RoomType::getInstance()->doUpdate(get('id'), $this->getPostObject(), $fileName);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Room/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Room_Model_RoomType::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->TypeId);
        $this->assign("Language", $entity->TypeLanId);
        $this->assign('Name', $entity->TypeName);
        $this->assign('Description', $entity->TypeDescription);
        $this->assign('Resume', $entity->TypeResume);
        $this->assign('Amenities', $entity->TypeAmenities);
        $this->assign('Image', $entity->TypeImage);
        $this->assign('Status', $entity->TypeStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Room_Model_RoomType::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Room');
    }
    
    public function Images() {
        Com_Helper_BreadCrumbs::getInstance()->add("Media", "/Admin/Room/Images");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $fileName = "";
            if (!(Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors())) {
                $fileName = (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image") ? Com_File_Handler::getInstance()->getFileName() : "");
            }

            if (($fileName != "") || (get("Youtube") != "")) {
                Room_Model_Media::getInstance()->doInsert($this->getPostObject(), $fileName, get('lan'));
                $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Room/Images/lan/' . $language . '/id/' . get('id'));
            }

            Room_Model_Media::getInstance()->doUpdate(get('id'), $this->getPostObject());
        }

        $this->assign('Id', get('id'));
        $this->assign('Image');
        $this->assign('Footer');
        $this->assign('Youtube');
        $this->assign('Images', Room_Model_Media::getInstance()->getListByProject(get('id'), get('lan')));
        $this->assign("languages", $languages);
        $this->assign("Language", $language);
    }

    public function DeleteMedia() {
        Room_Model_Media::getInstance()->doDelete(get('media'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Room/Images/lan/' . get('lan') . '/id/' . get('id'));
    }

}

?>