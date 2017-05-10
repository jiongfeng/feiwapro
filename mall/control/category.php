<?php
/**
 * 前台分类
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class categoryControl extends BaseHomeControl {
    /**
     * 分类列表
     */
    public function indexFeiwa(){
        Language::read('home_category_index');
        $lang   = Language::getLangContent();
        //导航
        $nav_link = array(
            '0'=>array('title'=>$lang['homepage'],'link'=>MALL_SITE_URL),
            '1'=>array('title'=>$lang['category_index_goods_class'])
        );
        Tpl::output('nav_link_list',$nav_link);

        Tpl::output('html_title',C('site_name').' - '.Language::get('category_index_goods_class'));
        Tpl::showpage('category');
    }
}
