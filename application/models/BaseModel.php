<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-24
 * Time: 上午1:35
 */

class BaseModel {
    /**
     * @return static
     */
    static public function instance()
    {
        return new static;
    }

    /**
     * @var JMDbMysqlReadWriteSplit|null
     */
    public $db = null;

    public function __construct(){
        $this->db = new JMDbMysqlReadWriteSplit();
        $this->db->addMaster(JMDbMysql::GetConnection('Write'));
        $this->db->addSlave(JMDbMysql::GetConnection('Read'));
    }

    public function request($url, $params)
    {
        if (strpos($url, 'http') !== 0) {
            $url = BACKEND_URL . $url;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $output = curl_exec($ch);

        curl_close($ch);

        Yii::log('request: ' . $url . ' | ' . json_encode($params). ' | response: ' . $output, CLogger::LEVEL_INFO, 'search');

        $result = json_decode($output, true);

        return $result;
    }

} 