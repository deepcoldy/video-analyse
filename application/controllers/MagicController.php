<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class MagicController extends Controller {

    public $layout = 'new';

    public function actionIndex()
    {
        $this->pageTitle = '风格转换';
        $this->render('/magic/index');
    }
    
    public function actionUpload()
    {
        $uploadedUrl = $this->doUploadImage();
        $style = $_POST['style'];
        $data = MagicModel::instance()->detect($uploadedUrl, $style);

        $result = array(
            'status' => 1,
            'url' => $uploadedUrl,
            'url2' => $data['generated_style_image']?:'http://dressimage.oss-cn-beijing.aliyuncs.com/dress_post/temp/5818b61c6d47c.jpg',
        );

        echo json_encode($result);
    }

    public function actionConvert()
    {
        //
        $image = $_POST['image'];
        $style = $_POST['style'];
        $data = MagicModel::instance()->detect($image, $style);

        $result = array(
            'status' => 1,
            'url' => $data['generated_style_image']?:'http://dressimage.oss-cn-beijing.aliyuncs.com/dress_post/temp/5818b61c6d47c.jpg',
        );

        echo json_encode($result);
    }
}