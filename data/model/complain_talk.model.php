<?php
/**
 * 投诉对话模型
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class complain_talkModel extends Model{

    /*
     * 构造条件
     */
    private function getCondition($condition){
        $condition_str = '' ;
        if(!empty($condition['complain_id'])) {
            $condition_str .= " and complain_id = '{$condition['complain_id']}'";
        }
        if(!empty($condition['talk_id'])) {
            $condition_str .= " and talk_id = '{$condition['talk_id']}'";
        }
        return $condition_str;
    }

    /*
     * 增加
     * @param array $param
     * @return bool
     */
    public function saveComplainTalk($param){

        return Db::insert('complain_talk',$param) ;

    }

    /*
     * 更新
     * @param array $update_array
     * @param array $where_array
     * @return bool
     */
    public function updateComplainTalk($update_array, $where_array){

        $where = $this->getCondition($where_array) ;
        return Db::update('complain_talk',$update_array,$where) ;

    }

    /*
     * 删除
     * @param array $param
     * @return bool
     */
    public function dropComplainTalk($param){

        $where = $this->getCondition($param) ;
        return Db::delete('complain_talk', $where) ;

    }

    /*
     *  获得列表
     *  @param array $condition
     *  @param obj $page    //分页对象
     *  @return array
     */
    public function getComplainTalk($condition='',$page='',$field='*'){

        $param = array() ;
        $param['table'] = 'complain_talk' ;
        $param['field'] = $field;
        $param['where'] = $this->getCondition($condition);
        $param['order'] = $condition['order'] ? $condition['order']: ' talk_id desc ';
        return Db::select($param,$page) ;

    }

}
