<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/6/29
 * Time: 9:41
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        $this->redirect('/face/index');
    }

}