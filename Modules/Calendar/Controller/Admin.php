<?PHP

class Calendar_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Calendar";
        Com_Helper_BreadCrumbs::getInstance()->add("Calendar", "/Admin/Calendar");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Calendar/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {
            $id = Calendar_Model_Calendar::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Calendar/Edit/id/' . $id);
        }
        $this->assign('Event');
        $this->assign('Description');
        $this->assign('Date');
        $this->assign('SpoId');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
        $this->assign('Sports', Sports_Model_Sport::getInstance()->getListSport());
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Calendar/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);
        
        if ($this->isPost()) {
            Calendar_Model_Calendar::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Calendar/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Calendar_Model_Calendar::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->CalId);
        $this->assign("Language", $entity->CalLanId);
        $this->assign('Event', $entity->CalEvent);
        $this->assign('Description', $entity->CalDescription);
        $this->assign('Date', $entity->CalDate);
        $this->assign('SpoId', $entity->CalSpoId);
        $this->assign('Status', $entity->CalStatus);

        $this->assign("languages", $languages);
        
        $this->assign('Sports', Sports_Model_Sport::getInstance()->getListSport());
    }

    public function Delete() {
        Calendar_Model_Calendar::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Calendar');
    }

}

?>