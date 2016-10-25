<?PHP

class SpecialOffers_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Ofertas";
        Com_Helper_BreadCrumbs::getInstance()->add("Ofertas", "/Admin/SpecialOffers");

//        $obj = get('userType');
//        if($obj == 1){
//            $this->redirect(Com_Helper_Url::getInstance()->generateUrl("es", "error"));
//            exit;
//        }
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/SpecialOffers/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }

            $id = SpecialOffers_Model_SpecialOffer::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/SpecialOffers/Edit/id/' . $id);
        }
        $this->assign('Name');
        $this->assign('Description');
        $this->assign('Status');

        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/SpecialOffers/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }

            SpecialOffers_Model_SpecialOffer::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/SpecialOffers/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = SpecialOffers_Model_SpecialOffer::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->SpeId);
        $this->assign("Language", $entity->SpeLanId);

        $this->assign('Name', $entity->SpeName);
        $this->assign('Description', $entity->SpeDescription);
        $this->assign('Status', $entity->SpeStatus);
        $this->assign("languages", $languages);
    }

    public function Delete() {
        SpecialOffers_Model_SpecialOffer::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/SpecialOffers');
    }

}

?>