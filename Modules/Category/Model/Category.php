<?php

class Category_Model_Category extends Com_Module_Model {

    /**
     *
     * @return Category_Model_Category 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image) {

        $db = new Entities_Category();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->CatId = $id;
            $db->CatLanId = $language->LanId;
            $db->CatName = $obj->Name;
            $db->CatImage = $image;
            $db->CatStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image) {
        $db = new Entities_Category();
        $db->CatId = $intId;
        $db->CatLanId = $obj->Language;
        $db->CatName = $obj->Name;
        $db->CatStatus = $obj->Status;
        if ($image != "") {
            $db->CatImage = $image;
        }
               
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Category();
        $db->CatId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Category();
        $db->CatId = $intId;
        $db->CatLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Category();
        return $text->getAll($text->getList());
    }

}
