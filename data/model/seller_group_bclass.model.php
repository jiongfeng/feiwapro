<?php
/**
 * 卖家账号组绑定分类模型
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class seller_group_bclassModel extends Model{

    public function __construct(){
        parent::__construct('seller_group_bclass');
    }

    /**
     * 读取列表
     * @param array $condition
     *
     */
    public function getSellerGroupBclasList($condition, $page='', $order='', $field='*', $key = '', $group = '') {
        $result = $this->field($field)->where($condition)->page($page)->group($group)->order($order)->limit(false)->key($key)->select();
        return $result;
    }

    /**
     * 读取单条记录
     * @param array $condition
     *
     */
    public function getSellerGroupBclassInfo($condition) {
        $result = $this->where($condition)->find();
        return $result;
    }

    /*
     * 增加
     * @param array $param
     * @return bool
     */
    public function addSellerGroupBclass($param){
        return $this->insertAll($param);
    }

    /*
     * 更新
     * @param array $update
     * @param array $condition
     * @return bool
     */
    public function editSellerGroupBclass($update, $condition){
        return $this->where($condition)->update($update);
    }

    /*
     * 删除
     * @param array $condition
     * @return bool
     */
    public function delSellerGroupBclass($condition){
        return $this->where($condition)->delete();
    }

}
