<?php
/**
 * 店铺门店模型管理
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class chainModel extends Model {
    public function __construct(){
        parent::__construct('chain');
    }

    /**
     * 门店列表
     * @param array $condition
     * @param string $field
     * @param int $page
     * @return array
     */
    public function getChainList($condition, $field = '*', $page = 0) {
        return $this->field($field)->where($condition)->page($page)->select();
    }

    /**
     * 门店详细信息
     * @param array $condition
     * @return array
     */
    public function getChainInfo($condition) {
        return $this->where($condition)->find();
    }

    /**
     * 添加门店
     * @param unknown $insert
     * @return boolean
     */
    public function addChain($insert) {
        return $this->insert($insert);
    }

    /**
     * 更新门店
     * @param array $update
     * @param array $condition
     * @return boolean
     */
    public function editChain($update, $condition) {
        return $this->where($condition)->update($update);
    }

    /**
     * 删除门店
     * @param array $condition
     * @return boolean
     */
    public function delChain($condition) {
        $chain_list = $this->getChainInfo($condition);
        if (empty($chain_list)) {
            return true;
        }
        foreach ($chain_list as $val) {
            @unlink(BASE_UPLOAD_PATH.DS.ATTACH_CHAIN.DS.$val['store_id'].DS.$val['chain_img']);
        }
        return $this->where($condition)->delete();
    }
}
