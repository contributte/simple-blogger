# Simple Blogger

Simple static blogger based on Nette.

-----

This project is deprecated. Use better solution [blogette/platform](https://github.com/blogette/platform).

-----

[![Build Status](https://img.shields.io/travis/minetro/simple-blogger.svg?style=flat-square)](https://travis-ci.org/minetro/simple-blogger)
[![Code coverage](https://img.shields.io/coveralls/minetro/simple-blogger.svg?style=flat-square)](https://coveralls.io/r/minetro/simple-blogger)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/simple-blogger.svg?style=flat-square)](https://packagist.org/packages/minetro/simple-blogger)
[![Latest stable](https://img.shields.io/packagist/v/minetro/simple-blogger.svg?style=flat-square)](https://packagist.org/packages/minetro/simple-blogger)
[![HHVM Status](https://img.shields.io/hhvm/minetro/simple-blogger.svg?style=flat-square)](http://hhvm.h4cc.de/package/minetro/simple-blogger)

## Discussion / Help

[![Join the chat](https://img.shields.io/gitter/room/minetro/nette.svg?style=flat-square)](https://gitter.im/minetro/nette?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

# Install

```bash
composer require minetro/simple-blogger:~0.1
```

# Usage

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

TODO - describe other properties.

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
