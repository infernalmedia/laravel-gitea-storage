A Gitea Storage driver for Laravel

[![Latest Version](https://img.shields.io/packagist/v/infernalmedia/laravel-gitea-storage.svg?style=flat-square)](https://packagist.org/packages/infernalmedia/laravel-gitea-storage)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/infernalmedia/laravel-gitea-storage.svg?style=flat-square)](https://packagist.org/packages/infernalmedia/laravel-gitea-storage)

This package is a wrapper bridging [Flysystem-Gitea-storage](https://github.com/infernalmedia/flysystem-gitea-storage) into Laravel as an available storage disk.

This is a fork from the dashing [RoyVoetman/laravel-gitlab-storage](https://github.com/RoyVoetman/laravel-gitlab-storage) package which has been adapted to work with Gitea's API.

## Installation

```bash
composer require infernalmedia/laravel-gitea-storage
```

Add a new disk to your filesystems.php config

```php
'gitea' => [
    'driver'                => 'gitea',
    'personal-access-token' => env('GITEA_ACCESS_TOKEN', ''), // Personal access token
    'username'              => env('GITEA_USERNAME'),
    'repository'            => env('GITEA_REPOSITORY'), // your repo
    'branch'                => env('GITEA_BRANCH', 'main'), // Branch that should be used
    'base-url'              => env('GITEA_BASE_URL', 'https://gitea.com'), // Base URL of Gitea server you want to use
],
```

### Access token (required for private projects)
Gitea supports server side API authentication with Personal Access tokens

Personal Access Token can be created from the Settings page of your user account.

### Username

This is the username or the organization name under which repositories are stored.

### Repository

Name of the repository.

### Base URL
This will be the URL where you host your gitea server (e.g. https://gitea.com)

## Usage
```php
$disk = Storage::disk('gitea');

// create a file
$disk->put('images/', $fileContents);

// check if a file exists
$exists = $disk->exists('file.jpg');

// copy a file
$disk->copy('old/file1.jpg', 'new/file1.jpg');

// move a file
$disk->move('old/file1.jpg', 'new/file1.jpg');

// See https://laravel.com/docs/filesystem for a full list of all the available functionality
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Contributions are **welcome** and will be fully **credited**. We accept contributions via Pull Requests on [Github](https://github.com/infernalmedia/laravel-gitea-storage).

### Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).
- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.
- **Create feature branches** - Don't ask us to pull from your master branch.
- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
