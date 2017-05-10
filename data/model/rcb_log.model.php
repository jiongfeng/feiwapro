<?php
/**
 * 平台充值卡使用日志
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */

defined('ByFeiWa') or exit('Access Invalid!');

class rcb_logModel extends Model
{
    public function __construct()
    {
        parent::__construct('rcb_log');
    }

    /**
     * 获取充值卡使用日志列表
     *
     * @param array $condition 条件数组
     * @param int $pageSize 分页长度
     *
     * @return array 充值卡使用日志列表
     */
    public function getRechargeCardBalanceLogCount($condition)
    {
        return $this->where($condition)->count();
    }

    /**
     * 获取充值卡使用日志列表
     *
     * @param array $condition 条件数组
     * @param int $pageSize 分页长度
     *
     * @return array 充值卡使用日志列表
     */
    public function getRechargeCardBalanceLogList($condition, $pageSize = 20, $limit = null, $sort = 'id desc')
    {
        if ($condition) {
            $this->where($condition);
        }

        if ($sort) {
            $this->order($sort);
        }

        if ($limit) {
            $this->limit($limit);
        } else {
            $this->page($pageSize);
        }

        return $this->select();
    }
}
