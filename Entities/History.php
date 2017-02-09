<?php

class Entities_History extends Com_Database_Entity_Language{

    public $tableName = "History";
    public $keyField = "HisId";
    public $lanField = "HisLanId";
    
    public $HisId;
    public $HisLanId;
    public $HisTitle;
    public $HisDescription;
    public $HisImage;
    public $HisStatus;

}
