<?PHP

class Reviews_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Opiniones";
        Com_Helper_BreadCrumbs::getInstance()->add("Opiniones", "/Admin/Reviews");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Reviews/Add");
        if ($this->isPost()) {
            Reviews_Model_Review::getInstance()->doInsert($this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Reviews');
        }

        $this->assign('Name');
        $this->assign('Comment');
        $this->assign('Source');
        $this->assign('Url');
        $this->assign('Status');
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Reviews/Add");
        $this->setView("add");
        if ($this->isPost()) {
            Reviews_Model_Review::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Reviews');
        }
        $entity = Reviews_Model_Review::getInstance()->get(get('id'));
        $this->assign('Name', $entity->RevName);
        $this->assign('Url', $entity->RevUrl);
        $this->assign('Status', $entity->RevStatus);
        $this->assign('Comment', $entity->RevComment);
        $this->assign('Source', $entity->RevSource);
    }

    public function Delete() {
        Reviews_Model_Review::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Reviews');
    }

    

}

?>