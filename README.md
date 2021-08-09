![](https://heatbadger.now.sh/github/readme/contributte/simple-blogger/?deprecated=1)

<p align=center>
	<a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
	<a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
	<a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
	Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

## Disclaimer

| :warning: | This project is no longer being maintained. Please use [contributte/webapp-skeleton](https://github.com/contributte/webapp-skeleton).
|---|---|

| Composer | [`minetro/simple-blogger`](https://packagist.org/minetro/simple-blogger) |
|---| --- |
| Version | ![](https://badgen.net/packagist/v/minetro/simple-blogger) |
| PHP | ![](https://badgen.net/packagist/php/minetro/simple-blogger) |
| License | ![](https://badgen.net/github/license/contributte/simple-blogger) |

Simple static blogger based on Nette.

This project is deprecated. Use better solution [blogette/platform](https://github.com/blogette/platform).

## Usage

Register `BloggerExtension` to your other extensions.

```neon
extensions:
	blog: Minetro\Blog\Simple\DI\BloggerExtension
```

You have to set folder where [Nette\Utils\Finder](http://api.nette.org/2.3/Nette.Utils.Finder.html) will be looking for **posts**.

```neon
blog:
	posts: %appDir%/data
```

## Posts

Post consists of two parts. `Meta` file and `content` file.

### Metafile

Let's we have a file in *data/201505/post.neon*. All meta files must have `neon` extension.

Take a look to example meta file.

```neon
id: 1
date: 06.05.2015
title: Some cool title
post: %file%/post.md

seo:
	title: 'Best framework in the world'
	keywords: 'nette, php, framework'
	description: 'Nothing to say. It's a fact.'

tags:
	- php

config:
	comments: yes
	social: yes
	parser: parsedown
```

Required properties are **id**, **date**, **title** and **post**.

**Post** is a target to your `content` file. Content file could be `.md`, `.latte` or whatever. But you have to specific
parser. In this case it is parsedown.

## Model

### PostsService

To obtain all posts, one posts, order posts, filters posts here is `PostsService`.

`->findAll(Configuration $c)` - returns array of posts.

`->fetch(Configuration $c)` - returns just one posts or nothing.

### Configuration

There are 3 objects. **Criteria**, **Sorter** and **Paginator**.

`Criteria` - it is for posts filtering (excluding)

`Sorter` - it is for posts sorting

`Paginator` - it extends classic [Nette\Utils\Paginator](http://api.nette.org/2.3/Nette.Utils.Paginator.html)

## View

View is not part of this library. You have to display posts by yourself.

## Development

This package was maintain by these authors.

<a href="https://github.com/f3l1x">
	<img width="80" height="80" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=80">
</a>

-----

Consider to [support](https://contributte.org/partners.html) **contributte** development team.
Also thank you for being used this package.
