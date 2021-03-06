<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2015-12-22 08:53:45
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<link href="css/cal/zpcal.css" rel="stylesheet" type="text/css">
<link href="css/cal/template.css" rel="stylesheet" type="text/css">
<link href="css/cal/maroon.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='script/zapatec.js'></script>
<script type="text/javascript" src="script/calendar.js"></script>
<script type="text/javascript" src="script/calendar-zh.js"></script>
<style>
.xiao_1 input{border:#999999 1px solid;height:16px;}
.xiao_1 select{border:#999999 1px solid;height:20px;}
.xiao_2{float:left;width:20px;height:20px; text-align:center;border:#666666 1px solid;margin-right:6px;}
.xiao_3{float:left;width:20px;height:20px; text-align:center;border:#666666 1px solid;margin-right:6px;color:#FFFFFF; background:#000000;}
.xiao_21{float:left;width:20px;height:20px; text-align:center;border:#666666 1px solid;margin-right:25px;}
.xiao_22{float:right;width:20px;height:20px; text-align:center;border:#666666 1px solid;}
</style>

<div style="margin:0px auto;width:1220px; padding:0px;">
<ul style="float:left;width:950px;">
<?php
if ( $list )
{
foreach ( $list as $info )
{
?>
<dl style="float:left;width:928px;margin:0px;padding:10px;margin-bottom:20px;border:#999999 1px solid; background:#FFFFFF;">
<dt style="float:left;width:740px;">
<div style="float:left;width:740px; padding-bottom:5px;border-bottom:#999999 1px solid;">
<span style="float:left;">订单号：<b><?php echo $info['id']; ?></b>　　导入时间：<?php echo $info['add_time']; ?></span>
<span style="float:right;">订单状态:<b>
<?php
if ( $info['status'] > 1 )
{
?><font color="red">售后退单退货</font>
<?php
}
else
{
?>
<?php
if ( $info['service_check'] == 2 )
{
?><font color="red">已取消</font><?php
}
else
{
?><font color="green">正常</font><?php
}
?></b>
<?php
}
?>
</span>
</div>
<div style="float:left;width:740px; padding-bottom:10px; padding-top:5px; text-align:right;">
<?php echo $info['channel_name']; ?>&nbsp;→&nbsp;<?php echo $info['order_time']; ?>&nbsp;→&nbsp;<b><?php echo $info['target_id']; ?></b>
</div>				
<div style="float:left;width:740px;">
<table width="740" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
  <tr style=" background:url(image/sort_row_bg.gif) repeat-x left top;line-height:25px; font-weight:bold;">
    <td width="40" height="25"><div align="center">ID</div></td>
    <td width="70"><div align="center">SKU</div></td>
    <td width="70"><div align="center">渠道编号</div></td>
    <td><div align="left">&nbsp;名称</div></td>
	<td width="70"><div align="center">属性</div></td>
    <td width="40"><div align="center">数量</div></td>
	<td width="70"><div align="center">单价</div></td>
  </tr>
<?php
if ( $info['list'] )
{
foreach ( $info['list'] as $row )
{
?>
<tr style="line-height:25px;">
    <td bgcolor="#FFFFFF" align="center" ><?php echo $row['sku_info']['product']['id']; ?></td>
    <td bgcolor="#FFFFFF" align="center" ><?php echo $row['sku']; ?></td>
    <td bgcolor="#FFFFFF" align="center" ><?php
if ( trim($row['target_id']) && $row['price'] > 0 )
{
?><?php echo $row['target_id']; ?><?php
}
else
{
?><font color="#FF0000">赠品</font><?php
}
?></td>
    <td bgcolor="#FFFFFF">&nbsp;<?php echo $row['sku_info']['product']['name']; ?></td>
	<td bgcolor="#FFFFFF" align="center" ><?php echo $row['sku_info']['attribute']; ?></td>
    <td bgcolor="#FFFFFF" align="center" ><?php echo $row['quantity']; ?></td>
	<td bgcolor="#FFFFFF" align="center" ><?php echo $row['price']; ?></td>
  </tr>
<?php
}
}
?>
</table>
</div>
<div style="float:left;width:740px;">
<span style="float:right; padding:5px 0px;">总金额：<font color="red"><b><?php echo $info['total_money']; ?></b></font></span>
</div>	

<div style="float:left;width:740px;">
<button style="float:left;width:100px;height:25px;color:#000000;line-height:1.3; font-weight:bold;" type="button" onclick="ServiceLog(<?php echo $info['id']; ?>,1);">售后处理</button>
<button style="float:right;width:100px;height:25px;color:#000000;line-height:1.3; font-weight:bold;" type="button" onclick="ServiceLog(<?php echo $info['id']; ?>,2);">售后完毕</button>
</div>

<div style="float:left;width:740px;">
<?php
if ( $info['service_list'] )
{
foreach ( $info['service_list'] as $row )
{
?>
<ul style="float:left;width:730px; padding:5px;border:#D8D8D8 1px solid;">
<span style="float:left;"><?php echo $row['comment']; ?></span>
<span style="float:right;"><?php echo $row['user_name_zh']; ?>：<?php echo DateFormat($row['add_time'],'m-d H:m'); ?></span>
</ul>
<?php
}
}
?>
</div>


</dt>		
				
<dd style="float:right;margin:0px;width:160px;padding-left:10px;border-left:#999999 1px solid;">
<?php
if ( $info['order_comment'] && $info['order_comment'] != '|' )
{
?>
<fieldset style="float:left;width:136px; padding:5px 10px;border:#0066CC 2px dashed;margin-bottom:10px;">
<legend style="color:#0066CC;">客户备注</legend>
<span style="float:left;width:136px; text-align:left;"><?php echo $info['order_comment']; ?></span>
</fieldset>
<?php
}
?>
<div style="float:left; padding:5px 10px;width:140px;border:#999999 1px dashed; background:#F1F1F1;">
产品部：<?php echo $info['purchase_check_name']; ?><br />
<?php $Myline = 1; ?>
<?php
if ( $info['purchase_check_list'] )
{
foreach ( $info['purchase_check_list'] as $row )
{
?>
<?php
if ( $Myline == 1 )
{
?>
<?php echo $row['user_name_zh']; ?>：<?php echo DateFormat($row['add_time'],'m-d H:i'); ?><?php
if ( $row['comment'] )
{
?><br /><font color="#666666"><?php echo $row['comment']; ?></font><?php
}
?>
<?php
}
?>
<?php $Myline = $Myline+1; ?>
<?php
}
}
?>
</div>
<div style="float:left; padding:5px 10px;width:140px;border:#999999 1px dashed; background:#F1F1F1;margin-top:10px;">
<div style="float:left;width:140px;">
客服部：<?php echo $info['service_check_name']; ?><br />
<?php $Myline = 1; ?>
<?php
if ( $info['service_check_list'] )
{
foreach ( $info['service_check_list'] as $row )
{
?>
<?php
if ( $Myline == 1 )
{
?>
<?php echo $row['user_name_zh']; ?>：<?php echo DateFormat($row['add_time'],'m-d H:i'); ?><?php
if ( $row['comment'] )
{
?><br /><font color="#666666"><?php echo $row['comment']; ?></font><?php
}
?>
<?php
}
?>
<?php $Myline = $Myline+1; ?>
<?php
}
}
?>
</div>
<?php
if ( $info['service_check'] == 0 )
{
?>
<div style="float:left;width:140px; padding-top:5px;">
<?php
if ( $info['service_call_list'] )
{
foreach ( $info['service_call_list'] as $row )
{
?>
<ul style="float:left;width:130px; padding:5px;border-top:#D8D8D8 1px solid;" title="操作员：<?php echo $row['user_name_zh']; ?>">
<span style="float:left;"><?php echo $row['comment']; ?></span>
<span style="float:right;"><?php echo DateFormat($row['add_time'],'m-d H:m'); ?></span>
</ul>
<?php
}
}
?>
</div>
<?php
}
?>

</div>

<?php
if ( $info['service_check'] == 1 )
{
?>
<div style="float:left; padding:5px 10px;width:140px;border:#999999 1px dashed; background:#F1F1F1;margin-top:10px;">
<?php
if ( $info['warehouse_id'] == 5 )
{
?>
发货方式：<font color="#CC0099">★代发货</font><br />
发货状态：<?php
if ( $info['logistics_sn'] != '' )
{
?><font color="green">已发货</font><br />物流公司：<?php echo $info['logistics_company']; ?><br />单号：<?php echo $info['logistics_sn']; ?><?php
}
else
{
?><font color="red">未发货</font><?php
}
?>
<?php
}
else
{
?>
发货方式：<font color="#FF6600">库房发货</font><br />
配货状态：<?php echo $info['lock_status_name']; ?><br />
出库状态：<?php echo $info['delivery_status_name']; ?><br />
发货状态：<?php
if ( $info['logistics_sn'] != '' )
{
?><font color="green">已发货</font><br />物流公司：<?php echo $info['logistics_company']; ?><br />单号：<?php echo $info['logistics_sn']; ?><?php
}
else
{
?><font color="red">未发货</font><?php
}
?>
<?php
}
?>
</div>
<div style="float:left; padding:5px 10px;width:140px;border:#999999 1px dashed; background:#F1F1F1;margin-top:10px;">
签收状态：<?php echo $info['sign_status_name']; ?><br />到款状态：<?php echo $info['finance_recieve_name']; ?>
</div>
<div style="float:left; padding:5px 10px;width:140px;border:#999999 1px dashed; background:#F1F1F1;margin-top:10px;">
<?php
if ( $info['order_invoice'] == 2 )
{
?>
<font color="#FFCC00">开收据</font><?php
if ( $info['order_invoice_status'] == 1 )
{
?><font color="#FFCC00"> → 已开收据</font><?php
}
else
{
?><font color="red"> → 未开收据</font><?php
}
?></font>
<?php
}
elseif ( $info['order_invoice'] == 1 )
{
?>
<font color="#3366CC">开发票</font><?php
if ( $info['order_invoice_status'] == 1 )
{
?><font color="#3366CC"> → 已开发票</font><?php
}
else
{
?><font color="red"> → 未开发票</font><?php
}
?></font>
<?php
}
else
{
?>不需要票据<?php
}
?>
</div>
<?php
}
?>
</dd>
</dl>
<?php
}
}
?>
</ul>
<ul style=" position:fixed;top:85px;right:30px;width:250px;margin:0px; padding:0px;" class="xiao_1">
<span style="float:left;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<div style="float:left;">总共 <b><?php echo $total; ?></b> 条，每页 <b><?php echo $onePage; ?></b> 条。</div>
<div style="float:left;width:228px; padding:10px 0px 0px 0px;"><?php
if ( $page_num > 1 )
{
?><?php echo $page_bar_b; ?><?php
}
?></div>
</span>
<form method="get" id="search_form">
<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<input type="hidden" name="mod" value="<?php echo $_GET['mod']; ?>"><input type="hidden" name="excel" id="excel" value="0">

<div style="float:left;width:228px;height:25px;">
订单编号：<input style="width:60px;" type="text" name="id" id="id" value="<?php echo $_GET['id']; ?>">
</div>
<div style="float:left;width:228px;height:25px;">
销售渠道：<select name="channel_id" style="width:150px">
<option value=""></option>
<?php
if ( $channel_list )
{
foreach ( $channel_list as $val )
{
?>
<option value="<?php echo $val['id']; ?>" <?php
if ( $val['id'] == $_GET['channel_id'] )
{
?>selected<?php
}
?>><?php echo $val['name']; ?></option>
<?php
}
}
?>
</select>
</div>
<div style="float:left;width:228px;height:25px;">
渠道单号：<input style="width:150px;" type="text" name="target_id" value="<?php echo $_GET['target_id']; ?>">
</div>
</span>
<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<dl style="float:left;width:228px;margin:0px;padding:0px;">
<dt style="float:left;width:228px;height:25px;margin:0px;padding:0px;">银行下单时间</dt>
<dd style="float:left;width:94px;height:22px;margin:0px;padding:0px; position:relative;">
<input style="width:76px;" type="text" name="begin_date" id="begin_date" value="<?php echo $_GET['begin_date']; ?>">
<img src="image/grid-cal.gif" width="18" height="18" id="begin_date_btn" style="position:absolute;top:2px;right:0px;" />
</dd>
<dd style="float:left;width:30px;height:22px;margin:0px;padding:0px; text-align:right;line-height:25px; font-size:20px; position:relative;">=></dd>
<dd style="float:right;width:94px;height:22px;margin:0px;padding:0px; position:relative;">
<input style="width:76px;" type="text" name="end_date" id="end_date" value="<?php echo $_GET['end_date']; ?>">
<img src="image/grid-cal.gif" width="18" height="18" id="end_date_btn" style="position:absolute;top:2px;right:0px;" />
</dd>
</dl>
</span>


<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<div style="float:left;width:114px;height:28px;">
<select name="purchase_check" style="width:93px;">
<option value="">产品部确认</option>
<option value="1" <?php
if ( 1 == $_GET['purchase_check'] && $_GET['purchase_check'] != '' )
{
?>selected<?php
}
?>>产品-已确认</option>
<option value="2" <?php
if ( 2 == $_GET['purchase_check'] && $_GET['purchase_check'] != '' )
{
?>selected<?php
}
?>>产品-已取消</option>
<option value="0" <?php
if ( 0 == $_GET['purchase_check'] && $_GET['purchase_check'] != '' )
{
?>selected<?php
}
?>>产品-未操作</option>
</select>
</div>
<div style="float:right;width:105px;height:28px;">
<select name="service_check" style="width:93px">
<option value="">客服部确认</option>
<option value="1" <?php
if ( 1 == $_GET['service_check'] && $_GET['service_check'] != '' )
{
?>selected<?php
}
?>>客服-已确认</option>
<option value="2" <?php
if ( 2 == $_GET['service_check'] && $_GET['service_check'] != '' )
{
?>selected<?php
}
?>>客服-已取消</option>
<option value="0" <?php
if ( 0 == $_GET['service_check'] && $_GET['service_check'] != '' )
{
?>selected<?php
}
?>>客服-未操作</option>
</select>
</div>
<div style="float:left;width:114px;height:28px;">
<select name="lock_status" style="width:93px">
<option value="">配货状态</option>
<?php
if ( $lock_status_list )
{
foreach ( $lock_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['lock_status'] && $_GET['lock_status'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select>
</div>
<div style="float:right;width:105px;height:28px;">
<select name="delivery_status" style="width:93px">
<option value="">出库状态</option>
<?php
if ( $delivery_status_list )
{
foreach ( $delivery_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['delivery_status'] && $_GET['delivery_status'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select></div>
<div style="float:left;width:114px;height:28px;">
<select name="warehouse_type" style="width:93px">
<option value="">发货方式</option>
<option value="5" <?php
if ( 5 == $_GET['warehouse_type'] && $_GET['warehouse_type'] != '' )
{
?>selected<?php
}
?>>代发货</option>
<option value="6" <?php
if ( 6 == $_GET['warehouse_type'] && $_GET['warehouse_type'] != '' )
{
?>selected<?php
}
?>>库房发货</option>
</select>
</div>
<div style="float:right;width:105px;height:28px;">
<select name="logistics_type" style="width:93px">
<option value="">发货状态</option>
<option value="1" <?php
if ( 1 == $_GET['logistics_type'] && $_GET['logistics_type'] != '' )
{
?>selected<?php
}
?>>未发货</option>
<option value="2" <?php
if ( 2 == $_GET['logistics_type'] && $_GET['logistics_type'] != '' )
{
?>selected<?php
}
?>>已发货</option>
</select>
</div>
<div style="float:left;width:114px;height:22px;">
<select name="sign_status" style="width:93px">
<option value="">签收状态</option>
<?php
if ( $sign_status_list )
{
foreach ( $sign_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['sign_status'] && $_GET['sign_status'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select>
</div>
<div style="float:right;width:105px;height:22px;">
<select name="finance_recieve" style="width:93px">
<option value="">到款状态</option>
<?php
if ( $finance_recieve_status_list )
{
foreach ( $finance_recieve_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['finance_recieve'] && $_GET['finance_recieve'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select>
</div>
</span>
<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<div style="float:left;width:114px;height:22px;">
<select name="order_invoice" style="width:93px">
<option value="">发票 / 收据</option>
<option value="0"  <?php
if ( $_GET['order_invoice'] == 0 && $_GET['order_invoice'] != '' )
{
?>selected<?php
}
?> >不需要</option>
<option value="1"  <?php
if ( $_GET['order_invoice'] == 1 && $_GET['order_invoice'] != '' )
{
?>selected<?php
}
?> >开发票</option>
<option value="2"  <?php
if ( $_GET['order_invoice'] == 2 && $_GET['order_invoice'] != '' )
{
?>selected<?php
}
?> >开收据</option>
</select>
</div>
<div style="float:right;width:105px;height:22px;">
<select name="order_invoice_status" style="width:93px">
<option value="">开票状态</option>
<option value="0" <?php
if ( 0 == $_GET['order_invoice_status'] && $_GET['order_invoice_status'] != '' )
{
?>selected<?php
}
?>>未开票据</option>
<option value="1" <?php
if ( 1 == $_GET['order_invoice_status'] && $_GET['order_invoice_status'] != '' )
{
?>selected<?php
}
?>>已开票据</option>
</select>
</div>
</span>
<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<div style="float:left;width:228px;height:22px;">
产品名称：
<input type="text" name="product_name" value="<?php echo $_GET['product_name']; ?>">
</div>
</span>
<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<button  style="float:right;" type="button" onclick="$('#search_form').submit();">筛选订单</button>
</span>
</form>
</ul>
</div>

<br />



<div id="tpl_action" style="display:none">
	<div>
		<form method="post" action="">
			<table width="100%">
				<tr>
					<td align="center"><textarea type="text" name="comment" style="width:380px;height:50px;" class="input-text"/></textarea></td>
				</tr>
			</table>
		</form>
	</div>
</div>


<script type="text/javascript">

var cal = new Zapatec.Calendar.setup({
	inputField     :    "begin_date",     // id of the input field
	ifFormat       :    "%Y-%m-%d",     // format of the input field
	showsTime      :     false,
	button         :    "begin_date_btn",  // trigger button (well, IMG in our case)
	weekNumbers    :    false,  // allows user to change first day of week
	firstDay       :    1, // first day of week will be Monday
	align          :    "Bl"           // alignment (defaults to "Bl")
});

var cal = new Zapatec.Calendar.setup({
	inputField     :    "end_date",     // id of the input field
	ifFormat       :    "%Y-%m-%d",     // format of the input field
	showsTime      :     false,
	button         :    "end_date_btn",  // trigger button (well, IMG in our case)
	weekNumbers    :    false,  // allows user to change first day of week
	firstDay       :    1, // first day of week will be Monday
	align          :    "Bl"           // alignment (defaults to "Bl")
});







function ServiceLog(orderId,type){
isSubmit_a = false;
	var html = $('#tpl_action').html().replace(/-_-/ig, '');
	html = $(html);
	//html.find('form').attr('action', '?mod=order.edit.service&id='+orderId);
	title = '售后记录';


if(type==2){
				$.ajax({
				url:'?mod=order.edit.service&orderId='+orderId+'&do=service&type='+type+'&rand=' + Math.random(),
				type:'GET',
				success: function(info){
					if (info=='200' || info==200){
					UnDialog();
					alert('操作成功！');
					}
					else{alert(info);}
				},
				error:function(info){alert('网络错误,请重试');}
				});


}
else
{
	Dialog_1(title,html,function(){if (isSubmit_a){return false;}

		comment=html.find('form').find('.input-text').val();
		if(comment==''){alert('内容不能为空！');return false;}
				$.ajax({
				url:'?mod=order.edit.service&orderId='+orderId+'&comment='+comment+'&do=service&type='+type+'&rand=' + Math.random(),
				type:'GET',
				success: function(info){
					if (info=='200' || info==200){
					$('#one_line_'+orderId+'').css('display','none');
					UnDialog();
					alert('操作成功！');
					}
					else{alert(info);}
				},
				error:function(info){alert('网络错误,请重试');}
				});
		isSubmit_a = true;

	});
}





}


</script>