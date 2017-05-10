<?php
/**
 * 自定义属性模型
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');

class type_customModel extends Model {
    const STATE1 = 1;       // 开启
    const STATE0 = 0;       // 关闭

    public function __construct() {
        parent::__construct('type_custom');
    }

    /**
     * 自定义属性列表
     *
     * @param array $condition
     * @param string $field
     * @param int $page
     * @param string $order
     * @return array
     */
    public function getTypeCustomList($condition, $field = '*', $order = 'custom_id asc') {
        return $this->field($field)->where($condition)->order($order)->select();
    }

    /**
     * 保存自定义属性
     *
     * @param array $insert
     * @return boolean
     */
    public function addTypeCustomAll($insert) {
        return $this->insertAll($insert);
    }

    /**
     * 编辑自定义属性
     * @param array $update
     * @param array $condition
     * @return array
     */
    public function editTypeCustom($update, $condition) {
        return $this->where($condition)->update($update);
    }

    /**
     * 删除自定义属性
     * @param array $condition
     * @return array
     */
    public function delTypeCustom($condition) {
        return $this->where($condition)->delete();
    }

}
