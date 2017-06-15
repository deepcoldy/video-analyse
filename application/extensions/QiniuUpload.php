<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午12:10
 */
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

class QiniuUpload  {
    /**
     * @var UploadManager
     */
    protected $client;

    protected $token;


    public function __construct($cfg = null){
        global $CONFIG;

        if (empty($cfg)) {
            $config = $CONFIG['CDN_SERVERS']['QINIU_CDN'];
        } else {
            $config = $cfg;
        }
        $auth = new Auth($config['key'], $config['secret']);
        $token = $auth->uploadToken($config['bucket']);
        $uploadMgr = new UploadManager();
        $this->token = $token;
        $this->client = $uploadMgr;
    }

    public function saveFileAs($srcFile, $destFile, $deleteTempFile = true){
        try {
            list($ret, $err) = $this->client->putFile($this->token, $destFile, $srcFile);

            if ($deleteTempFile) {
                @unlink($srcFile);
            }

            return $err === null;
        } catch (Exception $e) {
            if ($deleteTempFile) {
                @unlink($srcFile);
            }

            return false;
        }

    }
} 