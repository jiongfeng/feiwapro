<?php
/**
 * 水印管理
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class store_watermarkModel extends Model {
    /**
     * 根据店铺id获取水印
     *
     * @param array $param 参数内容
     * @return array $param 水印数组
     */
    public function getOneStoreWMByStoreId($store_id){
        $wm_arr = array();
        $store_id = intval($store_id);
        if ($store_id > 0){
            $param = array(
                'table'=>'store_watermark',
                'field'=>'store_id',
                'value'=>$store_id
            );
            $wm_arr = Db::getRow($param);
        }
        return $wm_arr;
    }
    /**
     * 新增水印
     *
     * @param array $param 参数内容
     * @return bool 布尔类型的返回结果
     */
    public function addStoreWM($param){
        if (empty($param)){
            return false;
        }
        if (is_array($param)){
            $tmp = array();
            foreach ($param as $k => $v){
                $tmp[$k] = $v;
            }
            $result = Db::insert('store_watermark',$tmp);
            return $result;
        }else {
            return false;
        }
    }

    /**
     * 更新水印
     *
     * @param array $param 更新数据
     * @return bool 布尔类型的返回结果
     */
    public function updateStoreWM($param){
        if (empty($param)){
            return false;
        }
        if (is_array($param)){
            $tmp = array();
            foreach ($param as $k => $v){
                $tmp[$k] = $v;
            }
            $where = " wm_id = '". $param['wm_id'] ."'";
            $result = Db::update('store_watermark',$tmp,$where);
            return $result;
        }else {
            return false;
        }
    }

    /**
     * 删除水印
     *
     * @param int $id 记录ID
     * @return bool 布尔类型的返回结果
     */
    public function delStoreWM($id){
        if (intval($id) > 0){
            $where = " wm_id = '". intval($id) ."'";
            $result = Db::delete('store_watermark',$where);
            return $result;
        }else {
            return false;
        }
    }
}
