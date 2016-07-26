<?PHP

class Software_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Links";
        Com_Helper_BreadCrumbs::getInstance()->add("Links", "/Admin/Software");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Software/Add");
        if ($this->isPost()) {
            Software_Model_Software::getInstance()->doInsert($this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Software');
        }
       
        $this->assign('Nombre'); 
        $this->assign('Nivel');
        $this->assign('PerId'); 
        $this->assign('Status');
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Software/Add");
        $this->setView("add");
        if ($this->isPost()) {
            Software_Model_Software::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Software');
        }
        $entity = Software_Model_Software::getInstance()->get(get('id'));
        
        $this->assign('Nombre', $entity->SofNombre ); 
        $this->assign('Nivel', $entity->SofNivel);
        $this->assign('PerId', $entity->SofPerId);  
        $this->assign('Status', $entity->SofStatus);
        
    }

    public function Delete() {
        Software_Model_Software::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Software');
    }

}

?>