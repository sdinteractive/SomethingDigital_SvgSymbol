<?php

class SomethingDigital_SvgSymbol_Helper_Data extends Mage_Core_Helper_Abstract
{
    const SVGSYMBOL_DEFAULT_PATH = 'svgsymbol/settings/path';
    const SVGSYMBOL_ENABLED      = 'svgsymbol/settings/enabled';

    /**
     * Get SVG symbol path with optional arguments
     * @param  string|null $use   symbol id
     * @param  string|null $class svg element class
     * @param  string|null $path  path on disk to svg file
     * @return bool|string
     */
    public function getSvgSymbol($use=null, $class=null, $path=null)
    {

        if(!Mage::getStoreConfig(self::SVGSYMBOL_ENABLED)){
            return false;
        }

        if(is_null($path)){
            $path = Mage::getStoreConfig(self::SVGSYMBOL_DEFAULT_PATH);
        }

        //extra space for Nadav to have a clean svg element
        $svgClass = !is_null($class) ? ' class="%s"' : '';

        $template = "<svg{$svgClass}><use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='%s#%s'></use></svg>";
        $path = Mage::getDesign()->getSkinBaseDir() . DS . $path;

        //replace template with path and $use declaration
        return sprintf($template,$class,$path,$use);
    }

}