<?php
/**
 * 卖家日志模型
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class seller_logModel extends Model{

    public function __construct(){
        parent::__construct('seller_log');
    }

    /**
     * 读取列表
     * @param array $condition
     *
     */
    public function getSellerLogList($condition, $page='', $order='', $field='*') {
        $result = $this->field($field)->where($condition)->page($page)->order($order)->select();
        return $result;
    }

    /**
     * 读取单条记录
     * @param array $condition
     *
     */
    public function getSellerLogInfo($condition) {
        $result = $this->where($condition)->find();
        return $result;
    }

    /*
     * 增加
     * @param array $param
     * @return bool
     */
    public function addSellerLog($param){
        return $this->insert($param);
    }

    /*
     * 删除
     * @param array $condition
     * @return bool
     */
    public function delSellerLog($condition){
        return $this->where($condition)->delete();
    }

}
