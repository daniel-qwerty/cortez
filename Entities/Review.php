<?php

class Entities_Review extends Com_Database_Entity{

    public $tableName = "Review";
    public $keyField = "RevId";
    
    public $RevId;
    public $RevComment;
    public $RevName;
    public $RevUrl;
    public $RevSource;
    public $RevStatus;
   
}
