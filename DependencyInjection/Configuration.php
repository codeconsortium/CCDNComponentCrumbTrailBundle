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

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class }
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class Configuration implements ConfigurationInterface
{
    /**
     *
	 * @access public
	 * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ccdn_component_crumb_trail');

        $rootNode
            ->children()
                ->arrayNode('crumb')
	                ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('first_crumb_truncate')->defaultValue('20')->end()
                        ->scalarNode('mid_crumb_truncate')->defaultValue('20')->end()
                        ->scalarNode('last_crumb_truncate')->defaultValue('20')->end()
                    ->end()
                ->end()
            ->end()
		;

		// Class file namespaces.
		$this
			->addComponentSection($rootNode)
		;
		
        return $treeBuilder;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNComponent\CrumbTrailBundle\DependencyInjection\Configuration
     */
    private function addComponentSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('component')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
		                ->arrayNode('trail')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
		                    ->children()
								->scalarNode('class')->defaultValue('CCDNComponent\CrumbTrailBundle\Component\Helper\Crumb')->end()							
							->end()
						->end()
					->end()
				->end()
			->end()
		;
		
		return $this;
	}
}
