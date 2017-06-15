<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/8/1
 * Time: 17:02
 */
class StarModel extends BaseModel
{

    /**
     * PK明星衣品
     * @param $uri
     * @param $path
     * @return mixed
     */
    public function starPK($uri, $path, $x, $y, $width, $height)
    {
        // 参数数组
        $params = [
            'qtype' => 13,
            'path' => $path,
            'x' => intval($x),
            'y' => intval($y),
            'width' => intval($width),
            'height' => intval($height),
        ];

        $result = $this->request($uri, $params);

        return $result;
    }

    /**
     * 明星识别
     * @param $path
     * @return mixed
     */
    public function starDetect( $path)
    {
        // 参数数组
        $params = [
            'url' => $path,
        ];

        $result = $this->request('/celebrity/detect', $params);

        return $result;
    }
}