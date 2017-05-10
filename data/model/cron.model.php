<?php
/**
 * 任务队列
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
defined('ByFeiWa') or exit('Access Invalid!');
class cronModel extends Model {
    public function __construct() {
       parent::__construct('cron');
    }

    /**
     * 取单条任务信息
     * @param array $condition
     */
    public function getCronInfo($condition = array()) {
        return $this->where($condition)->find();
    }
    /**
     * 任务队列列表
     * @param array $condition
     * @param number $limit
     * @return array
     */
    public function getCronList($condition, $limit = 100) {
        return $this->where($condition)->limit($limit)->select();
    }

    /**
     * 保存任务队列
     *
     * @param unknown $insert
     * @return array
     */
    public function addCronAll($insert) {
        return $this->insertAll($insert);
    }

    /**
     * 删除任务队列
     *
     * @param array $condition
     * @return array
     */
    public function delCron($condition) {
        return $this->where($condition)->delete();
    }

    /**
     * 添加到任务队列
     *
     * @param array $data
     * @param boolean $ifdel 是否删除以原记录
     */
    public function addCron($data = array(), $ifdel = false) {
        if (isset($data[0])) { // 批量插入
            $where = array();
            foreach ($data as $k => $v) {
                if (isset($v['content'])) {
                    $data[$k]['content'] = serialize($v['content']);
                }
                // 删除原纪录条件
                if ($ifdel) {
                    $where[] = '(type = ' . $data['type'] . ' and exeid = ' . $data['exeid'] . ')';
                }
            }
            // 删除原纪录
            if ($ifdel) {
                $this->delCron(implode(',', $where));
            }
            $this->addCronAll($data);
        } else { // 单条插入
            if (isset($data['content'])) {
                $data['content'] = serialize($data['content']);
            }
            // 删除原纪录
            if ($ifdel) {
                $this->delCron(array('type' => $data['type'], 'exeid' => $data['exeid']));
            }
            $this->insert($data);
        }
    }
}
