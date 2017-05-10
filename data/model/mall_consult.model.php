<?php
/**
 * 平台客服咨询管理
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class mall_consultModel extends Model{
    public function __construct() {
        parent::__construct('mall_consult');
    }

    /**
     * 咨询列表
     *
     * @param array $condition
     * @param string $field
     * @param string $order
     * @return array
     */
    public function getMallConsultList($condition, $field = '*', $page = 0, $order = 'mc_id desc') {
        return $this->where($condition)->field($field)->order($order)->page($page)->select();
    }

    /**
     * 咨询数量
     *
     * @param array $condition
     * @param string $field
     * @param string $order
     * @return array
     */
    public function getMallConsultCount($condition) {
        return $this->where($condition)->count();
    }

    /**
     * 单条咨询
     *
     * @param unknown $condition
     * @param string $field
     */
    public function getMallConsultInfo($condition, $field = '*') {
        return $this->where($condition)->field($field)->find();
    }

    /**
     * 咨询详细信息
     *
     * @param unknown $mc_id
     * @return boolean|multitype:
     */
    public function getMallConsultDetail($mc_id) {
        $consult_info = $this->getMallConsultInfo(array('mc_id' => $mc_id));
        if (empty($consult_info)) {
            return false;
        }

        $type_info = Model('mall_consult_type')->getMallConsultTypeInfo(array('mct_id' => $consult_info['mct_id']), 'mct_name');
        return array_merge($consult_info, $type_info);
    }

    /**
     * 添加咨询
     * @param array $insert
     * @return int
     */
    public function addMallConsult($insert) {
        $insert['mc_addtime'] = TIMESTAMP;
        return $this->insert($insert);
    }

    /**
     * 编辑咨询
     * @param array $condition
     * @param array $update
     * @return boolean
     */
    public function editMallConsult($condition, $update) {
        return $this->where($condition)->update($update);
    }

    /**
     * 删除咨询
     *
     * @param array $condition
     * @return boolean
     */
    public function delMallConsult($condition) {
        return $this->where($condition)->delete();
    }
}
