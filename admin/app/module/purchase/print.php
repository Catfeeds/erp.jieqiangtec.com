<?php
/*
@@acc_free
*/
$CenterProductExtra = Core::ImportExtra( 'CenterProduct' );
$CenterPurchaseExtra = Core::ImportExtra( 'CenterPurchase' );

$CenterPurchaseModel = Core::ImportModel( 'CenterPurchase' );
$CenterSupplierModel = Core::ImportModel( 'CenterSupplier' );

$CenterOrderModel = Core::ImportModel( 'CenterOrder' );

Core::LoadClass( 'WorkFlow' );
$WorkFlow = new WorkFlow( 'Purchase' );

$purchaseId = (int)$_GET['id'];

$purchaseInfo = $CenterPurchaseModel->Get( $purchaseId );

if ( !$purchaseInfo )
	Alert( '没有找到采购单' );

$purchaseProductList = $CenterPurchaseModel->GetProductList( $purchaseId );
$purchaseProductList = $CenterPurchaseExtra->ExplainProduct_1( $purchaseProductList );

$supplierInfo = $CenterSupplierModel->Get( $purchaseInfo['supplier_id'] );
$purchaseInfo['supplier_name'] = $supplierInfo['name'];

$purchaseInfo['supplier_account_bank'] = $supplierInfo['accountbank'];
$purchaseInfo['supplier_account_number'] = $supplierInfo['account_number'];



$WorkFlow->SetInfo( $purchaseInfo );
$purchaseInfo['workflow_status_name'] = $WorkFlow->GetStatus();
$purchaseInfo['workflow_allow_do'] = $WorkFlow->AllowDo();


$AdminModel = Core::ImportModel( 'Admin' );

if ( $purchaseInfo['user_id'] )
{
	$adminInfo = $AdminModel->GetAdministrator( $purchaseInfo['user_id'] );
	$purchaseInfo['user_name'] = $adminInfo['user_real_name'];
}

if ( $purchaseInfo['sign_pro_mg'] )
{
	$adminInfo = $AdminModel->GetAdministrator( $purchaseInfo['sign_pro_mg'] );
	$purchaseInfo['sign_pro_mg_name'] = $adminInfo['user_real_name'];
}

if ( $purchaseInfo['sign_ope_mj'] )
{
	$adminInfo = $AdminModel->GetAdministrator( $purchaseInfo['sign_ope_mj'] );
	$purchaseInfo['sign_ope_mj_name'] = $adminInfo['user_real_name'];
}

if ( $purchaseInfo['sign_ope_vc'] )
{
	$adminInfo = $AdminModel->GetAdministrator( $purchaseInfo['sign_ope_vc'] );
	$purchaseInfo['sign_ope_vc_name'] = $adminInfo['user_real_name'];
}

$tpl['list'] = $purchaseProductList;
$tpl['info'] = $purchaseInfo;


global $__UserAuth;
global $__Config;
     $tpl['company_name'] = $__Config['company_name'];


    $sign_jl = $AdminModel->GetAdministrator( $purchaseInfo['sign_top_jl'] );
	$sign_zj = $AdminModel->GetAdministrator( $purchaseInfo['sign_top_zj'] );
	$sign_fz = $AdminModel->GetAdministratorListcp_2();





////////////////////////////////////////////////////////产品经理
$tpl['workflow']['sign_pro_mg'] = "";
if ( $purchaseInfo['sign_pro_mg']<0 )
	$tpl['workflow']['sign_pro_mg'] = ' <font>→ 待</font><font title="级别：产品经理">'.$sign_jl['user_real_name'].'</font><font>审核</font>';

if ( $purchaseInfo['sign_pro_mg']>0 )
	$tpl['workflow']['sign_pro_mg'] = ' <font>→ [ </font><strong title="级别：产品经理">'.$purchaseInfo['sign_pro_mg_name'].'</strong><b>√</b> <font>]</font>';




////////////////////////////////////////////////////产品总监
$tpl['workflow']['sign_ope_mj'] ="";
if ( $purchaseInfo['sign_ope_mj'] < 0 )
	$tpl['workflow']['sign_ope_mj'] = ' <font>→ 待<font title="级别：产品总监">'.$sign_zj['user_real_name'].'</font>审核</font>';

if ( $purchaseInfo['sign_ope_mj'] > 0 )
	$tpl['workflow']['sign_ope_mj'] = ' <font>→ [ </font><strong title="级别：产品总监">'.$purchaseInfo['sign_ope_mj_name'].'</strong><b>√</b> <font>]</font>';

////////////////////////////////////////////////////产品副总
$tpl['workflow']['sign_ope_vc'] ="";
if ( $purchaseInfo['sign_ope_vc'] < 0 )
     $tpl['workflow']['sign_ope_vc'] = ' <font>→ 待<font title="级别：产品副总">'.$sign_fz[0]['user_real_name'].'</font>审核</font>';

if ( $purchaseInfo['sign_ope_vc'] > 0 )
	$tpl['workflow']['sign_ope_vc'] = ' <font>→ [ </font><strong title="级别：产品副总">'.$purchaseInfo['sign_ope_vc_name'].'</strong><b>√</b> <font>]</font>';



	
////////////////////////////////////////////////////














Common::PageOut( 'purchase/print.html', $tpl, false, false );

exit();

?>