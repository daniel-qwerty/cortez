<?php

class Contact_Controller_Service extends Com_Module_Controller_Json {

    public function Save() {
        if ($this->isPost()) {
            $obj = $this->getPostObject();
            Personas_Model_Personas::getInstance()->doInsert($obj, null);
            echo json_encode(true);
        }
    }

    

}
