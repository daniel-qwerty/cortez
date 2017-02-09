<?PHP

class TextsEngine_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Textos";
        Com_Helper_BreadCrumbs::getInstance()->add("Textos", "/Admin/TextsEngine");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/TextsEngine/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {
            $id = TextsEngine_Model_Text::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/TextsEngine/Edit/id/' . $id);
        }
        $this->assign('Alias');
        $this->assign('Description');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/TextsEngine/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);
        
        if ($this->isPost()) {
            TextsEngine_Model_Text::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/TextsEngine/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = TextsEngine_Model_Text::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->TxtId);
        $this->assign("Language", $entity->TxtLanId);
        $this->assign('Alias', $entity->TxtAlias);
        $this->assign('Description', $entity->TxtDescription);
        $this->assign('Status', $entity->TxtStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        TextsEngine_Model_Text::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/TextsEngine');
    }

}

?>