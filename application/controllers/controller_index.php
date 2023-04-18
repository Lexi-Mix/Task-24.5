<?php
class controller_index extends Controller{
    function action_index($model_result)
    {
        $this->view->generate($model_result,'views_index.php');
    }
}
?>