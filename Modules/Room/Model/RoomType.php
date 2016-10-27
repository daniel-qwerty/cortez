<?php

class Room_Model_RoomType extends Com_Module_Model {

    /**
     *
     * @return Room_Model_RoomType 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $fileName) {

        $db = new Entities_RoomType();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->TypeId = $id;
            $db->TypeLanId = $language->LanId;
            $db->TypeName = $obj->Name;
            $db->TypeResume = $obj->Resume;
            $db->TypeDescription = $obj->Description;
            $db->TypeAmenities = $obj->Amenities;
            $db->TypeServices = $obj->Services;
            $db->TypeImage = $fileName;
            $db->TypeStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $fileName) {
        $db = new Entities_RoomType();
        $db->TypeId = $intId;
        $db->TypeLanId = $obj->Language;
        $db->TypeName = $obj->Name;
        $db->TypeResume = $obj->Resume;
        $db->TypeDescription = $obj->Description;
        $db->TypeAmenities = $obj->Amenities;
        $db->TypeServices = $obj->Services;
        if ($fileName != "") {
            $db->TypeImage = $fileName;
        }
        
        $db->TypeStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_RoomType();
        $db->TypeId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_RoomType();
        $db->TypeId = $intId;
        $db->TypeLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getByAlias($lanId, $strAlias) {
        $db = new Entities_RoomType();
        $db->TypeLanId = $lanId;
        $db->TypeName = $strAlias;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_RoomType();
        return $text->getAll($text->getList());
    }
    
    public function getListByLan($lanId) {
        $text = new Entities_RoomType();
        return $text->getAll($text->getList()->where("TypeLanId={$lanId} and TypeStatus = 1 and TypeName <> 'Suite Superior'"));
    }
    
    public function getListByRoom($lanId,$room) {
        $text = new Entities_RoomType();
        return $text->getAll($text->getList()->where("TypeLanId={$lanId} and TypeStatus = 1 and TypeName = '{$room}'"));
    }

}
