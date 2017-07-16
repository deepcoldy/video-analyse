<?php

class RegisterController extends NoPowerController {

    private $client = null;

    private function initHttpClient() {
        if (!$this->client) {
            $this->client = new GuzzleHttp\Client(['base_uri' => 'http://dressplus-api.appdevs.cn']);
        }
    }

    public function actionIndex() {
        $this->pageTitle = '注册';
        $this->render('/register/index');
    }

    private function doVerifyCheck($verifyKey, $verifyCode) {
        $this->initHttpClient();
        $response = $this->client->request('post', '/verify/check', [
            'form_params' => [
                'ckey' => $verifyKey,
                'code' => $verifyCode
            ]
        ]);
        $body = $response->getBody();
        $verifyData = json_decode($body, true);
        return $verifyData['status'];
    }

    private function doRegister($data) {
        $this->initHttpClient();
        $response = $this->client->request('post', '/user/register', [
            'form_params' => [
                'email' => $data['email'],
                'tel' => $data['phone'],
                'companyName' => $data['company'],
                'registerFrom' => 200,
                'password' => $data['password']
                // 'registerTime' => date('Y-m-d H:i:s'),
                // 'registerIp' => $_SERVER['REMOTE_ADDR']
            ]
        ]);
        $body = $response->getBody();
        $registerData = json_decode($body, true);
        return $registerData;
    }

    public function actionVerifyCode() {
        $this->initHttpClient();
        $response = $this->client->request('POST', '/verify/code');
        $body = $response->getBody();
        die($body);
    }

    public function actionResend() {
        $request = Yii::app()->request;
        $email = $request->getParam('email');
        $userId = $request->getParam('user_id');
        $res = [
            'status' => 'error',
            'msg' => '信息有误，请重新注册'
        ];
        if ($email && $userId) {
            $this->initHttpClient();
            $response = $this->client->request('POST', '/user/reSend', [
                'form_params' => [
                    'email' => $email,
                    'userId' => $userId
                ]
            ]);
            $body = $response->getBody();
            $resData = json_decode($body, true);
            if ($resData['status'] == 'SUCCESS') {
                $res['status'] = 'ok';
                $res['msg'] = '重新激活成功';
            } else {
                $res['status'] = 'error';
                $res['msg'] = '重新激活失败';
            }
        }
        die(json_encode($res));
    }

    public function actionRegister() {

        $request = Yii::app()->request;
        $email = $request->getParam('email');
        $phone = $request->getParam('phone');
        $company = $request->getParam('company');
        $password = $request->getParam('password');
        $verifyCode = $request->getParam('verifyCode');
        $verifyKey = $request->getParam('verifyKey');

        $res = [
            'status' => 'error',
            'msg' => ''
        ];
        if ($email && $phone && $company && $password && $verifyCode && $verifyKey ) {
            $this->initHttpClient();
            $verfiyStatus = $this->doVerifyCheck($verifyKey, $verifyCode);
            if ($verfiyStatus != 'SUCCESS') {
                $res['status'] = 'verify_error';
                $res['msg'] = '验证码错误';
            } else {
                $registerData = $this->doRegister([
                    'email' => $email,
                    'phone' => $phone,
                    'company' => $company,
                    'password' => $password
                ]);
                if ($registerData['status'] != 'SUCCESS') {
                    $res['msg'] = $registerData['msg'];
                } else {
                    $res['status'] = 'ok';
                    $res['msg'] = '注册成功';
                    $res['data'] = $registerData['data'];
                }
            }
        } else {
            $res['msg'] = '输入信息不完整';
        }
        die(json_encode($res));
    }
}
