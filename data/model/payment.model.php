<?php
/**
 * 支付方式
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class paymentModel extends Model {
    /**
     * 开启状态标识
     * @var unknown
     */
    const STATE_OPEN = 1;

    public function __construct() {
        parent::__construct('payment');
    }

    /**
     * 读取单行信息
     *
     * @param
     * @return array 数组格式的返回结果
     */
    public function getPaymentInfo($condition = array()) {
        return $this->where($condition)->find();
    }

    /**
     * 读开启中的取单行信息
     *
     * @param
     * @return array 数组格式的返回结果
     */
    public function getPaymentOpenInfo($condition = array()) {
        $condition['payment_state'] = self::STATE_OPEN;
        return $this->where($condition)->find();
    }

    /**
     * 读取多行
     *
     * @param
     * @return array 数组格式的返回结果
     */
    public function getPaymentList($condition = array()){
        return $this->where($condition)->select();
    }

    /**
     * 读取开启中的支付方式
     *
     * @param
     * @return array 数组格式的返回结果
     */
    public function getPaymentOpenList($condition = array()){
        $condition['payment_state'] = self::STATE_OPEN;
        return $this->where($condition)->key('payment_code')->select();
    }

    /**
     * 更新信息
     *
     * @param array $param 更新数据
     * @return bool 布尔类型的返回结果
     */
    public function editPayment($data, $condition){
        return $this->where($condition)->update($data);
    }

    /**
     * 读取支付方式信息by Condition
     *
     * @param
     * @return array 数组格式的返回结果
     */
    public function getRowByCondition($conditionfield,$conditionvalue){
        $param  = array();
        $param['table'] = 'payment';
        $param['field'] = $conditionfield;
        $param['value'] = $conditionvalue;
        $result = Db::getRow($param);
        return $result;
    }
}
