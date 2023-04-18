<?php
class controller_price extends Controller{
    function action_price($model_name,$action)
    {
        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/". $model_file;
        if (file_exists($model_path)) {
            include "application/models/".$model_file;
        }
        // создаем model
        $model = new $model_name;
        $action = $action;
        if (method_exists($model,$action)) {
            $model_result = $model->$action();
        }
        
        $this->view->generate($model_result,'views_price.php');
    }
}
?>