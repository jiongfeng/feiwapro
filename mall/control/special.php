<?php
/**
 * 资讯专题
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class specialControl extends BaseHomeControl{

    public function __construct() {
        parent::__construct();
        Tpl::output('index_sign','special');
    }

    public function indexFeiwa() {
        $this->special_listFeiwa();
    }

    /**
     * 专题列表
     */
    public function special_listFeiwa() {
        $conition = array();
        $conition['special_state'] = 2;
        $model_special = Model('reads_special');
        $special_list = $model_special->getMallList($conition, 10, 'special_id desc');
        Tpl::output('show_page', $model_special->showpage(2));
        Tpl::output('special_list', $special_list);

        //分类导航
        $nav_link = array(
            0=>array(
                'title'=>Language::get('homepage'),
                'link'=>MALL_SITE_URL
            ),
            1=>array(
                'title'=>'专题'
            )
        );
        Tpl::output('nav_link_list', $nav_link);
		$seo_param = array();
        $seo_param['name'] = '专题页面';
        $seo_param['key'] = 'FeiWa专业缔造未来 实力成就梦想 选择多用户商城选择FeiWa';
        $seo_param['description'] = 'FeiWa专业缔造未来 实力成就梦想 选择多用户商城选择FeiWa';
        Model('seo')->type('product')->param($seo_param)->show();

        Tpl::showpage('special_list');
    }

    /**
     * 专题详细页
     */
    public function special_detailFeiwa() {
		$special_id = intval($_GET['special_id']);
        $model_special = Model('reads_special');
        $special_detail = $model_special->getonlyOne($_GET['special_id']);
        $special_file = getREADSSpecialHtml($special_id);
		$seo_param = array();
        $seo_param['name'] = $special_detail['special_title'];
        $seo_param['key'] = $special_detail['special_stitle'];
        $seo_param['description'] = $special_detail['special_stitle'];
		 Model('seo')->type('product')->param($seo_param)->show();
        if($special_file) {
            Tpl::output('special_file', $special_file);
            Tpl::output('index_sign', 'special');
            Tpl::showpage('special_detail');
        } else {
            showMessage('专题不存在', '', '', 'error');
        }

    }
}
