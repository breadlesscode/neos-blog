# Neos Blog

[![Packagist](https://img.shields.io/packagist/v/breadlesscode/neos-blog.svg?style=flat-square)](https://packagist.org/packages/breadlesscode/neos-blog)
[![Downloads](https://img.shields.io/packagist/dt/breadlesscode/neos-blog.svg)](https://packagist.org/packages/breadlesscode/neos-blog)
[![Packagist](https://img.shields.io/packagist/l/breadlesscode/neos-blog.svg?style=flat-square)](https://packagist.org/packages/breadlesscode/neos-blog)
[![semantic-release](https://img.shields.io/badge/%20%20%F0%9F%93%A6%F0%9F%9A%80-semantic--release-e10079.svg)](https://github.com/semantic-release/semantic-release)
[![GitHub stars](https://img.shields.io/github/stars/breadlesscode/neos-blog.svg?style=social&label=Stars)](https://github.com/breadlesscode/neos-blog/stargazers)
[![GitHub watchers](https://img.shields.io/github/watchers/breadlesscode/neos-blog.svg?style=social&label=Watch)](https://github.com/breadlesscode/neos-blog/subscription)

This Neos CMS plugin is for a simple blog functionality.

## Features
 - Categories
 - Tags
 - Comments
 - Author page
 - Listing with pagination


## Installation
Most of the time you have to make small adjustments to a package (e.g., the configuration in Settings.yaml). Because of that, it is important to add the corresponding package to the composer from your theme package. Mostly this is the site package located under Packages/Sites/. To install it correctly go to your theme package (e.g.Packages/Sites/Foo.Bar) and run following command:

```bash
composer require breadlesscode/neos-blog --no-update
```

The --no-update command prevent the automatic update of the dependencies. After the package was added to your theme composer.json, go back to the root of the Neos installation and run composer update. Your desired package is now installed correctly.

## Documentation

Documentation: https://breadlesscode.github.io/neos-blog

## Contribution

We'd love you to contribute to neos-blog. We try to make it as easy as possible.
We are using semantic-release to have more time to concentrate on important stuff
instead of struggling in the dependency or release hell.

Therefore the first rule is to follow the [eslint commit message guideline](https://github.com/conventional-changelog-archived-repos/conventional-changelog-eslint/blob/master/convention.md).
It is really easy, when you always commit via `yarn commit`. Commitizen will guide you.

All PRs will be merged into the master branch. Travis and semantic release will check the commit messages and start
building a new release when the analysis of the latest commits will trigger that.

If you have questions just ping us on twitter or github.


## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
