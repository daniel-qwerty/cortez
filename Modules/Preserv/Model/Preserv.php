<?php

class Preserv_Model_Preserv extends Com_Module_Model {

    /**
     *
     * @return Preserv_Model_Preserv 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image) {

        $db = new Entities_Preserv();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->CerId = $id;
            $db->CerLanId = $language->LanId;
            $db->CerName = $obj->Name;
            $db->CerDescription = $obj->Description;
            $db->CerImage = $image;
            $db->CerStatus = $obj->Status;
            $db->CerFooter = $obj->Footer;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image) {
        $db = new Entities_Preserv();
        $db->CerId = $intId;
        $db->CerLanId = $obj->Language;
        $db->CerName = $obj->Name;
        $db->CerDescription = $obj->Description;
        $db->CerStatus = $obj->Status;
        $db->CerFooter = $obj->Footer;
        if ($image != "") {
            $db->CerImage = $image;
        }
               
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Preserv();
        $db->CerId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Preserv();
        $db->CerId = $intId;
        $db->CerLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList($lanId, $limit) {
        $text = new Entities_Preserv();
        return $text->getAll($text->getList()->where("CerLanId={$lanId} ")->andWhere("CerStatus=1")->limit(0, $limit));
    }
    
    public function getListCert($lanId) {
        $db = new Entities_Preserv();
        return $db->getAll($db->getList()->where("CerLanId={$lanId}"));
    }

}
