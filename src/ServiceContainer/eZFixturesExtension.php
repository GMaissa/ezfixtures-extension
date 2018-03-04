<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\ServiceContainer;

use Behat\Testwork\ServiceContainer\Extension;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

/**
 * eZFixtures Extension Class
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class eZFixturesExtension implements Extension
{
    const EZFIXTURES_BASE_DIR_PARAM_KEY = 'fixtures_base_dir';

    /**
     * {@inheritDoc}
     */
    public function getConfigKey()
    {
        return 'gm_ezfixtures_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        $builder
            ->children()
                ->scalarNode(self::EZFIXTURES_BASE_DIR_PARAM_KEY)
                    ->defaultValue(null)
                ->end()
            ->end();
    }

    /**
     * {@inheritdoc}
     */
    public function load(ContainerBuilder $container, array $config)
    {
        if (null === $config[self::EZFIXTURES_BASE_DIR_PARAM_KEY]) {
            $config[self::EZFIXTURES_BASE_DIR_PARAM_KEY] = sprintf(
                '%s/features/fixtures',
                $container->getParameter('paths.base')
            );
        }

        foreach ($config as $key => $value) {
            $container->setParameter(sprintf('behat.%s.%s', $this->getConfigKey(), $key), $value);
        }

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(ExtensionManager $extensionManager)
    {
        // Nothing to initialize
    }

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        // Nothing
    }
}
