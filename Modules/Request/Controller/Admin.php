<?PHP

class Request_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Solicitudes";
        Com_Helper_BreadCrumbs::getInstance()->add("Solicitudes", "/Admin/Contact");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Request/Add");
        $languages = Language_Model_Language::getInstance()->getList();

        if ($this->isPost()) {
            $id = Request_Model_Request::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Request/Edit/id/' . $id);
        }
        $this->assign('Email');
        $this->assign('Name');
        $this->assign('Date');
        $this->assign('Type');
        $this->assign('Item');
        $this->assign('Message');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Request/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {
            Request_Model_Request::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Request/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Request_Model_Request::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->ReqId);
        $this->assign("Language", $entity->ReqLanId);
        $this->assign('Date', $entity->ReqDate);
        $this->assign('Email', $entity->ReqEmail);
        $this->assign('Type', $entity->ReqType);
        $this->assign('Item', $entity->ReqItem);
        $this->assign('Name', $entity->ReqName);
        $this->assign('Message', $entity->ReqMessage);
        $this->assign('Status', "1");

        $this->assign("languages", $languages);
        
        
    }

    public function Delete() {
        Request_Model_Request::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Request');
    }

    public function Export() {
        Com_Helper_BreadCrumbs::getInstance()->add("Exportar", "/Admin/Request/Export");
        Com_Helper_Style::getInstance()->addFile("report.css");
        $list = Request_Model_Request::getInstance()->getList();
        $this->assign("list", $list);
    }

    public function Reply() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Request/Reply");


        if ($this->isPost()) {
            $to = $_POST['To'];
            $subject = $_POST['Subject'];
            $headers = "From: " . strip_tags($_POST['From']) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($_POST['From']) . "\r\n";
            $headers .= "CC: daniel@neblux.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = '<html><body>';
            $message .= $_POST['Message'];
            $message .= '</body></html>';
            
            mail($to, $subject, $message, $headers);
            
            Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Mensaje enviado con exito");
        }
        $this->assign('To');
        $this->assign('From');
        $this->assign('Message');
        $this->assign('Subject');
    }

}

?>