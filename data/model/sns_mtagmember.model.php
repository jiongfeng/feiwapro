<?php
/**
 * 标签会员
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
class sns_mtagmemberModel extends Model {

    public function __construct(){
        parent::__construct('sns_mtagmember');
    }

    /**
     * 标签会员列表
     * @param array $condition
     * @param int $page
     * @param string $order
     */
    public function getSnsMTagMemberList($condition, $page, $order) {
        return $this->where($condition)->order($order)->page($page)->select();
    }
    
    /**
     * 更新标签会员
     * @param unknown $where
     * @param unknown $update
     */
    public function editSnsMTagMember($where, $update) {
        return $this->where($where)->update($update);
    }
    
    /**
     * 删除标签会员
     * @param unknown $where
     */
    public function delSnsMTagMember($where) {
        return $this->where($where)->delete();
    }
}
