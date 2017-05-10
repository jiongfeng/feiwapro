<?php
/**
 * 资讯文章心情
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class attitudeControl extends READSHomeControl{

    public function __construct() {
        parent::__construct();
    }

    /**
     * 文章心情
     */
    public function article_attitudeFeiwa() {
        $article_id = intval($_GET['article_id']);
        $article_attitude = intval($_GET['article_attitude']);
        if(empty($article_id) || empty($article_attitude)) {
            $data['result'] = 'false';
            $data['message'] = Language::get('wrong_argument');
            self::echo_json($data);
        }

        if(!empty($_SESSION['member_id'])) {
            $model_attitude = Model('reads_article_attitude');
            $param = array();
            $param['attitude_article_id'] = $article_id;
            $param['attitude_member_id'] = $_SESSION['member_id'];
            $exist = $model_attitude->isExist($param);
            if(!$exist) {
                $param['attitude_time'] = time();
                $result = $model_attitude->save($param);
                if($result) {

                    //评论计数加1
                    $model_article = Model('reads_article');
                    $update = array();
                    $update['article_attitude_'.$article_attitude] = array('exp','article_attitude_'.$article_attitude.'+1');
                    $condition = array();
                    $condition['article_id'] = $article_id;
                    $model_article->modify($update, $condition);

                    //返回信息
                    $data['result'] = 'true';

                } else {
                    $data['result'] = 'false';
                    $data['message'] = Language::get('feiwa_common_save_fail');
                }
            } else {
                $data['result'] = 'false';
                $data['message'] = Language::get('attitude_published');
            }
        } else {
            $data['result'] = 'false';
            $data['message'] = Language::get('no_login');
        }
        self::echo_json($data);

    }
}
