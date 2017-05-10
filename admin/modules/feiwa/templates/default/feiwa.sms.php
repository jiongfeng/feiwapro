<?php defined('ByFeiWa') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3><?php echo $lang['sms_set'];?></h3>
        <h5><?php echo $lang['sms_set_subhead'];?></h5>
      </div>
      <?php echo $output['top_link'];?> </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="<?php echo $lang['feiwa_prompts_title'];?>"><?php echo $lang['feiwa_prompts'];?></h4>
      <span id="explanationZoom" title="<?php echo $lang['feiwa_prompts_span'];?>"></span> </div>
    <ul>
      <li>在这里可以设置FeiWa提供的短信服务商完成设置。<a href="http://www.feiwa.org/thread-6-1-1.html" target="_blank">购买破浪短信</a> <a href="http://www.feiwa.org/thread-6-1-1.html" target="_blank">具体设置教程</a>  <a href="http://www.smsbao.com/reg?r=10603" target="_blank">注册短信宝</a>  <a href="https://www.yunpian.com/component/reg?inviteCode=bwqrby" target="_blank">注册云片</a></li>
    </ul>
  </div>
  <form method="post" enctype="multipart/form-data" name="form1">
    <input type="hidden" name="form_submit" value="ok" />
    <div class="ncap-form-default">
     <dl class="row">
      <dt class="tit"><span><?php echo $lang['feiwa_sms_type'];?></span></dt>
        <dd class="opt">
          <ul class="ncap-account-container-list">
            <?php if($output['list_setting']['feiwa_sms_type']==1){ ?>
            <!-- liuxuexin start -->
          <li>
          <input type="radio" name="feiwa_sms_type" value="1" checked="checked" />
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_polang'];?></label>
          </li>
          <!-- liuxuexin end -->            
          <li>
          <input type="radio" name="feiwa_sms_type" value="3"/>
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_dxb'];?></label>
          </li><li>
          <input type="radio" name="feiwa_sms_type" value="2" />
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_yp'];?></label>
          </li>
        <!-- liuxuexin start -->
          <?php }elseif($output['list_setting']['feiwa_sms_type']==2){ ?>
          <li>
          <input type="radio" name="feiwa_sms_type" value="1" />
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_polang'];?></label>
          </li>
          <li>
           <input type="radio" name="feiwa_sms_type" value="3" /><label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_dxb'];?></label>
          </li>
          <li>
          <input type="radio" name="feiwa_sms_type" value="2" checked="checked" />
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_yp'];?></label>
          </li>
          <?php }elseif($output['list_setting']['feiwa_sms_type']==3){ ?>
          <li>
          <input type="radio" name="feiwa_sms_type" value="1"/>
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_polang'];?></label>
          </li>
          <li>
           <input type="radio" name="feiwa_sms_type" value="3" checked="checked" />
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_dxb'];?></label>
          </li>
          <li>
          <input type="radio" name="feiwa_sms_type" value="2" />
           <label for="feiwa_sms_type"><?php echo $lang['feiwa_sms_yp'];?></label>
          </li>
          <?php }?>
          <!-- liuxuexin end -->        
          
            </ul>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="feiwa_sms_tgs"><?php echo $lang['feiwa_sms_tgs'];?></label>
        </dt>
        <dd class="opt">
          <input id="feiwa_sms_tgs" name="feiwa_sms_tgs" value="<?php echo $output['list_setting']['feiwa_sms_tgs'];?>" class="input-txt" type="text" />
          <p class="notic"><?php echo $lang['feiwa_sms_tgs_notice'];?></p>
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="feiwa_sms_zh"><?php echo $lang['feiwa_sms_zh'];?></label>
        </dt>
        <dd class="opt">
          <input id="feiwa_sms_zh" name="feiwa_sms_zh" value="<?php echo $output['list_setting']['feiwa_sms_zh'];?>" class="input-txt" type="text" />
          <p class="notic"><?php echo $lang['feiwa_sms_zh_notice'];?></p>
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="feiwa_sms_pw"><?php echo $lang['feiwa_sms_pw'];?></label>
        </dt>
        <dd class="opt">
          <input id="feiwa_sms_pw" name="feiwa_sms_pw" value="<?php echo $output['list_setting']['feiwa_sms_pw'];?>" class="input-txt" type="text" />
          <p class="notic"><?php echo $lang['feiwa_sms_pw_notice'];?></p>
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="feiwa_sms_key"><?php echo $lang['feiwa_sms_key'];?></label>
        </dt>
        <dd class="opt">
          <input id="feiwa_sms_key" name="feiwa_sms_key" value="<?php echo $output['list_setting']['feiwa_sms_key'];?>" class="input-txt" type="text" />
          <p class="notic"><?php echo $lang['feiwa_sms_key_notice'];?></p>
        </dd>
      </dl>
            </dl>

            </dl>
            <dl class="row">
        <dt class="tit">
          <label for="feiwa_sms_signature"><?php echo $lang['feiwa_sms_signature'];?></label>
        </dt>
        <dd class="opt">
          <input id="feiwa_sms_signature" name="feiwa_sms_signature" value="<?php echo $output['list_setting']['feiwa_sms_signature'];?>" class="input-txt" type="text" />
          <p class="notic"><?php echo $lang['feiwa_sms_signature_notice'];?></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="feiwa_sms_bz"><?php echo $lang['feiwa_sms_bz'];?></label>
        </dt>
        <dd class="opt">
          <textarea name="feiwa_sms_bz" rows="6" class="tarea" id="feiwa_sms_bz"><?php echo $output['list_setting']['feiwa_sms_bz'];?></textarea>
          <p class="notic"><?php echo $lang['feiwa_sms_bz_notice'];?></p>
        </dd>
      </dl>
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="document.form1.submit()"><?php echo $lang['feiwa_submit'];?></a></div>
    </div>
  </form>
</div>