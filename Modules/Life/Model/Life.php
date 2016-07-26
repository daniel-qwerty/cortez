<?php

class Life_Model_Life extends Com_Module_Model {

    /**
     *
     * @return Life_Model_Life 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image) {

        $db = new Entities_Life();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->CerId = $id;
            $db->CerLanId = $language->LanId;
            $db->CerName = $obj->Name;
            $db->CerDescription = $obj->Description;
            $db->CerImage = $image;
            $db->CerStatus = $obj->Status;
            $db->CerLink = $obj->Link;
            $db->CerCategory = $obj->Category;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image) {
        $db = new Entities_Life();
        $db->CerId = $intId;
        $db->CerLanId = $obj->Language;
        $db->CerName = $obj->Name;
        $db->CerDescription = $obj->Description;
        $db->CerStatus = $obj->Status;
        $db->CerLink = $obj->Link;
        $db->CerCategory = $obj->Category;
        if ($image != "") {
            $db->CerImage = $image;
        }
               
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Life();
        $db->CerId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Life();
        $db->CerId = $intId;
        $db->CerLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Life();
        return $text->getAll($text->getList());
    }
    
    public function getLista($lanId, $category) {
        $db = new Entities_Life();
        return $db->getAll($db->getList()->where("CerLanId={$lanId} and CerCategory = '{$category}' "));
    }

}
