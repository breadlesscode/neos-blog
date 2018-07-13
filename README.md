# Neos Blog !! WORK IN PROGRESS !!
[![Latest Stable Version](https://poser.pugx.org/breadlesscode/neos-blog/v/stable)](https://packagist.org/packages/breadlesscode/neos-blog)
[![Downloads](https://img.shields.io/packagist/dt/breadlesscode/neos-blog.svg)](https://packagist.org/packages/breadlesscode/neos-blog)
[![License](https://img.shields.io/github/license/breadlesscode/neos-blog.svg)](LICENSE)
[![GitHub stars](https://img.shields.io/github/stars/breadlesscode/neos-blog.svg?style=social&label=Stars)](https://github.com/breadlesscode/neos-blog/stargazers)
[![GitHub watchers](https://img.shields.io/github/watchers/breadlesscode/neos-blog.svg?style=social&label=Watch)](https://github.com/breadlesscode/neos-blog/subscription)

This Neos CMS plugin is for a simple blog functionality.

## Features
 - Simple blog article listing with pagination
 - Categorizable blog articles
 - Taggable blog articles
 - Comments *comming soon*

## Installation
Most of the time you have to make small adjustments to a package (e.g., the configuration in Settings.yaml). Because of that, it is important to add the corresponding package to the composer from your theme package. Mostly this is the site package located under Packages/Sites/. To install it correctly go to your theme package (e.g.Packages/Sites/Foo.Bar) and run following command:

```bash
composer require breadlesscode/neos-blog --no-update
```

The --no-update command prevent the automatic update of the dependencies. After the package was added to your theme composer.json, go back to the root of the Neos installation and run composer update. Your desired package is now installed correctly.

## Todo
- [ ] Write a better flow query master operation to keep the code DRY
- [ ] Comments
- [ ] Tags
- [ ] Documentation site (this package is to complex for a single readme file)
- [ ] Add multible spam detection providers

## Usage
Coming soon

## Configuration
Coming soon


## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
