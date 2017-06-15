<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/8/1
 * Time: 16:58
 */
class FaceModel extends BaseModel
{

    public function faceDetect($path)
    {
        // 参数数组
        $params = array(
            'url' => $path,
        );
        return $this->request('/face/detect', $params);
    }

    /**
     * 人脸对比
     * @param $path1
     * @param $path2
     * @return mixed
     */
    public function faceCompare($path1, $path2)
    {
        // 参数数组
        $params = array(
            'url1' => $path1,
            'url2' => $path2,
        );
        return $this->request('/face/compare', $params);
    }

    /**
     * 主播状态
     * @param $path
     * @return mixed
     */
    public function faceStatus($path)
    {
        // 参数数组
        $params = array(
            'url' => $path,
        );
        return $this->request('/face/livestream/detect', $params);
    }

}