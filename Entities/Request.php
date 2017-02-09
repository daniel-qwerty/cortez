<?php

class Entities_Request extends Com_Database_Entity_Language {

    public $tableName = "Request";
    public $keyField = "ReqId";
    public $lanField = "ReqLanId";
    
    public $ReqId;
    public $ReqLanId;
    public $ReqType;
    public $ReqDate;
    public $ReqEmail;
    public $ReqName;
    public $ReqMessage;
    public $ReqStatus;
    public $ReqItem;
    public $ReqPhone;

}
