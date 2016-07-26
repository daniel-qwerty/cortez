<?php

class Calendar_Widget_Events extends Com_Object
{

    private $lan;
    private $date;

    /**
     *
     * @static
     * @access public
     * @return Calendar_Widget_Events
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render()
    {

        $list = Calendar_Model_Calendar::getInstance()->getListByDate($this->lan->LanId, $this->date);
        echo ("eventArray = [");
      
        $count = 0;
        foreach ($list as $item) {
            $count++;
            if($count == count($list)){
                echo sprintf("
                {
                title: '%s',
                description: '%s',
                date: '%s',
                url: '%s'
            }", $item->CalEvent,  $item->CalDescription,  date("Y-m-d", strtotime($item->CalDate)), $item->CalId);
            }  else {
                echo sprintf("
                {
                title: '%s',
                description: '%s',
                date: '%s',
                url: '%s'
            },", $item->CalEvent,  $item->CalDescription,  date("Y-m-d", strtotime($item->CalDate)), $item->CalId);
            }
            
            
        }
         echo ("];");

    }

    public function renderPag()
    {

        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);
        $count = 0;
        foreach ($list as $item) {
            $count++;
            ?>
            <div class="col-xs-2 col-md-2"><a href="javascript:void(0)"
                                              onclick="slideServiceTo(<?= $count - 1; ?>);"><img
                        class="servicio00 servicio0<?php echo $count; ?> img-responsive <?= ($count == 1) ? "" : "black" ?>"
                        alt=""/></a></div>
        <?PHP

        }
    }

    public function getJs()
    {
        $list = Services_Model_Service::getInstance()->getListService($this->lan->LanId);

        foreach ($list as $index => $item) {
//            echo sprintf('#servicios .servicio0%s{content:url(%s)}', $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogo);
//            echo sprintf('#servicios .servicio0%s.black{content:url(%s)}', $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogoGray);

            echo sprintf("
            if(x==%s)
            {
                $('.servicio0%s').attr('src','%s');
            }
            else
            {
                $('.servicio0%s').attr('src','%s');
            }", $index + 1, $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogo, $index + 1, Com_Helper_Url::getInstance()->getUploads() . '/Image/' . $item->SerLogoGray);


        }
    }

}

?>
