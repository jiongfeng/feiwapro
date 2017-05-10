<?php
/**
 * 前台品牌分类
 *
 *
 *
 *
 * @Copyright (c) 2015-2018 Shandong Polang Network Technology Co., Ltd. (http://polang.net.cn)
 * @license    http://www.feiwa.org
 * @link       http://www.feiwa.org
 * @since      File available since Release v1.1
 */



defined('ByFeiWa') or exit('Access Invalid!');
class documentControl extends mobileHomeControl {
    public function __construct() {
        parent::__construct();
    }

    public function agreementFeiwa() {
        $doc = Model('document')->getOneByCode('agreement');
        output_data($doc);
    }
}
