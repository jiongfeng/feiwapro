<?php
/**
 * 邮件任务队列模型
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class mail_cronModel extends Model{
    public function __construct() {
        parent::__construct('mail_cron');
    }
    /**
     * 新增商家消息任务计划
     * @param unknown $insert
     */
    public function addMailCron($insert) {
        return $this->insert($insert);
    }
    /**
     * 查看商家消息任务计划
     *
     * @param unknown $condition
     * @param number $limit
     */
    public function getMailCronList($condition, $limit = 0, $order = 'mail_id asc') {
        return $this->where($condition)->limit($limit)->order($order)->select();
    }

    /**
     * 删除商家消息任务计划
     * @param unknown $condition
     */
    public function delMailCron($condition) {
        return $this->where($condition)->delete();
    }
}
