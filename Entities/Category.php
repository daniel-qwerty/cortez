<?php

class Entities_Category extends Com_Database_Entity_Language{

    public $tableName = "category";
    public $keyField = "CatId";
    public $lanField = "CatLanId";
    
    public $CatId;
    public $CatLanId;
    public $CatName;
    public $CatImage;
    public $CatStatus;

}
