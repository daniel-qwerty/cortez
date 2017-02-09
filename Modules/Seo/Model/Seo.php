<?php

class Seo_Model_Seo extends Com_Module_Model {

    /**
     *
     * @return Seo_Model_Seo 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages) {

        $db = new Entities_Seo();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->SeoId = $id;
            $db->SeoLanId = $language->LanId;
            $db->SeoTitle = $obj->Title;
            $db->SeoDescription = $obj->Description;
            $db->SeoShortDescription = $obj->ShortDescription;
            $db->SeoPage = $obj->Page;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_Seo();
        $db->SeoId = $intId;
        $db->SeoLanId = $obj->Language;
        $db->SeoTitle = $obj->Title;
        $db->SeoDescription = $obj->Description;
        $db->SeoShortDescription = $obj->ShortDescription;
        $db->SeoPage = $obj->Page;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Seo();
        $db->SeoId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Seo();
        $db->SeoId = $intId;
        $db->SeoLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getByPage($lanId, $strAlias) {
        $db = new Entities_Seo();
        $db->SeoLanId = $lanId;
        $db->SeoPage = $strAlias;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Seo();
        return $text->getAll($text->getList());
    }

}
