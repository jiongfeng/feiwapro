<?php
/**
 * 商家注销
 *
  * @Copyright (c) 2015-2018 Shandong Polang Network Technology Co., Ltd. (http://polang.net.cn)
 * @license    http://www.feiwa.org
 */



defined('ByFeiWa') or exit('Access Invalid!');

class seller_albumControl extends mobileSellerControl {

    public function __construct(){
        parent::__construct();
    }

    public function image_uploadFeiWa() {
        $logic_goods = Logic('goods');

        $result =  $logic_goods->uploadGoodsImage(
            $_POST['name'],
            $this->seller_info['store_id'],
            $this->store_grade['sg_album_limit']
        );

        if(!$result['state']) {
            output_error($result['msg']);
        }
		output_data($result['data']);
        //output_data(array('image_name' => $result['data']['name']));
    }

}
