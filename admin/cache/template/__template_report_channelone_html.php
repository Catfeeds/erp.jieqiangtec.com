<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2015-10-09 18:47:38
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<div class="HY-content-header clearfix">
	<h3 class="head-tax-rule">渠道销售汇总报表 </h3>
</div>


<form method="POST" id="main_form" target="HtmlDoFormA">
<div class="HY-form-table" id="price_tab">
	<div class="HY-form-table-main">
		<table cellspacing="0" class="HY-form-table-table">
			<tbody>
				<tr>
					<td width="100" align="right">订单日期开始：</td>
					<td align="left" width="180">
						<input name="begin_date" id="begin_date" value="<?php echo $_POST['begin_date']; ?>" class="input-text" type="text" style="width:150px;"/> <img src="image/grid-cal.gif" id="begin_date_btn" align="absmiddle"/>
					</td>
					<td width="120" align="right">订单期单结束：</td>
					<td align="left" width="180">
						<input name="end_date" id="end_date" value="<?php echo $_POST['end_date']; ?>" class="input-text" type="text" style="width:150px;"/> <img src="image/grid-cal.gif" id="end_date_btn" align="absmiddle"/>
					</td>
					<td width="80" align="right" style="display:none">父渠道：</td>
					<td align="left" width="80"  style="display:none">
						<select name="channel_parent_id">
							<option value=""></option>
							<?php
if ( $channel_parent_list )
{
foreach ( $channel_parent_list as $val )
{
?>
							<option value="<?php echo $val['id']; ?>" <?php
if ( $val['id'] == $_GET['channel_parent_id'] )
{
?>selected<?php
}
?>><?php echo $val['name']; ?></option>
							<?php
}
}
?>
						</select>
					</td>
					<td width="80" align="right" style="display:none">渠道：</td>
					<td align="left" width="200" style="display:none">
						<select name="channel_id">
							<option value="0"></option>
							<?php
if ( $channel_list )
{
foreach ( $channel_list as $val )
{
?>
							<option value="<?php echo $val['id']; ?>" <?php
if ( $val['id'] == $_POST['channel_id'] )
{
?>selected<?php
}
?>><?php echo $val['name']; ?></option>
							<?php
}
}
?>
						</select>
					</td>
					<td width="150" align="right">
						<button type="button" onclick="kksolp()">确定查询</button>
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

function kksolp(){
$("#xiaofw1009_1").html("");
$("#xiaofwssss").html("");
$("#aaxiaofw").html("");
$('#main_form').submit();

}



$(document).ready(function(){
	$('#add-btn').click(function(){
		AddProductToRow();
	});
});




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



function flush(str){
$("#xiaofw1009_1").append(str);
}

function flush1(str){
$("#xiaofwssss").append(str);
}

function flush2(str){
$("#aaxiaofw").append(str);
}


</script>



<div class="HY-grid">
	<table cellspacing="0" class="data" id="grid_table">
		<thead>
			<tr class="header">
				<td align="left" id="aaxiaofw">&nbsp;总销售额：</td>
			</tr>
		</thead>
</table>
	<table cellspacing="0" class="data xiaofw00901" id="grid_table">
		<tbody>
			<tr id="xiaofw1009_1">
			</tr>
		</tbody>
		<tbody id="xiaofwssss"></tbody>
	</table>
</div>

<iframe src="" name="HtmlDoFormA" id="HtmlDoFormA" style="float:right;width:900px;height:600px;display:none;"></iframe>
