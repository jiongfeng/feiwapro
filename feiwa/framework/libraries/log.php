<?php
/**
 * 记录日志 
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
class Log{

    const SQL       = 'SQL';
    const ERR       = 'ERR';
    private static $log =   array();

    public static function record($message,$level=self::ERR) {
        $now = @date('Y-m-d H:i:s',time());
        switch ($level) {
            case self::SQL:
               self::$log[] = "[{$now}] {$level}: {$message}\r\n";
               break;
            case self::ERR:
                $log_file = BASE_DATA_PATH.'/log/'.date('Ymd',TIMESTAMP).'.log';
                $url = $_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF'];
                $url .= " ( app={$_GET['app']}&feiwa={$_GET['feiwa']} ) ";
                $content = "[{$now}] {$url}\r\n{$level}: {$message}\r\n";
                file_put_contents($log_file,$content, FILE_APPEND);
                break;
        }
    }

    public static function read(){
    	return self::$log;
    }
}