<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2015-12-22 10:56:22
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<style>
.xiaofw_1 td{ padding-top:5px; padding-bottom:3px;}
</style>

<div class="HY-content-header clearfix-overflow">
	<h3><?php echo $warehouse_info['name']; ?> 采购收货入库</h3>
	<div class="right">
		<button type="button" class="scalable back" onclick="SubmitForm();" style=""><span>保存数据</span></button>
	</div>
</div>

<form method="post" id="main_form" onsubmit="return false;">

<div class="clearfix">
	<div class="left">
	</div>
	<div class="right">
		
	</div>
</div>
<div class="block5"></div>

<div class="HY-grid-title">
	<div class="HY-grid-title-inner">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left">采购单号：<?php echo $info['id']; ?>&nbsp;&nbsp;&nbsp;制单人：<?php echo $info['user_name']; ?>&nbsp;&nbsp;&nbsp;供应商：<?php echo $info['supplier_name']; ?></td>
    <td align="right"><?php
if ( $info['comment'] )
{
?>备注：<?php echo $info['comment']; ?><?php
}
?></td>
  </tr>
</table>
	</div>
</div>
<div class="HY-grid">
	<table cellspacing="0">
		<thead>
			<tr class="header">
				<th width="100"><div align="right">商品ID - SKU</div></th>
				<th>商品名称</th>
				<th width="60"><div align="center">采购价格</div></th>
				<th width="60"><div align="center">采购数量</div></th>
				<th width="60"><div align="center">已收数量</div></th>
				<th width="60"><div align="center">待收数量</div></th>
				<th width="80"><div align="center">收货数量</div></th>
				<th width="100">目标货位</th>
				<th width="160">备注</th>
			</tr>
		</thead>
		<tbody id="purchase_row">
			<?php
if ( $list )
{
foreach ( $list as $val )
{
?>
			<tr class="xiaofw_1">
				<td align="right"><?php echo $val['sku_info']['product']['id']; ?> - <?php echo $val['sku']; ?></td>
				<td><?php echo $val['sku_info']['product']['name']; ?>
				<?php
if ( $val['sku_info']['attribute'] )
{
?> ← <font color="#FF0000"><?php echo $val['sku_info']['attribute']; ?></font><?php
}
?>
				<?php
if ( $val['comment'] )
{
?> ← <font color="#009900">备注：<?php echo $val['comment']; ?></font><?php
}
?></td>
				<td align="center">
					&yen;<?php echo $val['price']; ?>
				</td>
				<td align="center">
					<?php echo $val['quantity']; ?>
				</td>
				<td align="center">
					<?php echo $val['receive_quantity']; ?>
				</td>
				<td align="center">
					<?php echo $val['wait_quantity']; ?>
				</td>
				<td align="center">
					<?php
if ( $val['wait_quantity'] > 0 )
{
?><input type="text" class="input-text" style="width:50px; text-align:center;" name="quantity[<?php echo $val['id']; ?>]" value=""><?php
}
?>
				</td>
				<td>
				<?php
if ( $val['wait_quantity'] > 0 )
{
?>
				<select name="place_id[<?php echo $val['id']; ?>]" style="width:80px;">
				        <option value="">选择货位</option>
						<?php
if ( $Placelist )
{
foreach ( $Placelist as $Pval )
{
?>
						<option value="<?php echo $Pval['id']; ?>"><?php echo $Pval['name']; ?></option>
						<?php
}
}
?>
					</select>　
				<?php
}
?>
</td>
				<td align="center">
				<?php
if ( $val['wait_quantity'] > 0 )
{
?>
					<input type="text" class="input-text" style="width:150px;" name="row_comment[<?php echo $val['id']; ?>]" value="">
					<?php
}
?>
				</td>
			</tr>
			<?php
}
}
?>
		</tbody>
	</table>
</div>

<div class="HY-form-table" id="base_tab">
	<div class="HY-form-table-header">
		其他
	</div>
	<div class="HY-form-table-main">
		<table cellspacing="0" class="HY-form-table-table">
			<tbody>
				<tr>
					<td class="label"><label>备注</label></td>
					<td class="value">
						<div>
							<textarea name="comment" style="width:800px;height:120px;overflow-x:auto;overflow-y:auto;"></textarea>
						</div>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

</form>

<script language="JavaScript">

$(document).ready(function(){
	$('a[ctype=expand]').click(function(){
		$(this).parents('td').eq(0).find('.HY-grid').toggle();
	});
});

function SubmitForm(){
	var post = $('#main_form').serialize();
	Loading();
	$.ajax({
		url: '?mod=receive.new.purchase<?php echo $warehouse_uri; ?>&id=<?php echo $info['id']; ?>&rand=' + Math.random(),
		type:'POST',
		data:post,
		success: function(info){
			if (info=='200' || info==200){
				Loading('处理成功', '正在跳转到列表页面...');
				//window.location='?mod=receive.purchase<?php echo $warehouse_uri; ?>';
				window.location='?mod=receive.new.receive<?php echo $warehouse_uri; ?>&id=<?php echo $info['id']; ?>';
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



<link rel="stylesheet" type="text/css" href="script/ext/css/ext-all.css" />
<link rel="stylesheet" type="text/css" href="script/ext/css/core.css" />

<style>
.x-tree-node,
.x-menu-item
{font-size:12px;}

th{
	font-weight:bold;
}
</style>

<script type="text/javascript" src="script/ext/ext-base.js"></script>
<script type="text/javascript" src="script/ext/ext-all.js"></script>
<script type="text/javascript" src="script/ext-ext.js"></script>

<script language="JavaScript">

Ext.BLANK_IMAGE_URL = 'script/ext/s.gif';

</script>