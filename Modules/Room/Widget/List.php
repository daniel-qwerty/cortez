<?php

class Room_Widget_List extends Com_Object
{

    private $lan;
    

    /**
     *
     * @return Room_Widget_List
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
        
        $list = Room_Model_RoomType::getInstance()->getListByForm($this->lan->LanId);
        foreach ($list as $obj) { ?>

                <option value="<?php echo $obj->TypeId;  ?>"> <?php echo $obj->TypeName;?> </option>

        <?php } ?>

    <?PHP
    }

}
