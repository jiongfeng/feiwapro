<?php
/**
 * 店铺门店库存模型
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class chain_stockModel extends Model {
    public function __construct(){
        parent::__construct('chain_stock');
    }

    /**
     * 门店库存列表
     * @param array $condition
     * @param string $field
     * @param int $page
     * @return array
     */
    public function getChainStockList($condition, $field = '*', $page = 0,$order= '', $group = '') {
        return $this->field($field)->where($condition)->order($order)->group($group)->page($page)->select();
    }

    /**
     * 门店库存
     * @param array $condition
     * @return array
     */
    public function getChainStockInfo($condition) {
        return $this->where($condition)->find();
    }

    /**
     * 添加门店库存
     * @param unknown $insert
     * @return boolean
     */
    public function addChainStock($insert) {
        $result = $this ->insert($insert, true);
        if ($result) {
            if (intval($insert['stock']) > 0) {
                Model('goods')->editGoodsById(array('is_chain' => '1'), $insert['goods_id']);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * 更新门店库存
     * @param array $update
     * @param array $condition
     * @return boolean
     */
    public function editChainStock($update, $condition) {
        return $this->where($condition)->update($update);
    }

    /**
     * 删除门店库存
     * @param array $condition
     * @return boolean
     */
    public function delChainStock($condition) {
        return $this->where($condition)->delete();
    }
}
