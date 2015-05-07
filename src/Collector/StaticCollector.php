<?php

namespace Minetro\Blog\Simple\Collector;

use Minetro\Blog\Simple\Model\Entity\Collection;
use Minetro\Blog\Simple\Model\Entity\Post;
use Minetro\Blog\Simple\Model\Entity\PostMeta;
use Minetro\Blog\Simple\Model\Entity\PostSeo;
use Minetro\Blog\Simple\Utils\ContentProcessor;
use Nette\DI\Config;
use Nette\DI\Config\Adapters\NeonAdapter;
use Nette\DI\Helpers;
use Nette\InvalidStateException;
use Nette\Utils\Strings;

/**
 * Static Collector
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class StaticCollector implements ICollector
{

    /** @var array */
    private $scheme = [
        'id' => NULL,
        'date' => NULL,
        'title' => NULL,
        'post' => NULL,
        'seo' => [
            'title' => NULL,
            'keywords' => NULL,
            'description' => NULL,
            'parser' => 'parsedown',
        ],
        'tags' => [],
        'config' => [
            'comments' => TRUE,
            'social' => TRUE,
            'truncate' => 400,
        ],
    ];

    /** @var array */
    private $posts = [];

    /**
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return Collection
     */
    public function collect()
    {
        // Convert neon files to array
        $posts = $this->parsePosts($this->posts);

        // Create entities from posts
        $collection = $this->collectEntities($posts);

        return $collection;
    }

    /**
     * HELPERS *****************************************************************
     * *************************************************************************
     */

    /**
     * @param array $files
     * @throws InvalidStateException
     * @return array
     */
    protected function parsePosts($files)
    {
        $posts = [];
        $postsIds = [];
        $decoder = new NeonAdapter();
        foreach ($files as $file) {
            // Decode file
            $config = $decoder->load($file);

            // Merge
            $post = Config\Helpers::merge($config, $this->scheme);

            // Check unique post id
            if (in_array($post['id'], $postsIds)) {
                throw new InvalidStateException('Duplicate post.id "' . $post['id'] . '"');
            }

            // Expand post scheme
            $post = Helpers::expand($post, ['file' => dirname($file)], TRUE);

            // Unify
            $post['post'] = realpath($post['post']);

            $posts[] = $post;
            $postsIds[] = $post['id'];
        }

        return $posts;
    }

    /**
     * @param array $posts
     * @return Collection
     */
    protected function collectEntities($posts)
    {
        $collection = new Collection();

        foreach ($posts as $p) {
            $post = new Post();
            $post->setHash(sha1(json_encode($p)));
            $post->setSlug(md5($p['title']));
            $post->setId($p['id']);
            $post->setDate($p['date']);
            $post->setTitle($p['title']);

            $data = @file_get_contents($p['post']);
            $parsed = ContentProcessor::parse($data);

            if ($parsed) {
                list ($perex, $content) = $parsed;
                $post->setPerex($perex);
                $post->setContent($content);
            } else {
                $post->setPerex(Strings::truncate($data, $p['config']['truncate']));
                $post->setContent($data);
            }

            // Metadata
            $metadata = new PostMeta();
            $metadata->setTags($p['tags']);
            $metadata->setComments($p['config']['comments']);
            $metadata->setSocial($p['config']['social']);
            $metadata->setParser($p['config']['parser']);
            $metadata->setTruncate($p['config']['truncate']);
            $post->setMetadata($metadata);

            // Seo
            $seo = new PostSeo();
            $seo->setTitle($p['seo']['title']);
            $seo->setKeywords($p['seo']['keywords']);
            $seo->setDescription($p['seo']['description']);
            $post->setSeo($seo);

            $collection->add($post);
        }

        return $collection;
    }
}
