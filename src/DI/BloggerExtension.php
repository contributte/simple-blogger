<?php

namespace Minetro\Blog\Simple\DI;

use Nette;
use Nette\DI\CompilerExtension;
use Nette\DI\Config\Adapters\NeonAdapter;
use Nette\InvalidStateException;
use Nette\Utils\Finder;

/**
 * Blogger Extension
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class BloggerExtension extends CompilerExtension
{

    /** @var array */
    private $defaults = [
        'posts' => '%appDir%/data',
        'config' => [
            'truncate' => 400,
        ],
    ];

    public function loadConfiguration()
    {
        $config = $this->validateConfig($this->defaults);
        $builder = $this->getContainerBuilder();

        // Collect posts
        $posts = [];

        /** @var \SplFileInfo $splfile */
        foreach (Finder::findFiles('*.neon')->from($config['posts']) as $file => $splfile) {
            // Add to other posts
            $posts[] = $splfile->getRealPath();
        }

        // Add posts to dependencies
        $this->compiler->addDependencies([$splfile->getRealPath()]);

        $builder->addDefinition($this->prefix('collector'))
            ->setClass('Minetro\Blog\Simple\Collector\StaticCollector', [$posts]);

        $builder->addDefinition($this->prefix('model.repository.posts'))
            ->setClass('Minetro\Blog\Simple\Model\Repository\PostsRepository');

        $builder->addDefinition($this->prefix('model.service.posts'))
            ->setClass('Minetro\Blog\Simple\Model\Service\PostsService');
    }

    public function beforeCompile()
    {
    }

    public function afterCompile(Nette\PhpGenerator\ClassType $class)
    {
    }

}
