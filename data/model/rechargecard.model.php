<?php
/**
 * 平台充值卡
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */

defined('ByFeiWa') or exit('Access Invalid!');

class rechargecardModel extends Model
{
    public function __construct()
    {
        parent::__construct('rechargecard');
    }

    /**
     * 获取充值卡列表
     *
     * @param array $condition 条件数组
     * @param int $pageSize 分页长度
     *
     * @return array 充值卡列表
     */
    public function getRechargeCardList($condition, $pageSize = 20, $limit = null, $sort = 'id desc')
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

    /**
     * 通过卡号获取单条充值卡数据
     *
     * @param string $sn 卡号
     *
     * @return array|null 充值卡数据
     */
    public function getRechargeCardBySN($sn)
    {
        return $this->where(array(
            'sn' => (string) $sn,
        ))->find();
    }

    /**
     * 设置充值卡为已使用
     *
     * @param int $id 表字增ID
     * @param int $memberId 会员ID
     * @param string $memberName 会员名称
     *
     * @return boolean
     */
    public function setRechargeCardUsedById($id, $memberId, $memberName)
    {
        return $this->where(array(
            'id' => (string) $id,
        ))->update(array(
            'tsused' => time(),
            'state' => 1,
            'member_id' => $memberId,
            'member_name' => $memberName,
        ));
    }

    /**
     * 通过ID删除充值卡（自动添加未使用标记）
     *
     * @param int|array $id 表字增ID(s)
     *
     * @return boolean
     */
    public function delRechargeCardById($id)
    {
        return $this->where(array(
            'id' => array('in', (array) $id),
            'state' => 0,
        ))->delete();
    }

    /**
     * 通过给定的卡号数组过滤出来不能被新插入的卡号（卡号存在的）
     *
     * @param array $sns 卡号数组
     *
     * @return array
     */
    public function getOccupiedRechargeCardSNsBySNs(array $sns)
    {
        $array = $this->field('sn')->where(array(
            'sn' => array('in', $sns),
        ))->select();

        $data = array();

        foreach ((array) $array as $v) {
            $data[] = $v['sn'];
        }

        return $data;
    }

    public function getRechargeCardCount($condition) {
        return $this->where($condition)->count();
    }
}
