<?php defined('ByFeiWa') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="index.php?app=reads_tag&feiwa=reads_tag_list" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3><?php echo $lang['feiwa_reads_tag_manage'];?> - <?php echo $lang['feiwa_new'];?></h3>
        <h5><?php echo $lang['feiwa_reads_tag_manage_subhead'];?></h5>
      </div>
    </div>
  </div>
  <form id="add_form" method="post" action="index.php?app=reads_tag&feiwa=reads_tag_save">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="tag_name"><em>*</em><?php echo $lang['reads_tag_name'];?></label>
        </dt>
        <dd class="opt">
          <input type="text" value="" name="tag_name" id="tag_name" class="input-txt">
          <span class="err"></span>
          <p class="notic"><?php echo $lang['tag_name_error'];?></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="tag_sort"><em>*</em><?php echo $lang['feiwa_sort'];?></label>
        </dt>
        <dd class="opt">
          <input id="tag_sort" name="tag_sort" type="text" class="input-txt" value="255" />
          <span class="err"></span>
          <p class="notic"><?php echo $lang['class_sort_explain'];?></p>
        </dd>
      </dl>
      <div class="bot"><a id="submit" href="javascript:void(0)" class="ncap-btn-big ncap-btn-green"><?php echo $lang['feiwa_submit'];?></a></div>
    </div>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#submit").click(function(){
        $("#add_form").submit();
    });

    $('#add_form').validate({
        errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            tag_name: {
                required : true,
                maxlength : 20
            },
            tag_sort: {
                required : true,
                digits: true,
                max: 255,
                min: 0
            }
        },
        messages : {
            tag_name: {
                required : "<i class='fa fa-exclamation-circle'></i><?php echo $lang['tag_name_error'];?>" ,
                maxlength : "<i class='fa fa-exclamation-circle'></i><?php echo $lang['tag_name_error'];?>"
            },
            tag_sort: {
                required : "<i class='fa fa-exclamation-circle'></i><?php echo $lang['class_sort_error'];?>",
                digits: "<i class='fa fa-exclamation-circle'></i><?php echo $lang['class_sort_error'];?>",
                max : "<i class='fa fa-exclamation-circle'></i><?php echo $lang['class_sort_error'];?>",
                min : "<i class='fa fa-exclamation-circle'></i><?php echo $lang['class_sort_error'];?>"
            }
        }
    });
});
</script>