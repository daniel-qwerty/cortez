<?php

class Sports_Model_Sport extends Com_Module_Model {

    /**
     *
     * @return Sports_Model_Sport 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj,$languages, $image, $banner) {

        $db = new Entities_Sport();

        $id = $db->getNextId();
        
        
        foreach ($languages as $language) {
            $db->SpoId = $id;
            $db->SpoLanId = $language->LanId;
            $db->SpoTitle = $obj->Title;
            $db->SpoDescription = str_replace("'", "\\'",$obj->Description)  ;
            $db->SpoImage = $image;
            $db->SpoBanner = $banner;
            $db->SpoStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            
            
           $db->save();
        }
        
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image, $banner) {
        $db = new Entities_Sport();
        $db->SpoId = $intId;
        $db->SpoLanId = $obj->Language;
        $db->SpoTitle = $obj->Title;
        $db->SpoDescription = str_replace("'", "\\'",$obj->Description)  ;
        $db->SpoStatus = $obj->Status;
        if ($image != "") {
            $db->SpoImage = $image;
        }
        if ($banner != "") {
            $db->SpoBanner = $banner;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Sport();
        $db->SpoId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Sport();
        $db->SpoId = $intId;
        $db->SpoLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getByUrl($url, $lanId) {
        $db = new Entities_Sport();
        $db->SpoId = $url;
        $db->SpoLanId = $lanId;
        $db->get();
        return $db;
    }
    
    public function getList($lanId, $limit) {
        $text = new Entities_Sport();
        return $text->getAll($text->getList()->where("SpoLanId={$lanId} ")->andWhere("SpoStatus=1")->limit(0, $limit));
    }
    
    public function getListSport() {
        $text = new Entities_Sport();
        return $text->getAll($text->getList());
    }
    
    

}
