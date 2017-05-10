<?php
/**
 *
 * 运营
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */



defined('ByFeiWa') or exit('Access Invalid!');
class operatingControl extends SystemControl{
    public function __construct(){
        parent::__construct();
        //Language::read('setting');
    }

    public function indexFeiwa() {
        $this->settingFeiwa();
    }

    /**
     * 基本设置
     */
    public function settingFeiwa(){
        $model_setting = Model('setting');
        if (chksubmit()){
            $obj_validate = new Validate();
            $obj_validate->validateparam = array(

            );
            $error = $obj_validate->validate();
            if ($error != ''){
                showDialog($error);
            }else {
                $update_array = array();
                $update_array['contract_allow'] = intval($_POST['contract_allow']);
                $update_array['delivery_isuse'] = intval($_POST['delivery_isuse']);
                $result = $model_setting->updateSetting($update_array);
                if ($result === true){
                    if ($update_array['delivery_isuse'] == 0) {
                        // 删除相关联的收货地址
                        Model('address')->delAddress(array('dlyp_id' => array('neq', 0)));
                    }
                    $this->log('编辑运营设置',1);
                    showDialog(L('feiwa_common_save_succ'));
                }else {
                    showDialog(L('feiwa_common_save_fail'));
                }
            }
        }
        $list_setting = $model_setting->getListSetting();
        Tpl::output('list_setting',$list_setting);
		Tpl::setDirquna('mall');/*www.feiwa.org*/
        Tpl::showpage('operating.setting');
    }
}
