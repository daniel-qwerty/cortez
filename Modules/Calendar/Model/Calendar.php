<?php

class Calendar_Model_Calendar extends Com_Module_Model {

    /**
     *
     * @return Calendar_Model_Calendar 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages) {

        $db = new Entities_Calendar();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->CalId = $id;
            $db->CalLanId = $language->LanId;
            $db->CalEvent = $obj->Event;
            $db->CalDescription = $obj->Description;
            $db->CalStatus = $obj->Status;
            $db->CalSpoId = $obj->SpoId;
            $db->CalDate = $obj->Date;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_Calendar();
        $db->CalId = $intId;
        $db->CalLanId = $obj->Language;
        $db->CalEvent = $obj->Event;
        $db->CalDescription = $obj->Description;
        $db->CalStatus = $obj->Status;
        $db->CalSpoId = $obj->SpoId;
        $db->CalDate = $obj->Date;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Calendar();
        $db->CalId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Calendar();
        $db->CalId = $intId;
        $db->CalLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getByEvent($lanId, $strAlias) {
        $db = new Entities_Calendar();
        $db->CalId = $lanId;
        $db->CalEvent = $strAlias;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Calendar();
        return $text->getAll($text->getList());
    }
    
    public function getListByDate($lanId, $date) {
        $text = new Entities_Calendar();
        return $text->getAll($text->getList()->where("CalLanId={$lanId} and CalStatus = 1 and DATE_FORMAT(CalDate,'%Y/%m') = '{$date}'"));
    }
    
    public function getListByDate2($lanId, $date) {
        $text = new Entities_Calendar();
        return $text->getAll($text->getList()->where("CalLanId={$lanId} and CalStatus = 1 and CalDate = '{$date}'"));
    }

}
