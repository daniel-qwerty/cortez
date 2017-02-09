<?php

class History_Widget_History extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return History_Widget_History
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

        $list = History_Model_History::getInstance()->getListService($this->lan->LanId);
        $count = 0;
        $s = 0;
        foreach ($list as $item) {
            if ($count == 0) {
                $count = 1;
                $s++;
                ?>

                <section class="section" >
                    <div class="background-media" data-0-top-bottom="background-position: 50% -10px" data-start="background-position: 50% 0px" style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->HisImage ?>); background-repeat:no-repeat; background-size:cover; background-attachment:fixed; background-position: 50% 0%;">
                    </div>
                    <div class="background-overlay grid-overlay-0" style="background-color: rgba(86,154,167,0);"></div>
                    <div class="container-fullwidth container-vertical-middle">
                        <div class="row ">
                            <div class="col-md-6" style="background:rgba(255, 255, 255, 0.75);">
                                <div class="row">
                                    

                                    <div class="col-md-8 col-md-offset-2 text-center">
                                        <div style="height: 70px;"></div>
                                        <div class="col-text-1 element-top-20 element-bottom-100 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                            <p><?= $item->HisDescription ?></p>
                                        </div>
                                        <div style="height: 70px;"></div>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </section>

                <?PHP
            } else {
                $count = 0
                ?>
                <section class="section" >
                    <div class="background-media" data-0-top-bottom="background-position: 50% -80px" data-start="background-position: 50% 0px" style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $item->HisImage ?>); background-repeat:no-repeat; background-size:cover; background-attachment:fixed; background-position: 50% 0%;">
                    </div>
                    <div class="background-overlay grid-overlay-0" style="background-color: rgba(86,154,167,0);"></div>
                    <div class="container-fullwidth container-vertical-middle">
                        <div class="row">
                           
                            <div class="col-md-6 col-md-offset-6" style="background:rgba(255, 255, 255, 0.75);">
                                <div class="row">
                                    
                                    <div class="col-md-8 col-md-offset-2 text-center">
                                        <div style="height: 70px;"></div>
                                        <div class="col-text-1 element-top-20 element-bottom-100 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                            <p><?= $item->HisDescription ?></p>
                                        </div>
                                        <div style="height: 70px;"></div>
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

}
?>
