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

namespace CCDNComponent\CrumbTrailBundle\Component\Helper;

/**
 *
 * @category CCDNComponent
 * @package  CrumbTrailBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNComponentCrumbTrailBundle
 *
 */
class Crumb
{
    /**
     *
     * @access private
     */
    private $crumbs = array();

    /**
     * Implements the Fluent Interface
     *
     * @access public
     * @param  string                                                 $label
     * @param  string                                                 $url
     * @param  string                                                 $icon
     * @return \CCDNComponent\CrumbTrailBundle\Component\Helper\Crumb
     */
    public function add($label, $url, $icon = null)
    {
        $this->crumbs[] = array('label' => $label, 'url' => $url, 'icon' => $icon);

        return $this;
    }

    /**
     *
     * @access public
     * @return array $crumbs
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
