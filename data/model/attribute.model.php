<?php
/**
 * 属性模型
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');

class attributeModel extends Model {
    const SHOW0 = 0;    // 不显示
    const SHOW1 = 1;    // 显示
    public function __construct() {
        parent::__construct();
    }

    /**
     * 属性列表
     *
     * @param array $condition
     * @param string $field
     * @return array
     */
    public function getAttributeList($condition, $field = '*') {
        return $this->table('attribute')->where($condition)->field($field)->order('attr_sort asc')->select();
    }

    /**
     * 属性列表
     *
     * @param array $condition
     * @param string $field
     * @return array
     */
    public function getAttributeShowList($condition, $field = '*') {
        $condition['attr_show'] = self::SHOW1;
        return $this->getAttributeList($condition, $field);
    }

    /**
     * 属性值列表
     *
     * @param array $condition
     * @param string $field
     * @return array
     */
    public function getAttributeValueList($condition, $field = '*') {
        return $this->table('attribute_value')->where($condition)->field($field)->order('attr_value_sort asc,attr_value_id asc')->select();
    }

    /**
     * 保存属性值
     * @param array $insert
     * @return boolean
     */
    public function addAttributeValueAll($insert) {
        return $this->table('attribute_value')->insertAll($insert);
    }

    /**
     * 保存属性值
     * @param array $insert
     * @return boolean
     */
    public function addAttributeValue($insert) {
        return $this->table('attribute_value')->insert($insert);
    }

    /**
     * 编辑属性值
     * @param array $update
     * @param array $condition
     * @return boolean
     */
    public function editAttributeValue($update, $condition) {
        return $this->table('attribute_value')->where($condition)->update($update);
    }
}
