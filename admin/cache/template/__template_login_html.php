<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2013-01-17 02:09:45
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HCenter -login</title>

<style type="text/css">

*{
	padding:0px;
	margin:0px;
	font-family:tahoma,"Lucida Grande","Lucida Sans",sans,Hei;
	font-size:12px;
}

a{
	color:#0066CC;
	text-decoration:underline;
}

a:hover{
	color:#FF7031;
	text-decoration:none;
}

h3{
	font-size:14px;
	font-weight:bold;
	color:#444;
	margin-bottom:10px;
}

input {
	vertical-align:middle;
	padding:3px;
}

input.in{
	padding:2px;
	width:220px;
	border:1px solid #ccc;
	height:20px;
	padding-top:10px;
}

select{
	padding:3px;
	/*font-size:11px;*/
}

input.btn {
	cursor:pointer;
	height:28px;
}

.img{
	border:1px solid #ccc;
	padding:2px;
}

ul {list-style-image:none;list-style-position:none;list-style-type:none;}


</style>

</head>
<script src="script/jquery-1.3.2.js"></script>
<script src="script/common.js"></script>


<body>
<div style="height:40px;line-height:40px;background-color:#444;color:#fff;padding-left:40px;">
	HShopCenter administrator login
</div>
<div class="container">

	<div style="width:400px;margin:170px auto;background-color:;padding:20px;border:1px solid #ccc;">
		<p style="margin-bottom:20px;">HShopCenter administrator login</p> 
		<form method=post action="">
			<table class="pigtbl">
				<tbody>
					<tr>
						<td width="100"><strong>User Name:</strong></td>
						<td><input type="text" name="name" size="30" value="" class="in" /></td>
					</tr>
					<tr>
						<td><strong>Password:</strong></td>
						<td><input type="password" name="password" size="20" class="in" value="" /></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="Submit"  class="button"/>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>

</div>
</body>
</html>