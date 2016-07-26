<?php

class Customers_Widget_Customers extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Customers_Widget_Customers
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

        $list = Customers_Model_Customer::getInstance()->getListClients($this->lan->LanId);

        foreach ($list as $item) {
            ?>


            <div class="col-xs-6 col-lg-3">
                <div class="item-gallery">
                    <a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "projects/list/" .$item->CusId); ?>">
                        <img class="img-responsive" src="<?= Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->CusLogo; ?>" alt=""
                         data-toggle="tooltip" data-placement="top" title="<?php echo $item->CusName; ?>"/>
                    </a>
                    
                </div>
            </div>

            <?PHP
        }
    }

}
?>
