<?php

/**
 * 处理图片上传的问题。
 *
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */

class ImageController extends Controller {
    
    public function actionUpload()
    {
        $uploadedUrl = $this->doUploadImage();

        $result = array(
            'url' => $uploadedUrl,
            'status' => 1,
        );

        echo json_encode($result);
    }
    

}