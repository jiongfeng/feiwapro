<?php
/**
 * 图片空间操作
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class sns_circleControl extends BaseSNSControl {
    public function __construct() {
        parent::__construct();
        /**
         * 读取语言包
         */
        Language::read('sns_circle,member_sns,sns_home');
        Tpl::output('menu_sign', 'circle');

        $this->get_visitor();   // 获取访客
        define('CIRCLE_TEMPLATES_URL', CIRCLE_SITE_URL.'/templates/'.TPL_NAME);

        $where = array();
        $where['name']  = !empty($this->master_info['member_truename'])?$this->master_info['member_truename']:$this->master_info['member_name'];
        Model('seo')->type('sns')->param($where)->show();

        $this->sns_messageboard();
    }
    /**
     * index 默认为话题
     */
    public function indexFeiwa(){
        $this->themeFeiwa();
    }
    /**
     * 话题
     */
    public function themeFeiwa(){
        $model = Model();
        $theme_list = $model->table('circle_theme')->where(array('member_id'=>$this->master_id))->page(10)->order('theme_id desc')->select();
        Tpl::output('showpage', $model->showpage('2'));
        Tpl::output('theme_list', $theme_list);
        if(!empty($theme_list)){
            $theme_list = array_under_reset($theme_list, 'theme_id');
            $themeid_array = array(); $circleid_array = array();
            foreach ($theme_list as $val){
                $themeid_array[]    = $val['theme_id'];
                $circleid_array[]   = $val['circle_id'];
            }
            $themeid_array = array_unique($themeid_array);
            $circleid_array = array_unique($circleid_array);
            // 附件
            $affix_list = $model->table('circle_affix')->where(array('affix_type'=>1, 'member_id'=>$this->master_id, 'theme_id'=>array('in', $themeid_array)))->select();
            $affix_list = array_under_reset($affix_list, 'theme_id', 2);
            Tpl::output('affix_list', $affix_list);
        }

        $this->profile_menu('theme');
        Tpl::showpage('sns_circletheme');
    }
    /**
     * 圈子
     */
    public function circleFeiwa(){
        $model = Model();
        $cm_list = $model->table('circle_member')->where(array('member_id'=>$this->master_id))->order('cm_jointime desc')->select();
        if(!empty($cm_list)){
            $cm_list = array_under_reset($cm_list, 'circle_id'); $circleid_array = array_keys($cm_list);
            $circle_list = $model->table('circle')->where(array('circle_id'=>array('in', $circleid_array)))->select();
            Tpl::output('circle_list', $circle_list);
        }
        $this->profile_menu('circle');
        Tpl::showpage('sns_circle');
    }
    /**
     * 用户中心右边，小导航
     *
     * @param string    $menu_type  导航类型
     * @param string    $menu_key   当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_key=''){
        $menu_array = array();

        $theme_menuname = $this->relation==3?L('sns_my_theme'):L('sns_TA_theme');
        $circle_menuname = $this->relation==3?L('sns_my_group'):L('sns_TA_group');
        $menu_array = array(
            1=>array('menu_key'=>'theme','menu_name'=>$theme_menuname,'menu_url'=>'index.php?app=sns_circle&feiwa=theme&mid='.$this->master_id),
            2=>array('menu_key'=>'circle','menu_name'=>$circle_menuname,'menu_url'=>'index.php?app=sns_circle&feiwa=circle&mid='.$this->master_id),
        );

        Tpl::output('member_menu',$menu_array);
        Tpl::output('menu_key',$menu_key);
    }
}
