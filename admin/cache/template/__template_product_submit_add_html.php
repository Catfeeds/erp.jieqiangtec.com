<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2013-01-08 15:22:14
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<div class="HY-content-header clearfix">
	<h3 class="head-tax-rule"><?php
if ( !$edit )
{
?>新建<?php
}
else
{
?>编辑<?php
}
?>提报</h3>
	<div class="right">
		<button type="button" class="scalable save" onclick="SubmitForm();"><span>保存数据</span></button>
	</div>
</div>


<form method="post" id="main_form" onsubmit="return false;">
<div class="HY-form-table" id="price_tab">
	<div class="HY-form-table-header">
		<?php
if ( !$edit )
{
?>新建<?php
}
else
{
?>编辑<?php
}
?>提报
	</div>
	<div class="HY-form-table-main">
		<table cellspacing="0" class="HY-form-table-table">
			<tbody>
				<tr>
					<td class="label"><label>产品编号<span class="required"></span></label></td>
					<td class="value">
						<input name="target_id" value="<?php echo $submit['target_id']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>分类编号<span class="required"></span></label></td>
					<td class="value">
						<input name="target_category_id" value="<?php echo $submit['target_category_id']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>类型<span class="required"></span></label></td>
					<td class="value">
						<input name="supply_type" value="1" type="radio" <?php
if ( $submit['supply_type'] == 1 || !$submit['supply_type'] )
{
?>checked<?php
}
?> />商城
						<input name="supply_type" value="2" type="radio" <?php
if ( $submit['supply_type'] == 2 )
{
?>checked<?php
}
?> />积分
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>名称<span class="required"></span></label></td>
					<td class="value">
						<input name="name" value="<?php echo $submit['name']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>简单描述<span class="required"></span></label></td>
					<td class="value">
						<input name="summary" value="<?php echo $submit['summary']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>详细描述<span class="required"></span></label></td>
					<td class="value">
						<textarea name="description" id="cmment" style="width:600px;height:100px;overflow-x:auto;overflow-y:auto;"><?php echo $submit['description']; ?></textarea>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>银行成本<span class="required"></span></label></td>
					<td class="value">
						<input name="supply_price" value="<?php echo $submit['supply_price']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>销售价格<span class="required"></span></label></td>
					<td class="value">
						<input name="price" value="<?php echo $submit['price']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>费率<span class="required"></span></label></td>
					<td class="value">
						<input name="payout_rate" value="<?php echo $submit['payout_rate']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>提报期次<span class="required"></span></label></td>
					<td class="value">
						<input name="submit_issue" value="<?php echo $submit['submit_issue']; ?>" class="input-text" type="text" style="width:150px;" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<script language="JavaScript">

function SubmitForm(){
	var post = $('#main_form').serialize();
	Loading();
	$.ajax({
		url: '<?php echo $_SERVER['REQUEST_URI']; ?>&rand=' + Math.random(),
		type:'POST',
		data:post,
		success: function(info){
			if (info=='200'){
				Loading('处理成功', '正在跳转到列表页面...');
				window.location='?mod=product.submit.list';
			}else{
				alert(info);
				UnLoading();
			}
		},
		error:function(info){
			alert('网络错误,请重试');
			UnLoading();
		}
	});
}

</script>