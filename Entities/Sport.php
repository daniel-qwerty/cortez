<?php

class Entities_Sport extends Com_Database_Entity_Language{

    public $tableName = "Sports";
    public $keyField = "SpoId";
    public $lanField = "SpoLanId";
    
    public $SpoId;
    public $SpoLanId;
    public $SpoTitle;
    public $SpoDescription;
    public $SpoImage;
    public $SpoBanner;
    public $SpoStatus;

}
