<?php

class CenterOrderExtra
{
	function CenterOrderExtra()
	{
		
	}

	function Explain( $list )
	{
		foreach ( $list as $key => $val )
		{
			$list[$key] = $this->ExplainOne( $val );
		}

		return $list;
	}

	function ExplainOne( $info )
	{
		return $info;
	}

	function ExplainProduct( $list )
	{
		foreach ( $list as $key => $val )
		{
			$list[$key] = $this->ExplainProductOne( $val );
		}

		return $list;
	}

	function ExplainProductOne( $info )
	{
		Core::LoadDom( 'CenterSku' );
		$CenterSkuDom = new CenterSkuDom( $info['sku'] );
		$skuInfo = $CenterSkuDom->InitProduct();
		
		$info['sku_info'] = $skuInfo;
		return $info;
	}
}

?>