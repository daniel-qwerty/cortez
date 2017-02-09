<?php

class Entities_RoomType extends Com_Database_Entity_Language {

    public $tableName = "RoomType";
    public $keyField = "TypeId";
    public $lanField = "TypeLanId";
    public $TypeId;
    public $TypeLanId;
    public $TypeName;
    public $TypeResume;
    public $TypeDescription;
    public $TypeImage;
    public $TypeAmenities;
    public $TypeServices;
    public $TypeStatus;
    public $TypeImportant;
}
