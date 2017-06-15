<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class CarController extends Controller {

    public $layout = 'new';

    public function actionIndex()
    {
        $this->pageTitle = '车辆识别';
        $this->render('/car/index');
    }
    
    public function actionPostDetects()
    {
        $uploadedUrl = $this->doUploadImage();

        // 获取裁剪区域
        $faces = CarModel::instance()->detect($uploadedUrl);

        $result = array(
            'status' => 1,
            'url' => $uploadedUrl,
            'data' => $faces,
        );

        echo json_encode($result);
    }

}