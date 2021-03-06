<?php
/**
* Object TH
* @author	Alyx Association <info@alyx.it>
* @version	Factory
* @package	Object
* @copyright	Alyx Association 2008-2010
* @license GNU Public License
* You can find documentation and sourcecode on the JAMP official website
* http://jamp.alyx.it/
*/

class ClsObj_th extends ClsObject {
	/**
	* @var $container Array containing the child objects
	*/
	var $child = array();

	/**
	* Construct
	* @param string $id ID object
	*/
	public function __construct($id)
	{
		$this->property["id"] 		= array("value" => $id,  "inherit" => false, "html" => true);
		$this->property["width"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["colspan"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["height"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["rowspan"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["align"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["valign"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["bgcolor"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["nowrap"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["abbr"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["axis"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["bgcolor"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["char"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["charoff"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["headers"] 	= array("value" => null, "inherit" => false, "html" => true);
		$this->property["scope"] 	= array("value" => null, "inherit" => false, "html" => true);
	}

	/**
	* Generate the code pdf
	* @param string $pdf Class PDF
	*/
	public function codePDF($pdf)
	{
		foreach ($this->child as $obj) $obj->codePDF($pdf);
	}

	/**
	* Generate the code text
	*/
	public function codeTXT()
	{
		foreach ($this->child as $obj) $obj->codeTXT();
	}
	
	/**
	 * Generate the code xls
	 */
	public function codeXLS()
	{
		$code = "<td ".$this->getProperty("html", true, false).">";
		foreach ($this->child as $obj) 
			$code .= $obj->codeXLS();
		$code .="</td>";
		return $code;
	}

	/**
	* Generate the code html
	* @param string $tab Tabs
	*/
	public function codeHTML($tab = "")
	{
		$code = "\n$tab<th ".$this->getProperty("html", true, false).">";
		foreach ($this->child as $obj) $code .= $tab.$obj->codeHTML($tab."\t");
		$code .= "\n$tab</th>";
		return $code;
	}

	/**
	* The function is called after each setting of a property
	* @param string $name Name property
	*/
	protected function setPropertyAfter($name)
	{
	}
}
?>