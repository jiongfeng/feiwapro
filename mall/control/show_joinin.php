<?php
/**
 * 店铺开店
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class show_joininControl extends BaseHomeControl {
    public function __construct() {
        parent::__construct();
    }
    /**
     * 店铺开店页
     *
     */
    public function indexFeiwa() {
        Language::read("home_login_index");
        $code_info = C('store_joinin_pic');
        $info['pic'] = array();
        if(!empty($code_info)) {
            $info = unserialize($code_info);
        }
        Tpl::output('pic_list',$info['pic']);//首页图片
        Tpl::output('show_txt',$info['show_txt']);//贴心提示
        $model_help = Model('help');
        $condition['type_id'] = '1';//入驻指南
        $help_list = $model_help->getHelpList($condition,'',4);//显示4个
        Tpl::output('help_list',$help_list);
        Tpl::output('article_list','');//底部不显示文章分类
        Tpl::output('show_sign','joinin');
        Tpl::output('html_title',C('site_name').' - '.'商家入驻');
        Tpl::setLayout('store_joinin_layout');
        Tpl::showpage('store_joinin');
    }

}
