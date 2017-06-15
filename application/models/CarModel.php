<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/8/1
 * Time: 16:58
 */
class CarModel extends BaseModel
{

    public function detect($path)
    {
        // 参数数组
        $params = array(
            'image_url' => $path,
        );
        return $this->request('/car/recognize', $params);
    }

}