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

namespace CCDNComponent\CrumbTrailBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
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
class CCDNComponentCrumbTrailExtension extends Extension
{
    /**
     *
     * @access public
     * @return string
     */
    public function getAlias()
    {
        return 'ccdn_component_crumb_trail';
    }

    /**
     *
     * @access public
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        // Class file namespaces.
        $this
            ->getComponentSection($config, $container)
        ;

        // Configuration stuff.
        $container->setParameter('ccdn_component_crumb_trail.crumb.first_crumb_truncate', $config['crumb']['first_crumb_truncate']);
        $container->setParameter('ccdn_component_crumb_trail.crumb.mid_crumb_truncate', $config['crumb']['mid_crumb_truncate']);
        $container->setParameter('ccdn_component_crumb_trail.crumb.last_crumb_truncate', $config['crumb']['last_crumb_truncate']);

        // Load Service definitions.
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     *
     * @access private
     * @param  array                                                                                $config
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder                              $container
     * @return \CCDNComponent\CrumbTrailBundle\DependencyInjection\CCDNComponentCrumbTrailExtension
     */
    private function getComponentSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_component_crumb_trail.component.trail.class', $config['component']['trail']['class']);

        return $this;
    }
}
