<?php

class Hall_Model_Hall extends Com_Module_Model {

    /**
     *
     * @return Hall_Model_Hall 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $fileName) {

        $db = new Entities_Hall();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->HallId = $id;
            $db->HallLanId = $language->LanId;
            $db->HallName = $obj->Name;
            $db->HallResume = $obj->Resume;
            $db->HallDescription = $obj->Description;
            $db->HallAmenities = $obj->Amenities;
            $db->HallImage = $fileName;
            $db->HallStatus = $obj->Status;
            $db->HallType = $obj->Type;
            $db->HallBaquete = $obj->Banquete;
            $db->HallTeatro = $obj->Teatro;
            $db->HallAula = $obj->Aula;
            $db->HallU = $obj->U;
            $db->HallCocktail = $obj->Cocktail;

            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $fileName) {
        $db = new Entities_Hall();
        $db->HallId = $intId;
        $db->HallLanId = $obj->Language;
        $db->HallName = $obj->Name;
        $db->HallResume = $obj->Resume;
        $db->HallDescription = $obj->Description;
        $db->HallAmenities = $obj->Amenities;
        if ($fileName != "") {
            $db->HallImage = $fileName;
        }
        
        $db->HallStatus = $obj->Status;
        $db->HallType = $obj->Type;
        $db->HallBaquete = $obj->Banquete;
        $db->HallTeatro = $obj->Teatro;
        $db->HallAula = $obj->Aula;
        $db->HallU = $obj->U;
        $db->HallCocktail = $obj->Cocktail;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Hall();
        $db->HallId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Hall();
        $db->HallId = $intId;
        $db->HallLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getByAlias($lanId, $strAlias) {
        $db = new Entities_Hall();
        $db->HallLanId = $lanId;
        $db->HallName = $strAlias;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Hall();
        return $text->getAll($text->getList());
    }
    
    public function getListByLan($lanId) {
        $text = new Entities_Hall();
        return $text->getAll($text->getList()->where("HallLanId={$lanId} and HallStatus = 1"));
    }
    
    public function getListByLanBanner($lanId) {
        $text = new Entities_Hall();
        return $text->getAll($text->getList()->where("HallLanId={$lanId} and HallStatus = 1 and HallType = 1"));
    }

}
