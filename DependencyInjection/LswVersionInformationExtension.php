<?php

namespace Lsw\VersionInformationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * {@inheritDoc}
 */
class LswVersionInformationExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('lsw_version_information_root_dir', $config['root_dir']);
        $container->setParameter('lsw_version_information_settings', $config['settings']);
        $container->setParameter('lsw_version_information_collectors', $config['collectors']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'lsw_version_information';
    }
}
