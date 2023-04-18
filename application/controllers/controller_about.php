<?php
class controller_about extends Controller{
    function action_about($model_result)
    {
        $this->view->generate($model_result,'views_about.php');
    }
}
?>