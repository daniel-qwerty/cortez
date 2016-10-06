<?php

class Entities_Polices extends Com_Database_Entity_Language{

    public $tableName = "Polices";
    public $keyField = "SerId";
    public $lanField = "SerLanId";
    
    public $SerId;
    public $SerLanId;
    public $SerTitle;
    public $SerDescription;
    public $SerImage;
    public $SerStatus;

}
