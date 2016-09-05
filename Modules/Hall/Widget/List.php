<?php

class Hall_Widget_List extends Com_Object
{

    private $lan;
    

    /**
     *
     * @return Hall_Widget_List
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }


    public function render()
    {
        
        $list = Hall_Model_Hall::getInstance()->getListByLan($this->lan->LanId);
        foreach ($list as $obj) { ?>

                <option value="<?php echo $obj->TypeId;  ?>"> <?php echo $obj->TypeName;?> </option>

        <?php } ?>

    <?PHP
    }

}
