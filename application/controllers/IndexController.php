<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class IndexController extends Controller {

    public function actionIndex()
    {
        $this->redirect('/login/index');
    }

    public function actionLogout() {
        Yii::app()->session->destroy();
        $this->redirect('/login/index');
    }
}
