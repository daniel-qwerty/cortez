<?PHP

class Seo_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Seo";
        Com_Helper_BreadCrumbs::getInstance()->add("Seo", "/Admin/Seo");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Seo/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {
            $id = Seo_Model_Seo::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Seo/Edit/id/' . $id);
        }
        $this->assign('Title');
        $this->assign('Description');
        $this->assign('ShortDescription');
        $this->assign('Page');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Seo/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);
        
        if ($this->isPost()) {
            Seo_Model_Seo::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Seo/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Seo_Model_Seo::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->SeoId);
        $this->assign("Language", $entity->SeoLanId);
        $this->assign('Title', $entity->SeoTitle);
        $this->assign('Description', $entity->SeoDescription);
        $this->assign('ShortDescription', $entity->SeoShortDescription);
        $this->assign('Page', $entity->SeoPage);
        

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Seo_Model_Seo::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Seo');
    }

}

?>