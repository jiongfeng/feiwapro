<?php
/**
 * 积分
 *
 * @Copyright (c) 2015-2018 Shandong Polang Network Technology Co., Ltd. (http://polang.net.cn)
 * @license    http://www.feiwa.org
 * @link       http://www.feiwa.org
 * @since      File available since Release v1.1
 */


defined('ByFeiWa') or exit('Access Invalid!');

class member_pointsControl extends mobileMemberControl {
    public function __construct(){
        parent::__construct();
    }
    /**
     * 积分日志列表
     */
    public function pointslogFeiwa(){
        $where = array();
        $where['pl_memberid'] = $this->member_info['member_id'];
        //查询积分日志列表
        $points_model = Model('points');
        $log_list = $points_model->getPointsLogList($where, '*', 0, $this->page);
        $page_count = $points_model->gettotalpage();
        output_data(array('log_list' => $log_list), mobile_page($page_count));
    }
}
