<?PHP

class Category_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Cateogorias";
        Com_Helper_BreadCrumbs::getInstance()->add("Blog", "/Admin/Category");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Category/Add");
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
            
            $id = Category_Model_Category::getInstance()->doInsert($this->getPostObject(), $languages, $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Category/Edit/id/' . $id);
        }
        
        $this->assign('Name');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Category/Add");
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
            
            

            Category_Model_Category::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Category/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Category_Model_Category::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->CatId);
        $this->assign("Language", $entity->CatLanId);
        $this->assign('Name', $entity->CatName);
        $this->assign('Image', $entity->CatImage);
        $this->assign('Status', $entity->CatStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Category_Model_Category::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Category');
    }

}

?>