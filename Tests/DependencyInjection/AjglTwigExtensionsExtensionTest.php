<?php
/**
 * This file is part of the AJ General Libraries Bundles
 *
 * Copyright (C) 2010-2013 Antonio J. García Lagar <aj@garcialagar.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Ajgl\Bundle\TwigExtensionsBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Ajgl\Bundle\TwigExtensionsBundle\DependencyInjection\AjglTwigExtensionsExtension;

/**
 * @author Antonio J. García Lagar <aj@garcialagar.es>
 */
class AjglTwigExtensionsExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContainerBuilder
     */
    protected $container;

    /**
     * @var AjglTwigExtensionsExtension
     */
    protected $extension;

    protected function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new AjglTwigExtensionsExtension();
    }

    public function testTwigExtensionsDefinition()
    {
        $this->extension->load(array(), $this->container);

        $this->assertTrue($this->container->hasParameter('ajgl_twig_extensions.breakpoint_extension.class'));
        $this->assertTrue($this->container->hasDefinition('ajgl_twig_extensions.breakpoint_extension'));

        $this->assertSame(
            'Ajgl_Twig_Extension_BreakpointExtension',
            $this->container->getParameter('ajgl_twig_extensions.breakpoint_extension.class')
        );

        $definition = $this->container->getDefinition('ajgl_twig_extensions.breakpoint_extension');
        $this->assertSame(
            '%ajgl_twig_extensions.breakpoint_extension.class%',
            $definition->getClass()
        );        
        $this->assertNotNull($definition->getTag('twig.extension'));
    }
}
