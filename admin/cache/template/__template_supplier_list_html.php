<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2016-11-24 09:58:22
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<div class="HY-content-header clearfix">
	<h3 class="head-tax-rule">供应商列表 </h3>
	<p class="right">
		<button style="float:right;" type="button" onclick="window.location='?mod=purchase.supplier&excel=1'">导出</button> <button  id="" type="button" class="scalable back" onclick="window.location='?mod=purchase.supplier.add';" style=""><span>添加供应商</span></button>
	</p>
</div>

<div class="HY-grid-title">
	<div class="HY-grid-title-inner">
		分页:<?php echo $page_bar; ?> 每页20条记录 总共<?php echo $total; ?>条记录 <?php echo $page; ?>/<?php echo $page_num; ?>
	</div>
</div>
<div class="HY-grid">
	<table cellspacing="0" class="data" id="grid_table">
		<thead>
			<tr class="header">
			<th width="40"><div align="center">序号</div></th>
				<th width="80">产品经理</th>
				<th width="120">公司简称</th>
				<th width="">公司名称</th>
				<th width="">发货方式</th>
				<th width="120" style="display:none">联系人</th>
				<th width="120" style="display:none">电话</th>
				<th>开户行</th>
				<th width="180">帐号</th>
				<th width="80"><div align="center">操作</div></th>
			</tr>
		</thead>
		<tbody>
			<?php
if ( $list )
{
foreach ( $list as $supplierinfo )
{
?>
			<tr>
			<td align="center"><a href="?mod=warehouse.stock.detailA&warehouse_id=6&place_id=&sku=&view_type=1&NID=<?php echo $supplierinfo['id']; ?>" target="_blank"></a><?php echo $supplierinfo['id']; ?></td>
				<td >&nbsp;<?php echo $supplierinfo['manage_name']; ?></td>
				<td >&nbsp;<?php echo $supplierinfo['op']; ?>→<?php echo $supplierinfo['mini_name']; ?></td>
				<td >&nbsp;<?php
if ( $supplierinfo['is_good'] == 1 )
{
?><font color="#000000"><?php
}
else
{
?><font color="#990000"><?php
}
?><?php echo $supplierinfo['name']; ?></font></td>
				<td >&nbsp;<?php
if ( 0 == $supplierinfo['key_mode'] )
{
?>代发货<?php
}
else
{
?><font color="#990000">库房调货</font><?php
}
?></td>
				<td  style="display:none">&nbsp;<?php echo $supplierinfo['linkman']; ?></td>
				<td  style="display:none">&nbsp;<?php echo $supplierinfo['phone']; ?></td>
				<td >&nbsp;<?php echo $supplierinfo['accountbank']; ?></td>
				<td >&nbsp;<?php echo $supplierinfo['account_number']; ?></td>
				<td align="center">
					<a href="?mod=purchase.supplier.edit&id=<?php echo $supplierinfo['id']; ?>">修改</a>
					<?php
if ( $group_man == 1 )
{
?>
					<a href="?mod=purchase.supplier.del&id=<?php echo $supplierinfo['id']; ?>" onclick="return confirm('确定删除吗?');">删除</a>
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

