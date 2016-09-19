<?php

class Promos_Model_Promo extends Com_Module_Model {

    /**
     *
     * @return Promos_Model_Promo
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $imageFile) {

        $db = new Entities_Promo();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->ProId = $id;
            $db->ProLanId = $language->LanId;
            $db->ProTitle = $obj->Title;
            $db->ProDate = $obj->Date;
            $db->ProLink = $obj->Link;
            $db->ProDescription = $obj->Description;
            $db->ProImage = $imageFile;
            $db->ProStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $imageFile) {
        $db = new Entities_Promo();
        $db->ProId = $intId;
        $db->ProLanId = $obj->Language;
        $db->ProTitle = $obj->Title;
        $db->ProDate = $obj->Date;
        $db->ProLink = $obj->Link;
        $db->ProDescription = $obj->Description;
        if ($imageFile != "") {
            $db->ProImage = $imageFile;
        }
        $db->ProStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Promo();
        $db->ProId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Promo();
        $db->ProId = $intId;
        $db->ProLanId = $lanId;
        $db->get();
        return $db;
    }



    public function getList($lanId, $limit = 1000, $category) {
        $text = new Entities_Promo();
        return $text->getAll($text->getList()->where("ProLanId={$lanId} and ProStatus = 1 ")->orderBy("ProDate desc")->limit(0, $limit));
    }
    
    public function getPromo($lanId, $limit = 1000) {
        $text = new Entities_Promo();
        return $text->getAll($text->getList()->where("ProLanId={$lanId} and ProStatus = 1 ")->orderBy("ProDate desc")->limit(0, $limit));
    }



}
