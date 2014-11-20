<?php

class SomethingDigital_SvgSymbol_Block_Template extends Mage_Core_Block_Template
{
	public function getSvgSymbol($use=null, $class=null, $path=null)
	{
		return Mage::helper('svgsymbol')->getSvgSymbol($use=null, $class=null, $path=null);
	}
}