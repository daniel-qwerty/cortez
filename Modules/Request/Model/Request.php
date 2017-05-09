<?php

class Request_Model_Request extends Com_Module_Model {

    /**
     *
     * @return Request_Model_Request 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $language) {

        $db = new Entities_Request();

        $id = $db->getNextId();
        $db->ReqId = $id;
        $db->ReqLanId = "7";
        $db->ReqDate = date("Y-m-d H:i:s");
        $db->ReqName = $obj->Name;
        $db->ReqEmail = $obj->Email;
        $db->ReqMessage = $obj->Message;
        $db->ReqPhone = $obj->Phone;
        $db->ReqStatus = "1";
        $db->ReqType =$obj->Type;
        $db->ReqItem =$obj->Item;
        $db->action = ACTION_INSERT;
        $db->save();

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_Request();
        $db->ReqId = $intId;
        $db->ReqLanId = $obj->Language;
        $db->ReqName = $obj->Name;
        $db->ReqEmail = $obj->Email;
        $db->ReqMessage = $obj->Message;
        $db->ReqStatus = $obj->Status;
        $db->ReqType =$obj->Type;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Request();
        $db->ReqId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Request();
        $db->ReqId = $intId;
        $db->ReqLanId = $lanId;
        $db->get();
        return $db;
    }

       
    public function getListByLanOfertas($limit = 1000) {
        $text = new Entities_Request();
        return $text->getAll($text->getList()->where("ReqLanId= 7")->andWhere("ReqType = 'OFERTAS'")->orderBy("ReqDate desc")->limit(0, $limit));
    }

    public function getListByLanSalones($limit = 1000) {
        $text = new Entities_Request();
        return $text->getAll($text->getList()->where("ReqLanId= 7")->andWhere("ReqType = 'SALONES'")->orderBy("ReqDate desc")->limit(0, $limit));
    }
    
    public function countAll() {
        $db = new Entities_Request();
        return $db->getAll("select count(*) as number from {$db}");
    }

}
