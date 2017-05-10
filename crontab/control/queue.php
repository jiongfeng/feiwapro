<?php
/**
 * 队列
*
 * 
 *
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
*/
defined('ByFeiWa') or exit('Access Invalid!');
ini_set('default_socket_timeout', -1);
class queueControl extends BaseCronControl {

    public function __construct() {}

    public function indexFeiwa() {
        $logic_queue = Logic('queue');
        $model = Model();
        $worker = new QueueServer();
        $queues = $worker->scan();
        while (true) {
            $content = $worker->pop($queues,600);
            if (is_array($content)) {
                $method = key($content);
                $arg = current($content);

                $result = $logic_queue->$method($arg);
                if (!$result['state']) {
                    $this->log($result['msg'],false);
                }
            } else {
                $model->checkactive();
            }
        }
    }
}
