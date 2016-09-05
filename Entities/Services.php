<?php

class Entities_Services extends Com_Database_Entity_Language{

    public $tableName = "Services";
    public $keyField = "SerId";
    public $lanField = "SerLanId";
    
    public $SerId;
    public $SerLanId;
    public $SerTitle;
    public $SerDescription;
    public $SerImage;
    public $SerStatus;

}
