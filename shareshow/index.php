<?php
/**
 * 商城板块初始化文件
 *
 * 商城板块初始化文件，引用框架初始化文件
 *
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029 欢迎加入feiwa.org
 */
define('APP_ID','shareshow');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));

require __DIR__ . '/../feiwa.php';

define('APP_SITE_URL', SHARESHOW_SITE_URL);
define('SHARESHOW_IMG_URL',UPLOAD_SITE_URL.DS.ATTACH_SHARESHOW);
define('TPL_NAME',TPL_SHARESHOW_NAME);
define('SHARESHOW_RESOURCE_SITE_URL',SHARESHOW_SITE_URL.'/resource');
define('SHARESHOW_TEMPLATES_URL',SHARESHOW_SITE_URL.'/templates/'.TPL_NAME);
define('SHARESHOW_BASE_TPL_PATH',dirname(__FILE__).'/templates/'.TPL_NAME);

//define('SHARESHOW_SEO_KEYWORD',$config['seo_keywords']);
//define('SHARESHOW_SEO_DESCRIPTION',$config['seo_description']);

define('SHARESHOW_SEO_KEYWORD',C('seo_keywords'));
define('SHARESHOW_SEO_DESCRIPTION',C('seo_description'));

//分享秀框架扩展
require(BASE_PATH.'/framework/function/function.php');

if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
Base::run();
