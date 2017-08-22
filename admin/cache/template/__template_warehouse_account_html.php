<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2013-01-08 15:28:55
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<div class="HY-content-header clearfix">
	<h3 class="head-tax-rule"><?php echo $warehouse_info['name']; ?> 库存商品帐 </h3>
</div>


<form method="get" id="main_form">
<div class="HY-form-table" id="price_tab">
	<div class="HY-form-table-header">
		<?php echo $warehouse_info['name']; ?> 库存商品帐查询
	</div>
	<div class="HY-form-table-main">
		<table cellspacing="0" class="HY-form-table-table">
			<tbody>
				<tr>
					<td class="label"><label>货位<span class="required"></span></label></td>
					<td class="value">
						<input name="mod" value="warehouse.account.detail" type="hidden"/>
						<input name="warehouse_id" value="<?php echo $_GET['warehouse_id']; ?>" type="hidden"/>
						<input name="name" id="place_name" value="" class="input-text" type="text" style="width:150px;"/>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>SKU<span class="required"></span></label></td>
					<td class="value">
						<input name="sku" id="sku" value="" class="input-text" type="text" style="width:180px;"/>
						<button type="button" id="add-btn">查找SKU</button>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>分类<span class="required"></span></label></td>
					<td class="value">
						<div id="tree-list"></div>
						<input name="category" id="category" value="" class="input-text" type="hidden" />
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>开始日期<span class="required"></span></label></td>
					<td class="value">
						<input name="begin_date" id="begin_date" value="" class="input-text" type="text" style="width:150px;"/> <img src="image/grid-cal.gif" id="begin_date_btn" align="absmiddle"/>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>结束日期<span class="required"></span></label></td>
					<td class="value">
						<input name="end_date" id="end_date" value="" class="input-text" type="text" style="width:150px;"/> <img src="image/grid-cal.gif" id="end_date_btn" align="absmiddle"/>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"><label>查看类型<span class="required"></span></label></td>
					<td class="value">
						<select name="type">
							<option value="0">入库和出库</option>
							<option value="1">只看入库</option>
							<option value="2">只看出库</option>
						</select>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
				<tr>
					<td class="label"> </label></td>
					<td class="value">
						<button type="button" onclick="$('#main_form').submit();">确定查询</button>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</form>

<link href="css/cal/zpcal.css" rel="stylesheet" type="text/css">
<link href="css/cal/template.css" rel="stylesheet" type="text/css">
<link href="css/cal/maroon.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='script/zapatec.js'></script>
<script type="text/javascript" src="script/calendar.js"></script>
<script type="text/javascript" src="script/calendar-zh.js"></script>

<script language="JavaScript">

$(document).ready(function(){
	$('#add-btn').click(function(){
		AddProductToRow();
	});

	var auto = new Ext.form.AutoCompleteField({
		applyTo: 'place_name',
		hideTrigger:true,
		width:140,
		hiddenName:'place_id',
		store:autoComplatePlaceStore,
		mode: 'local',
		tpl:autoComplatePlaceTemplate,
		valueField:'id',
		displayField:'name',
		queryId:'key',
		emptyText:'按货位名称查找...'
	});
});

function AddRow(info){
	$('#sku').val(info.sku);
	UnDialog();
}



var warehouseId = '<?php echo $warehouse_id; ?>';

</script>


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



<script type="text/javascript" src="script/ext/ext-base.js"></script>
<script type="text/javascript" src="script/ext/ext-all.js"></script>

<script language="JavaScript">

Ext.BLANK_IMAGE_URL = 'script/ext/s.gif';

var tree;

Ext.onReady(function(){
	tree = new Ext.tree.TreePanel({
		el:'tree-list',
		height: 300,
		width: 300,
		useArrows:true,
		autoScroll:true,
		animate:true,
		enableDD:true,
		containerScroll: true,
		rootVisible: false,
		frame: false,
		bodyStyle: 'border:1px solid #ccc;',
		root: new Ext.tree.AsyncTreeNode(),
		loader: new Ext.tree.TreeLoader({
			dataUrl: '?mod=product.category.list.json&checkbox=1&checked=<?php echo $checked_list; ?>',
			preloadChildren: true,
			clearOnLoad: false
		})
	});


	tree.getRootNode().attributes.id = 0;
	tree.getRootNode().attributes.name = '根分类';

	tree.on('checkchange',function(node, checked){
		var id = node.attributes.id;

		if ($('input[name=category]').val())
			var checkedList = $('input[name=category]').val().split(',');
		else
			var checkedList = [];

		if(checked){
			if($.inArray(id,checkedList)==-1){
				checkedList.push(id);
			}
		}else{
			checkedList = $.map(checkedList,function(a){return a!=id?a:null});
		}

		$('input[name=category]').val(checkedList.join(','));
	});

	tree.on('load',function(){
		
	});

	tree.render();

	var hiddenPkgs  = [];
	var markCount	= [];
});


</script>


<style>
.main-category{
	font-weight:bold;
}

.tree-add {
	background-image:url(./image/icon/add.png) !important;
}
</style>