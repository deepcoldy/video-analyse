<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午12:10
 */
require_once (Yii::getPathOfAlias('application.vendor.aliyun')).DIRECTORY_SEPARATOR.'aliyun.php';
use Aliyun\OSS\OSSClient;

class AliyunUpload {
    /**
     * @var OSSClient
     */
    protected $client;

    protected $bucket;

    public function __construct(){
        global $CONFIG;

        $config = $CONFIG['CDN_SERVERS']['ALI_CDN'];
        $this->bucket = $config['Bucket'];
        $this->client = OSSClient::factory(array(
            'AccessKeyId'=>$config['AccessKeyId'],
            'AccessKeySecret'=>$config['AccessKeySecret'],
            'Endpoint'=>$config['Endpoint'],
        ));
    }

    public function saveFileAs($srcFile, $destFile, $deleteTempFile = true){
        try {
            $fi = new finfo(FILEINFO_MIME_TYPE);

            $res = $this->client->putObject(array(
                'Bucket' => $this->bucket,
                'Key' => $destFile,
                'Content' => fopen($srcFile, 'r'),
                'ContentLength' => filesize($srcFile),
                'ContentType' => $fi->file($srcFile),
            ));

            if ($deleteTempFile) {
                @unlink($srcFile);
            }

            return true;
        } catch (Exception $e) {

            echo $e->getMessage();exit;
            if ($deleteTempFile) {
                @unlink($srcFile);
            }

            return false;
        }

    }
} 