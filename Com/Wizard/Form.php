<?php

class Com_Wizard_Form extends Com_Object {

    /**
     *
     * @access public
     * @var String
     */
    public $title;

    /**
     *
     * @access public
     * @var String
     */
    public $action = "";

    /**
     *
     * @access private
     * @var Array 
     */
    private $lstControls = array();

    /**
     * @access private
     * @var type 
     */
    private $toolBar;
    private $showToolBar = false;
    private $cssClasses = array();
    private $tabs = array();
    private $showTabs = false;

    public function __construct() {
        $this->toolBar = new Com_Wizard_ToolBar();
    }

    /**
     *
     * @access public
     * @param Com_Wizard_Form_Control $control 
     */
    public function add(Com_Wizard_Form_Control $control) {
        $this->lstControls [] = $control;
    }

    public function addAction($image, $label, $href = null, $javascript = null) {
        $this->toolBar->add($image, $label, $href, $javascript);
        $this->showToolBar = true;
    }

    public function addCssClass($class) {
        $this->cssClasses[] = $class;
    }

    public function addTab($label, $href, $active = false) {
        array_push($this->tabs, array("label" => $label, "href" => $href, "active" => $active));
        $this->showTabs = true;
    }

    /**
     * @access public
     */
    public function render() {
        $intId = date("YmdHis");
        ?>

        <div class="panel panel-white <?PHP echo implode(" ", $this->cssClasses); ?>">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"><?PHP echo $this->title; ?></h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <?PHP
                    foreach ($this->lstControls as $objControl) {
                        $objControl->render();
                    }
                    ?>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button id="saveForm" type="submit" class="btn btn-success">Sign in</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <?PHP
    }

}
