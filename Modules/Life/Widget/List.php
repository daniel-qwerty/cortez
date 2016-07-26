<?php

class Life_Widget_List extends Com_Object {

    private $lan;
    private $category;

    /**
     *
     * @static
     * @access public
     * @return Life_Widget_List
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setCategory($cat) {
        $this->category = $cat;
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

        $list = Life_Model_Life::getInstance()->getLista($this->lan->LanId, $this->category);

        foreach ($list as $item) {
            ?>

            <li><a target="_blanck" href="<?php echo $item->CerLink; ?>"><?php echo $item->CerName; ?></a> </li>

            <?PHP
        }
    }

}
?>
