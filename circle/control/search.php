<?php
/**
 * 圈子首页
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class searchControl extends BaseCircleControl{
    public function __construct(){
        parent::__construct();
        Language::read('circle');
        $this->themeTop();
    }
    /**
     * 话题搜索
     */
    public function themeFeiwa(){
        $model = Model();
        $where = array();
        if($_GET['keyword'] != ''){
            $where['theme_name'] = array('like', '%'.$_GET['keyword'].'%');
        }
        $count = $model->table('circle_theme')->where($where)->count();
        $theme_list = $model->table('circle_theme')->where($where)->page(10,$count)->order('theme_addtime desc')->select();
        Tpl::output('count', $count);
        Tpl::output('show_page', $model->showpage('2'));
        Tpl::output('theme_list', $theme_list);
        Tpl::output('search_sign', 'theme');

        $this->circleSEO(L('search_theme'));
        Tpl::showpage('search.theme');
    }
    /**
     * 圈子搜索
     */
    public function groupFeiwa(){
        $model = Model();
        $where = array();
        $where['circle_status'] = 1;
        if($_GET['keyword'] != ''){
            $where['circle_name|circle_tag'] = array('like', '%'.$_GET['keyword'].'%');
        }
        if(intval($_GET['class_id']) > 0){
            $where['class_id'] = intval($_GET['class_id']);
        }
        $count = $model->table('circle')->where($where)->count();
        $circle_list = $model->table('circle')->where($where)->page(10,$count)->select();
        Tpl::output('count', $count);
        Tpl::output('circle_list', $circle_list);
        Tpl::output('show_page', $model->showpage('2'));
        Tpl::output('search_sign', 'group');

        $this->circleSEO(L('search_circle'));
        Tpl::showpage('search.group');
    }
}
