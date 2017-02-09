<?php

class TextsEngine_Model_Text extends Com_Module_Model {

    /**
     *
     * @return TextsEngine_Model_Text 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages) {

        $db = new Entities_TextEngine();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->TxtId = $id;
            $db->TxtLanId = $language->LanId;
            $db->TxtAlias = $obj->Alias;
            $db->TxtDescription = $obj->Description;
            $db->TxtStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_TextEngine();
        $db->TxtId = $intId;
        $db->TxtLanId = $obj->Language;
        $db->TxtAlias = $obj->Alias;
        $db->TxtDescription = $obj->Description;
        $db->TxtStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_TextEngine();
        $db->TxtId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_TextEngine();
        $db->TxtId = $intId;
        $db->TxtLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getByAlias($lanId, $strAlias) {
        $db = new Entities_TextEngine();
        $db->TxtLanId = $lanId;
        $db->TxtAlias = $strAlias;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_TextEngine();
        return $text->getAll($text->getList());
    }
    
     public function getListByLan($lanId) {
        $text = new Entities_TextEngine();
        return $text->getAll($text->getList()->where("TxtLanId={$lanId} and TxtStatus = 1"));
    }

}
