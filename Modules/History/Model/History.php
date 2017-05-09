<?php

class History_Model_History extends Com_Module_Model {

    /**
     *
     * @return History_Model_History 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image) {

        $db = new Entities_History();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->HisId = $id;
            $db->HisLanId = $language->LanId;
            $db->HisTitle = $obj->Title;
            $db->HisDescription = $obj->Description;
            $db->HisImage = $image;
            $db->HisStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image) {
        $db = new Entities_History();
        $db->HisId = $intId;
        $db->HisLanId = $obj->Language;
        $db->HisTitle = $obj->Title;
        $db->HisDescription = $obj->Description;        
        $db->HisStatus = $obj->Status;      
        if ($image != "") {
            $db->HisImage = $image;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_History();
        $db->HisId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_History();
        $db->HisId = $intId;
        $db->HisLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_History();
        return $text->getAll($text->getList());
    }
    
    public function getListService($lanId) {
        $db = new Entities_History();
        return $db->getAll($db->getList()->where("HisLanId={$lanId}")->andWhere("HisStatus = 1"));
    }

}
