<?php
/**
 * 品牌管理
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class store_brandControl extends BaseSellerControl {
    public function __construct() {
        parent::__construct();
        Language::read('member_store_brand');
    }

    public function indexFeiwa(){
        $this->brand_listFeiwa();
    }

    /**
     * 品牌列表
     */
    public function brand_listFeiwa() {
        $model_brand = Model('brand');
        $condition = array();
        $condition['store_id'] = $_SESSION['store_id'];
        if (!empty($_GET['brand_name'])) {
            $condition['brand_name'] = array('like', '%' .$_GET['brand_name'] . '%');
        }

        $brand_list = $model_brand->getBrandList($condition, '*', 10);
        Tpl::output('brand_list',$brand_list);
        Tpl::output('show_page',$model_brand->showpage());

        self::profile_menu('brand_list','brand_list');
        Tpl::showpage('store_brand.list');
    }

    /**
     * 品牌添加页面
     */
    public function brand_addFeiwa() {
        $lang   = Language::getLangContent();
        $model_brand = Model('brand');
        if($_GET['brand_id'] != '') {
            $brand_array = $model_brand->getBrandInfo(array('brand_id' => $_GET['brand_id'], 'store_id' => $_SESSION['store_id']));
            if (empty($brand_array)){
                showMessage($lang['wrong_argument'],'','html','error');
            }
            Tpl::output('brand_array',$brand_array);
        }

        // 一级商品分类
        $gc_list = Model('goods_class')->getGoodsClassListByParentId(0);
        Tpl::output('gc_list', $gc_list);

        Tpl::showpage('store_brand.add','null_layout');
    }

    /**
     * 品牌保存
     */
    public function brand_saveFeiwa() {
        $lang   = Language::getLangContent();
        $model_brand = Model('brand');
        if (chksubmit()) {
            /**
             * 验证
             */
            $obj_validate = new Validate();
            $obj_validate->validateparam = array(
                array("input"=>$_POST["brand_name"], "require"=>"true", "message"=>$lang['store_goods_brand_name_null']),
                array("input"=>$_POST["brand_initial"], "require"=>"true", "message"=>'请填写首字母')
            );
            $error = $obj_validate->validate();
            if ($error != ''){
                showValidateError($error);
            }

            /**
             * 上传图片
             */
            if (!empty($_FILES['brand_pic']['name'])){
                $upload = new UploadFile();
                $upload->set('default_dir', ATTACH_BRAND);
                $upload->set('thumb_width', 150);
                $upload->set('thumb_height', 50);
                $upload->set('thumb_ext', '_small');
                $upload->set('ifremove', true);
                $result = $upload->upfile('brand_pic');
                if ($result){
                    $_POST['brand_pic'] = $upload->thumb_image;
                }else {
                    showDialog($upload->error);
                }
            }
            $insert_array = array();
            $insert_array['brand_name']      = trim($_POST['brand_name']);
            $insert_array['brand_initial']   = strtoupper($_POST['brand_initial']);
            $insert_array['class_id']        = $_POST['class_id'];
            $insert_array['brand_class']     = $_POST['brand_class'];
            $insert_array['brand_pic']       = $_POST['brand_pic'];
            $insert_array['brand_apply']     = 0;
            $insert_array['store_id']        = $_SESSION['store_id'];

            $result = $model_brand->addBrand($insert_array);
            if ($result){
                showDialog($lang['store_goods_brand_apply_success'],'index.php?app=store_brand&feiwa=brand_list','succ',empty($_GET['inajax']) ?'':'CUR_DIALOG.close();');
            }else {
                showDialog($lang['feiwa_common_save_fail']);
            }
        }
    }

    /**
     * 品牌修改
     */
    public function brand_editFeiwa() {
        $lang   = Language::getLangContent();
        $model_brand = Model('brand');
        if ($_POST['form_submit'] == 'ok' and intval($_POST['brand_id']) != 0) {
            /**
             * 验证
             */
            $obj_validate = new Validate();
            $obj_validate->validateparam = array(
                array("input"=>$_POST["brand_name"], "require"=>"true", "message"=>$lang['store_goods_brand_name_null']),
                array("input"=>$_POST["brand_initial"], "require"=>"true", "message"=>'请填写首字母')
            );
            $error = $obj_validate->validate();
            if ($error != ''){
                showValidateError($error);
            }else {
                /**
                 * 上传图片
                 */
                if (!empty($_FILES['brand_pic']['name'])){
                    $upload = new UploadFile();
                    $upload->set('default_dir',ATTACH_BRAND);
                    $upload->set('thumb_width', 150);
                    $upload->set('thumb_height',50);
                    $upload->set('thumb_ext',   '_small');
                    $upload->set('ifremove',    true);
                    $result = $upload->upfile('brand_pic');

                    if ($result){
                        $_POST['brand_pic'] = $upload->thumb_image;
                    }else {
                        showDialog($upload->error);
                    }
                }
                $where = array();
                $where['brand_id']       = intval($_POST['brand_id']);
                $update_array = array();
                $update_array['brand_initial']  = strtoupper($_POST['brand_initial']);
                $update_array['brand_name']     = trim($_POST['brand_name']);
                $update_array['class_id']       = $_POST['class_id'];
                $update_array['brand_class']    = $_POST['brand_class'];
                if (!empty($_POST['brand_pic'])){
                    $update_array['brand_pic'] = $_POST['brand_pic'];
                }

                //查出原图片路径，后面会删除图片
                $brand_info = $model_brand->getBrandInfo($where);
                $result = $model_brand->editBrand($where, $update_array);
                if ($result){
                    //删除老图片
                    if (!empty($brand_info['brand_pic']) && $_POST['brand_pic']){
                        @unlink(BASE_UPLOAD_PATH.DS.ATTACH_BRAND.DS.$brand_info['brand_pic']);
                    }
                    showDialog($lang['feiwa_common_save_succ'],'index.php?app=store_brand&feiwa=brand_list','succ',empty($_GET['inajax']) ?'':'CUR_DIALOG.close();');
                }else {
                    showDialog($lang['feiwa_common_save_fail']);
                }
            }
        } else {
            showDialog($lang['feiwa_common_save_fail']);
        }
    }

    /**
     * 品牌删除
     */
    public function drop_brandFeiwa() {
        $model_brand    = Model('brand');
        $brand_id       = intval($_GET['brand_id']);
        if ($brand_id > 0){
            $model_brand->delBrand(array('brand_id'=>$brand_id, 'brand_apply'=>0, 'store_id' => $_SESSION['store_id']));
            showDialog(Language::get('feiwa_common_del_succ'),'index.php?app=store_brand&feiwa=brand_list','succ');
        }else {
            showDialog(Language::get('feiwa_common_del_fail'));
        }
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string    $menu_type  导航类型
     * @param string    $menu_key   当前导航的menu_key
     * @param array     $array      附加菜单
     * @return
     */
    private function profile_menu($menu_type,$menu_key='',$array=array()) {
        Language::read('member_layout');
        $lang   = Language::getLangContent();
        $menu_array     = array();
        switch ($menu_type) {
            case 'brand_list':
                $menu_array = array(
                    1=>array('menu_key'=>'brand_list', 'menu_name'=>$lang['feiwa_member_path_brand_list'], 'menu_url'=>'index.php?app=store_brand&feiwa=brand_list')
                );
                break;
        }
        if(!empty($array)) {
            $menu_array[] = $array;
        }
        Tpl::output('member_menu',$menu_array);
        Tpl::output('menu_key',$menu_key);
    }
}