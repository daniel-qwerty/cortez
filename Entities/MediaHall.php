<?php

class Entities_MediaHall extends Com_Database_Entity_Language {

    public $tableName = "MediaHall";
    public $keyField = "MedId";
    public $lanField="MedLanId";

    public $MedId;
    public $MedLanId;
    public $MedHallId;
    public $MedImage;
    public $MedFooter;
    public $MedYoutube;
    public $MedStatus;

}
