<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class FaceController extends Controller {

    public $layout = 'new';

    public function actionIndex()
    {
        $this->pageTitle = '人脸属性识别';
        $this->render('/face/index');
    }
    
    public function actionPostDetects()
    {
        $uploadedUrl = $this->doUploadImage();

        // 获取裁剪区域
        $faces = FaceModel::instance()->faceDetect($uploadedUrl);

        $result = array(
            'status' => 1,
            'url' => $uploadedUrl,
            'data' => $faces,
        );

        echo json_encode($result);
    }

    public function actionCompare()
    {
        $this->pageTitle = '人脸对比';
        $this->render('compare');
    }

    public function actionPostCompare()
    {
        $path1 = $_GET['img1'];
        $path2 = $_GET['img2'];
        $data = FaceModel::instance()->faceCompare($path1, $path2);

        echo json_encode([
            'status' => 1,
            'data' => $data
        ]);
    }

    public function actionStatus()
    {
        $this->pageTitle = '主播状态监测';
        $this->render('status');
    }

    public function actionPostStatus()
    {
        $uploadedUrl = $this->doUploadImage();
        
        $data = FaceModel::instance()->faceStatus($uploadedUrl);

        echo json_encode([
            'status' => 1,
            'url' => $uploadedUrl,
            'data' => $data
        ]);
    }

}