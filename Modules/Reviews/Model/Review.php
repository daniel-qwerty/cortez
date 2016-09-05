<?php

class Reviews_Model_Review extends Com_Module_Model {

    /**
     *
     * @return Reviews_Model_Review 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj) {

        $db = new Entities_Review();
        $db->RevName = $obj->Name;
        $db->RevComment = $obj->Comment;
        $db->RevSource = $obj->Source;
        $db->RevUrl = $obj->Url;
        $db->RevStatus = $obj->Status;
        $db->action = ACTION_INSERT;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_Review();
        $db->RevId = $intId;
        $db->RevName = $obj->Name;
        $db->RevComment = $obj->Comment;
        $db->RevSource = $obj->Source;
        $db->RevUrl = $obj->Url;
        $db->RevStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Review();
        $db->RevId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId) {
        $db = new Entities_Review();
        $db->RevId = $intId;
        $db->get();
        return $db;
    }

    public function getByName($strName) {
        $db = new Entities_Review();
        $db->RevName = $strName;
        $db->get();
        return $db;
    }

    public function getList($limit = 1000) {
        $text = new Entities_Review();
        return $text->getAll($text->getList()->where("RevStatus = 1")->limit(0, $limit)->orderBy("RevId desc"));
    }

}
