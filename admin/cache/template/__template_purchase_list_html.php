<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2013-08-12 11:12:23
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<style>
.xiaofw_0{border:#000000 1px solid;height:20px; background:#FFFFFF;}

</style>
<div class="HY-content-header clearfix">
	<h3 class="head-tax-rule">采购单列表 </h3>
	<p class="right">
		<button type="button" onclick="$('#excel').val(1);$('#search_form').submit();$('#excel').val(0);">导出Excel</button>
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
				<th width="60"><div align="right">采购单号</div></th>
				<th width="140"><div align="center">下单时间 / <a href="#" style="color:#990000" onclick="$('#begin_date').val('');$('#end_date').val('');$('#search_form').submit();">清除</a></div></th>
				<th width="60"><div align="center">制单员</div></th>
				<th width="60"><div align="center">类型</div></th>
				<th width="60"><div align="center">付款方式</div></th>
				<th width="60"><div align="center">总金额</div></th>
				<th width="90"><div align="center">库房</div></th>
				<th>供应商 / <a href="#" style="color:#990000" onclick="$('#supplier_id').val('');$('#search_form').submit();">清除</a></th>
				<th width="150">操作</th>
		  </tr>
	  <form method="get" id="search_form">
<tr class="filter_a">
<th>
<input type="hidden" name="mod" value="<?php echo $_GET['mod']; ?>">
<input type="text" name="id" id="id" value="<?php echo $_GET['id']; ?>" style="width:52px;text-align:right;height:18px;line-height:18px; float:right; padding-right:5px;"></th>
<th>
<div style="float:left;width:135px;height:25px;">
<div style="float:left;width:40px; text-align:right;">开始:</div>
<input style="float:left;width:70px;" type="text" name="begin_date" id="begin_date" value="<?php echo $_GET['begin_date']; ?>">
<img style="float:left;margin-left:3px;margin-top:2px; cursor:pointer;" src="image/grid-cal.gif" alt="" class="v-middle" id="begin_date_btn" />
</div>

<div style="float:left;width:135px;">
<div style="float:left;width:40px;text-align:right;">结束:</div>
<input style="float:left;width:70px;" type="text" name="end_date" id="end_date" value="<?php echo $_GET['end_date']; ?>">
<img style="float:left;margin-left:3px;margin-top:2px; cursor:pointer;" src="image/grid-cal.gif" alt="" class="v-middle" id="end_date_btn" />
</div>
</th>
<th>&nbsp;</th>
<th>
<select name="type"  style="height:22px;line-height:22px;width:88px;">
<option value=""></option>
<option value="1" <?php
if ( $_GET['type'] == 1 )
{
?>selected<?php
}
?>>常规采购</option>
<option value="2" <?php
if ( $_GET['type'] == 2 )
{
?>selected<?php
}
?>>按需采购</option>
</select>
</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>
<select name="warehouse_id"  style="height:22px;line-height:22px;width:88px;">
<option value=""></option>
<?php
if ( $warehouse_list )
{
foreach ( $warehouse_list as $val )
{
?>
<option value="<?php echo $val['id']; ?>" <?php
if ( $val['id'] == $_GET['warehouse_id'] )
{
?>selected<?php
}
?>><?php echo $val['name']; ?></option>
<?php
}
}
?>
</select>
</th>
<th>
<input type="hidden" id="supplier_id" name="supplier_id" value="<?php echo $_GET['supplier_id']; ?>"><input type="text" id="supplier_name" value="<?php echo $_GET['supplier_name']; ?>"  style="height:18px;line-height:18px;" />
</th>
<th><input type="hidden" name="excel" id="excel" value=""><button type="button" onclick="$('#supplier_id').val($('#supplier_t_id').val());$('#search_form').submit();">过滤</button></th>
</tr>

</form>
		</thead>
		<tbody>
			<?php
if ( $list )
{
foreach ( $list as $val )
{
?>
			<tr>
				<td align="right"><?php echo $val['id']; ?></td>
				<td align="center"><?php echo $val['add_time']; ?></td>
				<td align="center"><?php echo $val['user_name_zh']; ?></td>
				<td align="center"><?php echo $val['type_name']; ?></td>
				<td align="center"><?php echo $val['payment_type_name']; ?></td>
				<td align="center">&yen;<?php echo $val['total_money']; ?></td>
				<td align="center"><?php echo $val['warehouse_name']; ?></td>
				<td ><?php echo $val['supplier_name']; ?>&nbsp;</td>
				<td align="center">
					<a href="?mod=purchase.view&id=<?php echo $val['id']; ?>">查看</a> / 
					<a href="?mod=purchase.print&id=<?php echo $val['id']; ?>" target="_blank">采购单</a>
					<?php
if ( $val['type'] == 2 )
{
?> / <a href="?mod=purchase.printWL&id=<?php echo $val['id']; ?>" target="_blank">发货单</a><?php
}
else
{
?>　　　　<?php
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



<script language="JavaScript">

$(document).ready(function(){
	var auto = new Ext.form.AutoCompleteField({
		applyTo: 'supplier_name',
		hideTrigger:true,
		width:260,
		hiddenName:'supplier_t_id',
		store:autoComplateSupplierStore,	
		mode: 'local',
		tpl:autoComplateSupplierTemplate,
		valueField:'id',
		displayField:'name',
		queryId:'key',
		emptyText:'请输入供应商名称进行查找...'
	});
});



</script>
<link href="css/cal/zpcal.css" rel="stylesheet" type="text/css">
<link href="css/cal/template.css" rel="stylesheet" type="text/css">
<link href="css/cal/maroon.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='script/zapatec.js'></script>
<script type="text/javascript" src="script/calendar.js"></script>
<script type="text/javascript" src="script/calendar-zh.js"></script>

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
</script>