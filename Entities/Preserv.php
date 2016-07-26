<?php

class Entities_Preserv extends Com_Database_Entity_Language{

    public $tableName = "Preserv";
    public $keyField = "CerId";
    public $lanField = "CerLanId";
    
    public $CerId;
    public $CerLanId;
    public $CerName;
    public $CerDescription;
    public $CerImage;
    public $CerFooter;
    public $CerStatus;

}
