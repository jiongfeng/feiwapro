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
class specialControl extends READSHomeControl{

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
        $special_list = $model_special->getREADSList($conition, 10, 'special_id desc');
        Tpl::output('show_page', $model_special->showpage(2));
        Tpl::output('special_list', $special_list);
        Tpl::showpage('special_list');
    }

    /**
     * 专题详细页
     */
    public function special_detailFeiwa() {
        $special_file = getREADSSpecialHtml($_GET['special_id']);
        if($special_file) {
            Tpl::output('special_file', $special_file);
            Tpl::output('index_sign', 'special');
            Tpl::showpage('special_detail');
        } else {
            showMessage('专题不存在', '', '', 'error');
        }
    }
}
