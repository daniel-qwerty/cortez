<?php

class SpecialOffers_Model_SpecialOffer extends Com_Module_Model {

    /**
     *
     * @return SpecialOffers_Model_SpecialOffer 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image) {

        $db = new Entities_SpecialOffers();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->SpeId = $id;
            $db->SpeLanId = $language->LanId;
            $db->SpeName = $obj->Name;
            $db->SpeDescription = $obj->Description;
            $db->SpeStatus = $obj->Status;  
            $db->SpeImage = $image; 
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image) {
        $db = new Entities_SpecialOffers();
        $db->SpeId = $intId;
        $db->SpeLanId = $obj->Language;
        $db->SpeName = $obj->Name;
        $db->SpeDescription = $obj->Description;
        $db->SpeStatus = $obj->Status;
         if ($image != "") {
            $db->SpeImage = $image;
        }
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_SpecialOffers();
        $db->SpeId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_SpecialOffers();
        $db->SpeId = $intId;
        $db->SpeLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList($lanId, $limit = 1000) {
        $text = new Entities_SpecialOffers();
        return $text->getAll($text->getList()->where("SpeLanId={$lanId} and SpeStatus = 1")->limit(0, $limit));
    }
    
    

}
