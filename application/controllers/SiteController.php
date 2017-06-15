<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/7/28
 * Time: 19:12
 */

class SiteController extends CController
{
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            echo $error['message'];
        }
    }
}