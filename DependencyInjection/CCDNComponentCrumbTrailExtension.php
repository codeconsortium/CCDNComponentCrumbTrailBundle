<?php

/*
 * This file is part of the CCDN CommonBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\CrumbTrailBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class CCDNComponentCrumbTrailExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
		$processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

		$container->setParameter('ccdn_component_crumb_trail.crumb.truncate_first', $config['crumb']['truncate_first']);
		$container->setParameter('ccdn_component_crumb_trail.crumb.truncate_item', $config['crumb']['truncate_item']);
		$container->setParameter('ccdn_component_crumb_trail.crumb.truncate_last', $config['crumb']['truncate_last']);
		
    }

	public function getAlias()
	{
		return 'ccdn_component_crumb_trail';
	}
	
}
