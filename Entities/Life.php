<?php

class Entities_Life extends Com_Database_Entity_Language{

    public $tableName = "Life";
    public $keyField = "CerId";
    public $lanField = "CerLanId";
    
    public $CerId;
    public $CerLanId;
    public $CerName;
    public $CerDescription;
    public $CerImage;
    public $CerLink;
    public $CerStatus;
    public $CerCategory;

}
