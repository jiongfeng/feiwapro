<?php
/**
 * 默认展示页面
 *
 *
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */


defined('ByFeiWa') or exit('Access Invalid!');
class linkControl extends BaseHomeControl{
    public function indexFeiwa(){

         //友情链接
                $model_link = Model('link');
                $link_list = $model_link->getLinkList($condition,$page);
                /**
                 * 整理图片链接
                 */
                if (is_array($link_list)){
                        foreach ($link_list as $k => $v){
                                if (!empty($v['link_pic'])){
                                        $link_list[$k]['link_pic'] = UPLOAD_SITE_URL.'/'.ATTACH_PATH.'/common/'.DS.$v['link_pic'];
                                }
                        }
                }
                Tpl::output('$link_list',$link_list);
        Model('seo')->type('index')->show();
        Tpl::showpage('link');
    }
   
}
