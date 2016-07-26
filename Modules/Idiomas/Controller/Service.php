<?php

class Idiomas_Controller_Service extends Com_Module_Controller_Json {

    public function Save() {
        if ($this->isPost()) {
            $obj = $this->getPostObject();
            Idiomas_Model_Idomas::getInstance()->doInsert($obj, null);
            echo json_encode(true);
        }
    }

    

}
