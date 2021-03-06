<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2016-11-15 16:38:17
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<div class="HY-content-header clearfix">
	<h3 class="head-tax-rule"><?php echo $warehouse_info['name']; ?> 库存查询 </h3>
	<p class="right">
		<button type="button" onclick="$('#excel_form').submit();">导出Excel</button>
	</p>
</div>

<form method="post" id="excel_form">
	<input type="hidden" name="excel" value="1">
</form>

<div class="HY-grid-title">
	<div class="HY-grid-title-inner">
		<?php echo $warehouse_info['name']; ?> 库存查询
	</div>
</div>
<div class="HY-grid">
	<table cellspacing="0" class="data" id="grid_table">
		<thead>
			<tr class="header">
				<th width="100">SKU</th>
				<th width="100">产品ID</th>
				<th width="">产品名称</th>
				<th width="100">库房名称</th>
				<th width="100">货位</th>
				<th width="100">总数量</th>
				<th width="100">锁定数量</th>
				<th width="100">库存成本</th>
			</tr>
		</thead>
		<tbody>
			<?php
if ( $list )
{
foreach ( $list as $val )
{
?>
			<tr>
				<td align="center"><?php echo $val['sku']; ?></td>
				<td align="center"><?php echo $val['product_id']; ?></td>
				<td>
					<?php echo $val['erp_sku']; ?><b>名称：</b><?php echo $val['sku_info']['product']['name']; ?>
					<?php
if ( $val['sku_info']['attribute'] )
{
?><b>属性：</b><?php echo $val['sku_info']['attribute']; ?><?php
}
?>
				</td>
				<td align="center"><?php echo $val['warehouse_name']; ?></td>
				<td align="center"><?php echo $val['place_name']; ?></td>
				<td align="center">
					<font color="green"><b><?php echo $val['quantity']; ?></b></font>
				</td>
				<td align="center">
					<font color="red"><b><?php echo $val['lock_quantity']; ?></b></font>
				</td>
				<td align="center">
					&yen; <?php echo $val['price']; ?>
				</td>
			</tr>
			<?php
}
}
?>
		</tbody>
	</table>
</div>

