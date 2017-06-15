<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/8/1
 * Time: 17:01
 */
class ObjectsModel extends BaseModel
{

    public function objectDetect($path)
    {
        // 参数数组
        $params = [
            'image_url' => $path,
        ];

        $result = $this->request('/product/clothes/detect', $params);

        return $result;
    }
    public function objectTags($path)
    {
        // 参数数组
        $params = [
            'image_url' => $path,
        ];

        $result = $this->request('/image/tagging', $params);

        return $result;
    }

    /**
     * 物体对比
     * @param $path1
     * @param $path2
     * @return mixed
     */
    public function compare($path1, $path2)
    {
        // 参数数组
        $params = array(
            'image_url1' => $path1,
            'image_url2' => $path2,
        );
        return $this->request('/product/compare', $params);
    }

}