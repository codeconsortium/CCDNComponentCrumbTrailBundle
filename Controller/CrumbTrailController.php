<?php 

/*
 * This file is part of the CCDNComponent CrumbTrailBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\CrumbTrailBundle\Controller;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class CrumbTrailController
{


	/**
	 * 
	 * @access private
	 */
	private $crumbs = array();


	/**
	 *
	 * @access public
	 */
	public function __construct()
	{

	}
	
	
	/**
	 * Implements the Fluent Interface
	 *
	 * @access public
	 * @param $label, $url, $icon
	 * @return $this
	 */
	public function add($label, $url, $icon = null)
	{
		$this->crumbs[] = array('label' => $label, 'url' => $url, 'icon' => $icon);
		
		return $this;
	}


	/**
	 * 
	 * @access public
	 * @return Array() $crumbs
	 */
	public function getTrail()
	{
		return $this->crumbs;
	}
	
	
	/**
	 *
	 * @access public
	 * @return int
	 */
	public function count()
	{
		return (count($this->crumbs) - 1);
	}

}