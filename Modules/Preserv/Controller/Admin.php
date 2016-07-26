<?PHP

class Preserv_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Preserv";
        Com_Helper_BreadCrumbs::getInstance()->add("Preserv", "/Admin/Preserv");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Preserv/Add");
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
            
            $id = Preserv_Model_Preserv::getInstance()->doInsert($this->getPostObject(), $languages, $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Preserv/Edit/id/' . $id);
        }
        
        $this->assign('Name');
        $this->assign('Description');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign('Footer');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Preserv/Add");
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
            Preserv_Model_Preserv::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Preserv/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Preserv_Model_Preserv::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->CerId);
        $this->assign("Language", $entity->CerLanId);
        $this->assign('Name', $entity->CerName);
        $this->assign('Description', $entity->CerDescription);
        $this->assign('Image', $entity->CerImage);
        $this->assign('Status', $entity->CerStatus);
        $this->assign('Footer', $entity->CerFooter);
        $this->assign("languages", $languages);
    }

    public function Delete() {
        Preserv_Model_Preserv::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Preserv');
    }

}

?>