<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */
// require '../../vendor/autoload.php';

class LoginController extends Controller {

    // public $layout = 'new';
    private $client = null;

    public function actionIndex()
    {
        $this->pageTitle = '登录';
        $this->render('/login/index');
    }

    private function initHttpClient() {
        if (!$this->client) {
            $this->client = new GuzzleHttp\Client(['base_uri' => 'http://dressplus-api.appdevs.cn']);
        }
    }

    public function actionVerifyCode() {
        $this->initHttpClient();
        $response = $this->client->request('POST', '/verify/code');
        $body = $response->getBody();
        die($body);
    }

    public function actionLogin() {
        $username = Yii::app()->request->getParam('username');
        $password = Yii::app()->request->getParam('password');
        $verifyCode = Yii::app()->request->getParam('verifyCode');
        $verifyKey = Yii::app()->request->getParam('verifyKey');
        $res = [
            'status' => 'error',
            'msg' => ''
        ];
        if ($username && $password && $verifyCode && $verifyKey) {
            $this->initHttpClient();
            $response = $this->client->request('post', '/verify/check', [
                'form_params' => [
                    'ckey' => $verifyKey,
                    'code' => $verifyCode
                ]
            ]);
            $body = $response->getBody();
            $verifyData = json_decode($body, true);
            if ($verifyData['status'] != 'SUCCESS') {
                $res['status'] = 'verify_error';
                $res['msg'] = '验证码错误';
            } else {
                $response = $this->client->request('post', '/user/login', [
                    'form_params' => [
                        'user_name' => $username,
                        'password' => $password
                    ]
                ]);
                $body = $response->getBody();
                $loginData = json_decode($body, true);
                if ($loginData['status'] != 'SUCCESS') {
                    $res['msg'] = '用户名或者密码错误';
                } else {
                    $res['status'] = 'ok';
                    $res['msg'] = '登录成功';
                }
            }
        } else {
            $res['msg'] = '请输入正确的用户名或密码或验证码';
        }
        die(json_encode($res));
    }

    // public function actionPostDetects()
    // {
    //     $uploadedUrl = $this->doUploadImage();

    //     // 获取裁剪区域
    //     $faces = CarModel::instance()->detect($uploadedUrl);

    //     $result = array(
    //         'status' => 1,
    //         'url' => $uploadedUrl,
    //         'data' => $faces,
    //     );

    //     echo json_encode($result);
    // }

}
