<?php

class Polices_Widget_Polices extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Polices_Widget_Polices
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setParent($id) {
        $this->parent = $id;
        return $this;
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render() {

        $list = Polices_Model_Service::getInstance()->getListService($this->lan->LanId);
        $count = 0;
        $s =0;
        foreach ($list as $item) {
            if($count == 0){
            $count = 1;
            $s++;
            ?>

            <section class="section" id="<?= $item->SerId; ?>">
                <div class="background-media" data-0-top-bottom="background-position: 50% -10px" data-start="background-position: 50% 0px" style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->SerImage ?>); background-repeat:no-repeat; background-size:cover; background-attachment:fixed; background-position: 50% 0%;">
                </div>
                <div class="background-overlay grid-overlay-0" style="background-color: rgba(86,154,167,0);"></div>
                <div class="container-fullwidth container-vertical-middle">
                    <div class="row">
                        <div class="col-md-6" style="background:rgba(255, 255, 255, 0.75);">
                            <div class="row">
                                
                                <div class="col-md-8 col-md-offset-2 text-center">
                                    
                                    
                                    <div class="col-text-1 element-top-20 element-bottom-100 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                        <p><?= $item->SerDescription?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>

            <?PHP
            
            }  else {  $count=0 ?>
                <section class="section">
                <div class="background-media" data-0-top-bottom="background-position: 50% -80px" data-start="background-position: 50% 0px" style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->SerImage ?>); background-repeat:no-repeat; background-size:cover; background-attachment:fixed; background-position: 50% 0%;">
                </div>
                <div class="background-overlay grid-overlay-0" style="background-color: rgba(86,154,167,0);"></div>
                <div class="container-fullwidth container-vertical-middle">
                    <div class="row">
                        
                        <div class="col-md-6 col-md-offset-6 text-center" style="background:rgba(255, 255, 255, 0.75);">
                            <div class="row">
                               
                                <div class="col-md-8 col-md-offset-2 text-center">
                                   
                                    
                                    <div class="col-text-1 element-top-20 element-bottom-100 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                        <p><?= $item->SerDescription?></p>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?PHP
            
            }
        }
    }

    public function renderPag() {

        $list = Polices_Model_Service::getInstance()->getListService($this->lan->LanId);
        $count = 0;
        foreach ($list as $item) {
            $count++;
            ?>
            <div class="col-xs-2 col-md-2"><a href="javascript:void(0)"
                                              data-toggle="tooltip" data-placement="top" title="<?= $item->SerTitle ?>"
                                              onclick="slideServiceTo(<?= $count - 1; ?>);"><img
                        class="servicio00 servicio0<?php echo $count; ?> img-responsive <?= ($count == 1) ? "" : "black" ?>"
                        alt=""/></a></div>
            <?PHP
        }
    }

    public function getJs() {
        $list = Polices_Model_Service::getInstance()->getListService($this->lan->LanId);

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
