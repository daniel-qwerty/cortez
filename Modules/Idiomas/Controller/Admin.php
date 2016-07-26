<?PHP

class Idiomas_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Links";
        Com_Helper_BreadCrumbs::getInstance()->add("Links", "/Admin/Idiomas");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Idiomas/Add");
        if ($this->isPost()) {
            Idiomas_Model_Idiomas::getInstance()->doInsert($this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Idiomas');
        }
       
        $this->assign('Nombre'); 
        $this->assign('Habla');
        $this->assign('Escribe'); 
        $this->assign('Lee'); 
        $this->assign('PerId'); 
        $this->assign('Status');
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Personas/Add");
        $this->setView("add");
        if ($this->isPost()) {
            Idiomas_Model_Idiomas::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Personas');
        }
        $entity = Idiomas_Model_Idiomas::getInstance()->get(get('id'));
        
        $this->assign('Nombre', $entity->IdiNombre ); 
        $this->assign('Habla', $entity->IdiHabla);
        $this->assign('Escribe', $entity->IdiEscribe); 
        $this->assign('Lee', $entity->IdiLee ); 
        $this->assign('PerId', $entity->IdiPerId );  
        $this->assign('Status', $entity->IdiStatus);
        
    }

    public function Delete() {
        Idiomas_Model_Idiomas::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Idiomas');
    }

}

?>