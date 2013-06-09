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

namespace CCDNComponent\CrumbTrailBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

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
class CCDNComponentCrumbTrailBundle extends Bundle
{
    /**
     *
     * @access public
     */
    public function boot()
    {
        $twig = $this->container->get('twig');
		
        $twig->addGlobal(
			'ccdn_component_crumb_trail',
			array(
	            'crumb' => array(
	                'first_crumb_truncate' => $this->container->getParameter('ccdn_component_crumb_trail.crumb.first_crumb_truncate'),
	                'mid_crumb_truncate' => $this->container->getParameter('ccdn_component_crumb_trail.crumb.mid_crumb_truncate'),
	                'last_crumb_truncate' => $this->container->getParameter('ccdn_component_crumb_trail.crumb.last_crumb_truncate'),
	            ),
	        )
		); // End Twig Globals.
    }
}
