<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class DressController extends Controller {

    public $layout = 'new';

    public function actionIndex()
    {
        /*$this->pageTitle = '商品属性';*/
        $this->pageTitle = '服饰属性';
        $this->render('/dress/index');
    }
    
    public function actionPostDetects()
    {
        $uploadedUrl = $this->doUploadImage();

        // 获取裁剪区域
        $faces = DressModel::instance()->detect($uploadedUrl);

        $result = array(
            'status' => 1,
            'url' => $uploadedUrl,
            'data' => $faces,
        );

        echo json_encode($result);
    }

}
