<?php

class Idiomas_Model_Idiomas extends Com_Module_Model
{

    /**
     *
     * @return Idiomas_Model_Idiomas
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert($PerId, $obj)
    {

        $db = new Entities_Idiomas();
        $db->IdiPerId = $PerId;
        $db->IdiNombre = $obj['Nombre'];
        $db->IdiHabla = $obj['Habla'];
        $db->IdiLee = $obj['Lee'];
        $db->IdiEscribe = $obj['Escribe'];
        $db->IdiStatus = 1;
        $db->action = ACTION_INSERT;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");
    }


    public function doUpdate($intId, Com_Object $obj)
    {
        $db = new Entities_Idiomas();
        $db->IdiId = $intId;
        $db->IdiPerId = $obj['PerId'];
        $db->IdiNombre = $obj['Nombre'];
        $db->IdiHabla = $obj['Habla'];
        $db->IdiLee = $obj['Lee'];
        $db->IdiEscribe = $obj['Escribe'];
        $db->IdiStatus = $obj['Status'];
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId)
    {
        $db = new Entities_Idiomas();
        $db->IdiId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId)
    {
        $db = new Entities_Idiomas();
        $db->IdiId = $intId;
        $db->get();
        return $db;
    }

    public function getByName($strName)
    {
        $db = new Entities_Idiomas();
        $db->IdiNombre = $strName;
        $db->get();
        return $db;
    }

    public function getList()
    {
        $contact = new Entities_Idiomas();
        return $contact->getAll($contact->getList());
    }

    public function getListPerId($PerId)
    {
        $contact = new Entities_Idiomas();
        return $contact->getAll($contact->getList()->where(sprintf('IdiPerId = %s', $PerId)));
    }

}
