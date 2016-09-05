<?php

class Hall_Widget_Gallery extends Com_Object
{

    private $lan;
    private $limit;
    private $hallId;

    /**
     *
     * @return Hall_Widget_Gallery
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

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setHall($hallId)
    {
        $this->hallId = $hallId;
        return $this;
    }

    public function render()
    {
        $list = hall_Model_Media::getInstance()->getListByProject($this->hallId, $this->lan->LanId);
        //print_r($list);
        foreach ($list as $item) {
            ?>
            <div class="figure element-top-60 element-bottom-20 os-animation" data-os-animation="fadeInRight" data-os-animation-delay="10s">
                <a class="figure-image magnific" href="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->MedImage; ?>" target="_self"> <img alt="<?php echo $item->MedImage; ?>" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->MedImage; ?>"> </a>
            </div>
            
        <?php
        }
    }

}
