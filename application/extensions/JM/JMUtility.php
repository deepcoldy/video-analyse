<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-22
 * Time: 下午6:39
 */


class JMUtility
{
    /**
     *
     * @param array $a
     * @param array $b
     * @return array 保留a的内容的前提下，把只存在于b的内容复制到a中
     */
    static public function ArrayAddRecursive($a, $b)
    {
        foreach ($a as $key => & $v)
        {
            if(is_array($v) && isset($b[$key]))
            {
                $v = self::ArrayAddRecursive($v, $b[$key]);
            }
        }
        $a = $a + $b;
        return $a;
    }

    static public function ArrayValueDefault($a)
    {
        $keys = func_get_args();
        array_shift($keys);
        $def = array_pop($keys);
        foreach($keys as $k)
        {
            if(!isset($a[$k]))
                return $def;
            $a = $a[$k];
        }
        return $a;
    }

    static public function ArrayValue($a)
    {
        $keys = func_get_args();
        array_shift($keys);
        foreach($keys as $k)
        {
            if(!isset($a[$k]))
                return null;
            $a = $a[$k];
        }
        return $a;
    }

    static public function ArraySub($a, $keys)
    {
        $r = array();
        foreach($keys as $k=>$v)
        {
            if(is_int($k))
            {
                if(isset($a[$v]))
                    $r[$v] = $a[$v];
            }
            else
            {
                $r[$k] = isset($a[$k]) ? $a[$k] : $v;
            }
        }
        return $r;
    }


    static public function ArrayColumnValues($ary, $k)
    {
        $a = array();
        foreach($ary as $row)
            $a[] = $row[$k];
        return $a;
    }

    static public function ArrayColumnGroup($ary, $k)
    {
        $a = array();
        foreach($ary as $row)
            $a[$row[$k]][] = $row;
        return $a;
    }

    static public function ArrayColumnJsonEncode($ary, $k)
    {
        foreach($ary as $ak=>$av)
        {
            $ary[$ak][$k] = json_encode($ary[$ak][$k]);
        }
        return $ary;
    }

    static public function ArrayColumnJsonDecode($ary, $k, $assoc = false)
    {
        foreach($ary as $ak=>$av)
        {
            $ary[$ak][$k] = json_decode($ary[$ak][$k], $assoc);
        }
        return $ary;
    }

    static public function ArrayColumnClear($ary, $k)
    {
        foreach($ary as $i=>$t)
        {
            unset($t[$k]);
            $ary[$i] = $t;
        }
        return $ary;
    }

    static public function ArrayColumnKeep($ary, $keys)
    {
        $a = array();
        foreach($ary as $i=>$t)
        {
            $item = array();
            foreach($keys as $k)
                $items[$k] = $t[$k];
            $a[$i] = $item;
        }
        return $a;
    }

    static public function ArrayColumnCount($ary, $k)
    {
        $result = array();
        foreach($ary as $i=>$t)
        {
            $v = $t[$k];
            $result[$v] = isset($result[$v]) ? ($result[$v] + 1) : 1;
        }
        return $result;
    }

    static public function ArrayColumnSearch($ary, $k, $v, $returnkey = null, $strict = false)
    {
        if($strict)
        {
            foreach($ary as $i=>$t)
            {
                if(isset($t[$k]) && $t[$k] === $v)
                {
                    if($returnkey === null)
                        return $i;
                    return $t[$returnkey];
                }
            }
        }
        else
        {
            foreach($ary as $i=>$t)
            {
                if(isset($t[$k]) && $t[$k] == $v)
                {
                    if($returnkey === null)
                        return $i;
                    return $t[$returnkey];

                }
            }
        }
        return false;
    }

    static public function ArrayReindex($ary, $key = null)
    {
        $a = array();
        if($key === null)
        {
            foreach($ary as $v)
                $a[] = $v;
        }
        else
        {
            foreach($ary as $v)
                $a[$v[$key]] = $v;
        }
        return $a;
    }

    static public function ExplodeLines($s, $columnNames = array())
    {
        $lineSeperator = "\n";
        if(strpos($s, $lineSeperator) === false)
            $lineSeperator = "\r";

        $columnSeperator = "\t";
        if(strpos($s, $columnSeperator) === false)
            $columnSeperator = ",";

        $lines = explode($lineSeperator, $s);
        $result = array();
        foreach($lines as $line)
        {
            $line = trim($line);
            $cells = explode($columnSeperator, $line);
            $resultRow = array();
            foreach($cells as $i=>$value)
            {
                $k = empty($columnNames[$i]) ? $i : $columnNames[$i];
                $resultRow[$k] = $value;
            }
            if($resultRow)
                $result[] = $resultRow;
        }
        return $result;
    }

    static public function PregValues($re, $string, $key = null)
    {
        if( preg_match_all($re, $string, $matches) === false)
            return false;

        if(is_null($key))
        {
            if(count($matches) == 1)
                return $matches[0];

            if(count($matches) == 2 && isset($matches[1]))
                return $matches[1];
        }
        else
        {
            if(isset($matches[$key]))
                return $matches[$key];
        }
        return false;
    }
    static public function RandomString($len, $chars = null)
    {
        $t = '';
        if( ! $chars)
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        $min = 0;
        $max = strlen($chars) - 1;

        for($i = 0; $i < $len; $i ++)
            $t .= $chars[mt_rand($min, $max)];
        return $t;
    }


    static public function Format($s, $a)
    {
        return preg_replace('/\{%(\w+)([^}]*)\}/e', '$a["\1"]\2', $s);
    }
    static public function IsValidName($s)
    {
        return preg_match('/^\w+$/', $s) != 0;
    }

    static public function IsValidCodeSymbol($s)
    {
        return preg_match('/^\w+$/', $s) != 0;
    }
    static public function IsValidEMail($s)
    {
        return preg_match('/^[^@]+@[^@]+\.[^@]+$/', $s) != 0;
    }

    static public function IsValidDate($s)
    {
        return preg_match('/^\d+-\d+-\d+$/', $s) != 0;
    }

    static public function IsValidDatetime($s)
    {
        return preg_match('/^\d+-\d+-\d+ \d+:\d+:\d+$/', $s) != 0 || IsValidDate($s);
    }

    static public function IsValidDateLongFormat($s)
    {
        return preg_match('/^\d\d\d\d-\d\d-\d\d$/', $s);
    }

    static public function IsValidTime($s)
    {
        return preg_match('/^(\d+:)*\d+$/', $s) != 0;
    }

    static public function IsValidMobilePhone($s)
    {
        return strlen($s) >= 11;
    }
    static public function IsValidUTF8($string)
    {
        // 	From http://w3.org/International/questions/qa-forms-utf-8.html
        return preg_match('%^(?:
        [\x09\x0A\x0D\x20-\x7E] # ASCII
        | [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
        | \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
        | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
        | \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
        | \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
        | [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
        | \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
        )*$%xs', $string);
    }

    /**
     * 获得时间的文本表示，例如：5分钟以前。
     * @param $int
     * @return string
     */
    public function get_time($int)
    {
        //$time = strtotime('now');
        $time = time();

        $second = $time - $int;
        $year = floor($second / 31536000);
        $month = floor($second / 2592000);
        $week = floor($second / 604800);
        $day = floor($second / 86400);
        $hour = floor($second / 3600);
        $min = floor($second / 60);
        if ($year > 0)
            if ($year == 1)
                return '1 year ago';
            else
                return $year . ' years ago';
        elseif ($year <= 0 && $month > 0)
            if ($month == 1)
                return '1 month ago';
            else
                return $month . ' months ago';
        elseif ($month <= 0 && $week > 0)
            if ($week == 1)
                return '1 week ago';
            else
                return $week . ' weeks ago';
        elseif ($week <= 0 && $day > 0)
            if ($day == 1)
                return '1 day ago';
            else
                return $day . ' days ago';
        elseif ($day <= 0 && $hour > 0)
            if ($hour == 1)
                return '1 hour ago';
            else
                return $hour . ' hours ago';
        elseif ($hour <= 0 && $min > 0)
            if ($min == 1)
                return '1 min ago';
            else
                return $min . ' mins ago';
        elseif ($min <= 0 && $second > 0)
            return $second . ' seconds ago';
    }

}

function SafeVarExport($v)
{
    if (extension_loaded('xdebug')) {
        @ini_set('html_errors', '0');
    }
    ob_start();
    var_dump($v);
    $s = ob_get_contents();
    ob_end_clean();
    if (extension_loaded('xdebug')) {
        @ini_restore('html_errors');
    }
    return $s;
}
function SystemEventLog($level, $class, $title, $content = null)
{
    static $in = false;
    static $count = 0;

    if($in) return false;

    $ignore_object_class_names = array(
        'Smarty',
        'Smarty_Internal_Template',
        'JMSiteEngine',
    );

    $count++;
    /*
    if($count > 20)
        return false;
    if($count == 20)
        $title = "TOO MANY $title";
    */
    $shouldIgnore = false;
    $in = true;
    $bt = debug_backtrace();
    $stack_strings = '';
    foreach($bt as $i => $call)
    {
        $fullClassMethod = '';
        if(isset($call['class']))
            $fullClassMethod = $call['class'] . $call['type'];
        if(isset($call['function']))
            $fullClassMethod .= $call['function'];

        if(in_array($fullClassMethod, array(
            'stream_socket_client', 'fsockopen',
            'iconv', 'simplexml_import_dom',
            'parse_url',
        )) )
        {
            $shouldIgnore = true;
            break;
        }
        $args = '';

        if($i != 0 && substr($fullClassMethod, 0, 5) != 'Smarty'
            && ! in_array($fullClassMethod, array('SystemErrorHandler', 'SystemExceptionHandler', 'SystemExceptionLog',
                'PDO->__construct', 'ftp_login'))
        )
        {
            $a = array();
            if(isset($call['args']))
            {
                foreach($call['args'] as $arg)
                {
                    $class_name = is_object($arg) ? get_class($arg) : "";
                    if(in_array($class_name, $ignore_object_class_names))
                        $a[] = $class_name;
                    else
                        $a[] = SafeVarExport($arg);
                }
            }
            $args = join(',', $a);
        }
        $file_line = '';
        if(isset($call['file']))
            $file_line .= $call['file'];
        $file_line .= ':';
        if(isset($call['line']))
            $file_line .= $call['line'];
        $stack_strings .= "#[$i] {$fullClassMethod}($args) @ [$file_line]\n";
    }

    if( ! is_null($content) && ! is_string($content))
        $content = serialize($content);

    $log_to_db = false;
    if( ! $shouldIgnore && class_exists('JMDbConnection'))
    {
        try
        {
            $conn = JMDbMysql::GetConnection();
            $envvars = array();
            $envvars['_POST'] = $_POST;
            $envvars['_GET'] = $_GET;
            $envvars['_COOKIE'] = $_COOKIE;
            if(isset($_SESSION)) $envvars['_SESSION'] = $_SESSION;
            $envvars['_SERVER'] = $_SERVER;
            $envvars['_FILES'] = $_FILES;
            $old_enable_show_error = $conn->enableShowError(false);
            if($conn && $conn->insert("systemlog", array(
                    'Level'=>$level,
                    'Class'=>$class,
                    'Title'=>mb_substr($title, 0, 160, 'UTF-8'),  // 255 * 2 / 3
                    'Content'=>$content ? $content : '',
                    'StackTrace'=>$stack_strings,
                    'EnvVars'=>serialize($envvars),
                )))
            {
                $log_to_db = true;
            }
            $conn->enableShowError($old_enable_show_error);
        }
        catch (Exception $e)
        {
        }
    }

    if(! $shouldIgnore && !$log_to_db)
    {
        if($content)
            error_log("[$level][$class] $title\n$content\n$stack_strings\n");
        else
            error_log("[$level][$class] $title\n$stack_strings\n");
    }

    $in = false;
    return true;
}
function SystemErrorHandler($errno, $errstr, $errfile, $errline)
{
    //E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR, E_COMPILE_WARNING can not be handled
    $errors = array(
        1=>'E_ERROR',
        2=>'E_WARNING',
        4=>'E_PARSE',
        8=>'E_NOTICE',
        16=>'E_CORE_ERROR',
        32=>'E_CORE_WARNING',
        64=>'E_COMPILE_ERROR',
        128=>'E_COMPILE_WARNING',
        256=>'E_USER_ERROR',
        512=>'E_USER_WARNING',
        1024=>'E_USER_NOTICE',
        2048=>'E_STRICT',
        4096=>'E_RECOVERABLE_ERROR',
        8192=>'E_DEPRECATED',
        16384=>'E_USER_DEPRECATED',
    );


    $loglevel = LOG_WARNING;
    if($errno == E_ERROR
        || $errno == E_PARSE
        || $errno == E_CORE_ERROR
        || $errno == E_COMPILE_ERROR
        || $errno == E_USER_ERROR
        || $errno == E_RECOVERABLE_ERROR
    )
    {
        $loglevel = LOG_ERR;
    }
    if(isset($errors[$errno]))
        $type = $errors[$errno];
    else
        $type = $errno;


    $logtitle = "$type $errstr";
    if(!JMUtility::IsValidUTF8($logtitle))
        $logtitle = iconv('GBK', 'UTF-8//IGNORE', $logtitle);

    SystemEventLog($loglevel, "php", $logtitle, "$type $errstr @ [$errfile:$errline]");

    /* Don't execute PHP internal error handler */
    //return true;

    // continue build-in handler
    // document said "null" is wrong.
    return false;
}

function SystemExceptionLog($exception)
{
    SystemEventLog(LOG_ERR, 'exception', get_class($exception) . ':' .  $exception->getMessage(), $exception->getTraceAsString());
}
function SystemExceptionHandler($exception)
{
    /* @var Exception $exception */
    SystemExceptionLog($exception);
    if(function_exists('fb'))
        fb($exception);
    $s = "An exception occurs: " . $exception->getMessage() . ", please contact with us. Thank you.\n";
    if(defined('JM_DEBUG') && JM_DEBUG)
    {
        $s = "<pre style='border:1px solid black;padding:5px;'>\n";
        $s .= 'Exception: ' . get_class($exception)  . "<br />\n";
        $s .= 'ExceptionCode: ' . $exception->getCode()  . "<br />\n";
        $s .= 'ExceptionMessage: ' . $exception->getMessage()  . "<br />\n";
        $s .= $exception->getTraceAsString()  . "<br />\n";
        if( $exception instanceof JMRpcDelegatedException)
        {
            $s .= 'DelegatedException: ' . $exception->getDelegatedExceptionClass()  . "<br />\n";
            $s .= 'DelegatedExceptionCode: ' . $exception->getDelegatedCode()  . "<br />\n";
            $s .= 'DelegatedExceptionMessage: ' . $exception->getDelegatedMessage()  . "<br />\n";
            $s .= $exception->getDelegatedTraceAsString() . "<br />\n";
        }
        $s .= "</pre>\n";
    }
    die($s);
}
//
//set_error_handler('SystemErrorHandler', E_ALL);
//set_exception_handler('SystemExceptionHandler');
