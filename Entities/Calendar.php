<?php

class Entities_Calendar extends Com_Database_Entity_Language{

    public $tableName = "Calendar";
    public $keyField = "CalId";
    public $lanField = "CalLanId";
    
    public $CalId;
    public $CalLanId;
    public $CalSpoId;
    public $CalEvent;
    public $CalDescription;
    public $CalDate;
    public $CalStatus;

}
