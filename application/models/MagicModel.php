<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/8/1
 * Time: 16:58
 */
class MagicModel extends BaseModel
{

    public function detect($path, $style)
    {
        // 参数数组
        $params = array(
            'style' => $style,
            'image_url' => $path,
        );
        return $this->request('/image/style/generate', $params);
    }

}