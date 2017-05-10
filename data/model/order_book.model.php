<?php
/**
 * 预定订单时段模板
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class order_bookModel extends Model{

    public function __construct(){
        parent::__construct('order_book');
    }

    /**
     * 读取列表
     * @param array $condition
     *
     */
    public function getOrderBookList($condition = array(), $page = '', $order = 'book_id asc', $field = '*', $limit = '') {
        return $this->field($field)->where($condition)->page($page)->order($order)->limit($limit)->select();
    }

    /**
     * 读取单条记录
     * @param array $condition
     *
     */
    public function getOrderBookInfo($condition,$fields = '*') {
        return $this->where($condition)->field($fields)->find();
    }

    /*
     * 增加
     * @param array $data
     * @return bool
     */
    public function addOrderBook($data){
        return $this->insert($data);
    }

    /**
     * 编辑
     * @param unknown $data
     * @param unknown $condition
     */
    public function editOrderBook($data,$condition) {
        return $this->where($condition)->update($data);
    }

    public function getOrderBookCount($condition) {
        return $this->where($condition)->count();
    }

}
