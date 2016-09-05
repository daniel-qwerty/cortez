<?php

class Hall_Model_Media extends Com_Module_Model {

    /**
     *
     * @return Hall_Model_Media 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $fileName, $language) {
        $db = new Entities_MediaHall();

        $id = $db->getNextId();

        $db->MedId = $id;
        $db->MedLanId = $language;
        $db->MedHallId = $obj->HallId;
        $db->MedImage = $fileName;
        $db->MedFooter = $obj->Footer;
        $db->MedYoutube = $obj->Youtube;
        $db->MedStatus = 1;
        $db->action = ACTION_INSERT;
        $db->save();


        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");
    }

    public function doUpdate($intId, Com_Object $obj) {
        $idList = $obj->ImageListId;
        $videoList = $obj->ImageListVideo;
        $footerList = $obj->ImageListFooter;


        for ($i = 0; $i < count($idList); $i++) {
            $db = new Entities_MediaHall();
            $db->MedId = $idList[$i];
            $db->MedLanId = $obj->Language;
            $db->MedYoutube = $videoList[$i];
            $db->MedFooter = $footerList[$i];
            $db->MedStatus = 1;
            $db->action = ACTION_UPDATE;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registros Actualizados");
    }

    public function doDelete($intId) {
        $db = new Entities_MediaHall();
        $db->MedId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function getList() {
        $db = new Entities_MediaHall();
        return $db->getAll($db->getList());
    }

    public function getListByProject($ProId, $lanId) {
        $db = new Entities_MediaHall();
        return $db->getAll($db->getListQuery()->where("MedHallId={$ProId}")->andWhere("MedLanId={$lanId}")->orderBy("MedId"));
    }

}
