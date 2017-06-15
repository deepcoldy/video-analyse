<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class StarController extends Controller
{
    public $layout='new';

    public function actionPK()
    {
        global $CONFIG;

        $this->render('pk', [
            'servers'=>$CONFIG['ObjectDetectServers'],
        ]);
    }

    public function actionDetect()
    {
        global $CONFIG;
        $this->pageTitle = '明星识别';

        $this->render('detect', [
            'servers'=>$CONFIG['ObjectDetectServers'],
        ]);
    }

    public function actionPostDetect()
    {

        $uploadedUrl = $this->doUploadImage();

        // 获取裁剪区域
        $data = StarModel::instance()->starDetect($uploadedUrl);

        unset($data['psn']);

        $result = array(
            'image' => $uploadedUrl,
            'data' => $data,
            'status' => 1,
        );

        echo json_encode($result);
    }
}