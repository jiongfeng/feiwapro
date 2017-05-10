<?php
/**
 * 供货商模型
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class store_supplierModel extends Model{

    public function __construct(){
        parent::__construct('store_supplier');
    }

    /**
     * 读取列表
     * @param array $condition
     *
     */
    public function getStoreSupplierList($condition, $page = '', $order = '', $field = '*') {
        return $this->field($field)->where($condition)->page($page)->order($order)->select();
    }

    /**
     * 读取单条记录
     * @param array $condition
     *
     */
    public function getStoreSupplierInfo($condition) {
        return $this->where($condition)->find();
    }

    /*
     * 增加
     * @param array $data
     * @return bool
     */
    public function addStoreSupplier($data){
        return $this->insert($data);
    }

    public function editStoreSupplier($data,$condition) {
        return $this->where($condition)->update($data);
    }

    /*
     * 删除
     * @param array $condition
     * @return bool
     */
    public function delStoreSupplier($condition){
        return $this->where($condition)->delete();
    }

}
