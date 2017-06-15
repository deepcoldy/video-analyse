<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class ObjectController extends Controller
{
    public $layout='new';

    public function actionDetect()
    {
        $this->pageTitle = '物体检测';
        $this->render('detect');
    }
    public function actionPostDetect()
    {
        $uploadedUrl = $this->doUploadImage();
        // 获取裁剪区域
        $data = ObjectsModel::instance()->objectDetect($uploadedUrl);

        $result = array(
            'image' => $uploadedUrl,
            'data' => $data,
            'status' => 1,
        );

        echo json_encode($result);
    }

    public function actionTags()
    {
        $this->pageTitle = '通用物体场景识别';
        $this->render('tags');
    }

    public function actionPostTags()
    {
        $uploadedUrl = $this->doUploadImage();
        // 获取裁剪区域
        $data = ObjectsModel::instance()->objectTags($uploadedUrl);

        $result = array(
            'image' => $uploadedUrl,
            'data' => $data,
            'status' => 1,
        );

        echo json_encode($result);
    }


    public function actionCompare()
    {
        $this->render('compare');
    }

    public function actionPostCompare()
    {
        $path1 = $_GET['img1'];
        $path2 = $_GET['img2'];
        $data = ObjectsModel::instance()->compare($path1, $path2);

        echo json_encode([
            'status' => 1,
            'data' => $data
        ]);
    }

}