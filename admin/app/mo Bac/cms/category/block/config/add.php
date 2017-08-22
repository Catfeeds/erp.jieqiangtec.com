<?php

/*
@@acc_title="新的块设置"

*/

$CmsBlockModel = Core::ImportModel( 'CmsBlock' );
$CmsCategoryModel = Core::ImportModel( 'CmsCategory' );

if ( !$_POST )
{
	$patternList = $CmsBlockModel->GetPatternList();

	$tpl['pattern_list'] = $patternList;

	Common::PageOut( 'cms/category/block/config/add.html', $tpl );
}
else
{
	$data = array();
	$data['name'] = NoHtml( $_POST['name'] );
	$data['en_name'] = NoHtml( $_POST['en_name'] );
	$data['pattern_id'] = intval( $_POST['pattern_id'] );
	$data['add_time'] = time();
	$data['update_time'] = time();

	if ( Nothing( $data['name'] ) )
		Alert( '名称不能为空' );
	if ( Nothing( $data['en_name'] ) )
		Alert( '英文名不能为空' );
	if ( !$data['pattern_id'] )
		Alert( '请选择块模型' );

	if ( $CmsCategoryModel->GetBlockConfig( false, $data['en_name'] ) )
		Alert( '英文名已经被使用' );

	$CmsCategoryModel->AddBlockConfig( $data );

	Common::Loading( '?mod=cms.category.block.config.list' );
}

?>