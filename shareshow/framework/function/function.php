<?php
/**
 * 分享秀公共方法
 *
 * 公共方法
 * * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa
 */
defined('ByFeiWa') or exit('Access Invalid!');

function getShareShowImageSize($image_url, $max_width = 238) {
    $local_file_path = str_replace(UPLOAD_SITE_URL, BASE_ROOT_PATH.DS.DIR_UPLOAD, $image_url);
    if(file_exists($local_file_path)) {
        list($width, $height) = getimagesize($local_file_path);
    } else {
        list($width, $height) = getimagesize($image_url);
    }
    if($width > $max_width) {
        $height = $height * $max_width/ $width;
        $width=$max_width;
    }
    return array(
        'width' => $width,
        'height' => $height
    );
}

function getRefUrl() {
    return urlencode('http://'.$_SERVER['HTTP_HOST'].request_uri());
}
