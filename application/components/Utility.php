<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-31
 * Time: 下午5:56
 */

class Utility {

    /**
     * 获得用户头像
     * @param $image
     * @return string
     */
    public static function getProfileImage($image){
        if (!$image) {
            return CDN_PATH.self::simpleEscape('profile/default.jpg');      // 默认图片
        }
        if (strpos($image, 'http://') === false && strpos($image, 'https://') === false) {
            $image = CDN_PATH.self::simpleEscape($image);
        }
        return $image;
    }

    /**
     * 获得缩略图的路径
     * @param $path
     * @return string
     */
    public static  function getThumbImageUrl($path) {
        if (strpos($path, 'http') === false) {
            if (strpos($path, 'thumb_medium') === false) {
                return CDN_THUMB_PATH . self::simpleEscape($path);
            } else {
                if (defined('ENV') && ENV == 'AWS') {
                    return CDN_THUMB_PATH . self::simpleEscape($path);
                }
                return CDN_THUMB_PATH_OLD .  self::simpleEscape(substr($path, 13));
            }
        }

        return $path;
    }

    /**
     * 获取图片的cdn上的url
     * @param $path
     * @return string
     */
    public static  function getImageUrl($path) {
        if (strpos($path, 'http') === false) {
            return CDN_PATH.self::simpleEscape($path);
        }
        return $path;
    }

    /**
     * 获取post的分享url
     * @param integer $id post的id
     * @return url
     */
    public static function getShareUrl($id) {
        return Yii::app()->createAbsoluteUrl('/post/' . $id);
    }

    /**
     * 替换url中的空格，等字符
     * @param $url
     * @return mixed|string
     */
    public static function simpleEscape($url)
    {
        $url = str_replace('+','%20',$url);
        $url = str_replace(' ','%20',$url);
        return $url;
    }

    /**
     * 获得文件后缀
     * @param $name
     * @return string
     */
    public static function getExtensionName($name)
    {
        if(($pos=strrpos($name,'.'))!==false)
            return (string)substr($name,$pos+1);
        else
            return '';
    }

    /**
     * 获取图片的cdn上的url
     * @param $path
     * @return string
     */
    public static  function getSearchUploadedImageUrl($path) {
        if (strpos($path, 'http') === false) {
            return SEARCH_CDN_PATH.self::simpleEscape($path);
        }
        return $path;
    }

}