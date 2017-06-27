<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-29
 * Time: 下午6:06
 */
// require '../../vendor/autoload.php';

class LoginController extends NoPowerController {

    // public $layout = 'login';
    private $client = null;

    public function actionIndex()
    {
        $this->pageTitle = '登录';
        $this->render('/login/index');
    }

    private function doActivation($data, $type = 200) {
        $this->initHttpClient();
        $response = $this->client->request('post', '/user/activation', [
            'form_params' => [
                'userId' => $data['userId'],
                'code' => $data['code'],
                'registerFrom' => 200,
                'type' => $type
            ]
        ]);
        return json_decode($response->getBody(), true);
    }

    public function actionRegister($activation = '', $user_id = '')
    {
        $page = 'form';
        $error = '';
        if ($activation && $user_id) {
            $activationData = $this->doActivation(['userId' => $user_id, 'code' => $activation]);
            if ($activationData['status'] == 'SUCCESS') {
                $page = 'success';
            } else {
                $error = json_encode($activationData);
            }
        }
        $this->pageTitle = '注册';
        $this->render('/login/register', ['page' => $page, 'error' => $error]);
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
                    Yii::app()->session['user_login'] = $username;
                }
            }
        } else {
            $res['msg'] = '请输入正确的用户名或密码或验证码';
        }
        die(json_encode($res));
    }

    public function actionResetpassword($activation = '', $user_id = '') {
        $this->pageTitle = '忘记密码';
        $page = 'first';
        $error = '';
        $email = '';
        if ($activation && $user_id) {
            $activationData = $this->doActivation(['userId' => $user_id, 'code' => $activation], 200);
            if ($activationData['status'] == 'SUCCESS') {
                $userData = $this->getUserInfo($user_id);
                if ($userData['status'] == 'SUCCESS') {
                    $page = 'thrid';
                    $email = $userData['data']['email'];
                }
            } else {
                $error = json_encode($activationData);
            }
        }
        $this->render('/login/reset', ['page' => $page, 'email' => $email, 'user_id' => $user_id, 'error' => $error]);
    }

    private function getUserInfo($userId) {
        $this->initHttpClient();
        $response = $this->client->request('post', '/user/info', [
            'form_params' => [
                'userId' => $userId
            ]
        ]);
        return json_decode($response->getBody(), true);
    }

    private function doResetPass($data) {
        $this->initHttpClient();
        $response = $this->client->request('post', '/user/resetPass', [
            'form_params' => $data
        ]);
        $body = $response->getBody();
        return json_decode($body, true);
    }

    public function actionResendpass() {
        $request = Yii::app()->request;
        $username = $request->getParam('username');
        $data = $this->doResetPass(['userName' => $username, 'step' => 100]);
        if ($data['status'] == 'SUCCESS') {
            die(json_encode(['status' => 'ok']));
        } else {
            die(json_encode(['status' => 'failed']));
        }
    }

    public function actionResetpass() {
        $request = Yii::app()->request;
        $userName = $request->getParam('username');
        $userId = $request->getParam('userId');
        $password = $request->getParam('password');
        $data = $this->doResetPass(['userName' => $userName, 'userId' => $userId, 'password' => $password, 'step' => 200]);
        if ($data['status'] == 'SUCCESS') {
            die(json_encode(['status' => 'ok']));
        } else {
            die(json_encode(['status' => 'failed']));
        }
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
