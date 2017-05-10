<?php
/**
 * 店铺地址百度地图
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');

class store_mapModel extends Model{

    public function __construct() {
        parent::__construct();
    }

    /**
     * 增加店铺地址
     *
     * @param
     * @return int
     */
    public function addStoreMap($map_array) {
        $map_id = $this->table('store_map')->insert($map_array);
        return $map_id;
    }

    /**
     * 删除店铺地址记录
     *
     * @param
     * @return bool
     */
    public function delStoreMap($condition) {
        if (empty($condition)) {
            return false;
        } else {
            $result = $this->table('store_map')->where($condition)->delete();
            return $result;
        }
    }

    /**
     * 修改店铺地址记录
     *
     * @param
     * @return bool
     */
    public function editStoreMap($condition, $data) {
        if (empty($condition)) {
            return false;
        }
        if (is_array($data)) {
            $result = $this->table('store_map')->where($condition)->update($data);
            return $result;
        } else {
            return false;
        }
    }

    /**
     * 店铺地址记录
     *
     * @param
     * @return array
     */
    public function getStoreMapList($condition = array(), $page = '', $limit = '', $order = 'map_id desc') {
        $result = $this->table('store_map')->where($condition)->page($page)->limit($limit)->order($order)->select();
        return $result;
    }
}
