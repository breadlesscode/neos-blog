# Neos Blog 
[![Latest Stable Version](https://poser.pugx.org/breadlesscode/neos-blog/v/stable)](https://packagist.org/packages/breadlesscode/neos-blog)
[![Downloads](https://img.shields.io/packagist/dt/breadlesscode/neos-blog.svg)](https://packagist.org/packages/breadlesscode/neos-blog)
[![License](https://img.shields.io/github/license/breadlesscode/neos-blog.svg)](LICENSE)
[![GitHub stars](https://img.shields.io/github/stars/breadlesscode/neos-blog.svg?style=social&label=Stars)](https://github.com/breadlesscode/neos-blog/stargazers)
[![GitHub watchers](https://img.shields.io/github/watchers/breadlesscode/neos-blog.svg?style=social&label=Watch)](https://github.com/breadlesscode/neos-blog/subscription)

This Neos CMS plugin is for a simple blog functionality.

## Features
 - Blog categories
 - Tags
 - Comments
 - Listing with pagination


## Installation
Most of the time you have to make small adjustments to a package (e.g., the configuration in Settings.yaml). Because of that, it is important to add the corresponding package to the composer from your theme package. Mostly this is the site package located under Packages/Sites/. To install it correctly go to your theme package (e.g.Packages/Sites/Foo.Bar) and run following command:

```bash
composer require breadlesscode/neos-blog --no-update
```

The --no-update command prevent the automatic update of the dependencies. After the package was added to your theme composer.json, go back to the root of the Neos installation and run composer update. Your desired package is now installed correctly.
 
## Sponsors

<p >
    <a href="https://www.noerdisch.de" target="_blank">
        <img src="https://cdn.rawgit.com/markusguenther/abe70d34f4a4621aed0ef504c5d0192b/raw/5bf0f3df328e58ba7aad067a56cbd1c15ef69491/logo_full.svg" width="200">
    </a>
</p>

## Examples
### List latest posts
```
prototype(Vendor.Xy:RecentBlogPosts) < prototype(Breadlesscode.Blog:Component.PostList) {
    paginated = false
    itemsPerPage = 5
    collection = ${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').sort('datePublished', 'DESC').get() }
}
```

## Reference
Reference of some parts of the package.

### FlowQuery-Oprations
### filterByTags(*&lt;tags&gt;*)
You can filter a collection of nodes by tags. Example:
```
${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').fliterByTags(q(node).property('tags')).get() }
```
### filterByCategories(*&lt;categories&gt;*)
You can filter a collection of nodes by tags. Example:
```
${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').filterByCategories(q(node).property('categories')).get() }
```

### Eel Helper
#### Blog.getUserByIdentifier(*&lt;user-identifier&gt;*)
For quering users, e.g. the author.
```neos-fusion
${ Blog.getUserByIdentifier(q(blogPost).property('author')) }
```

### NodeTypes
All node types that this package provides. 

#### Document 
 - [Breadlesscode.Blog:Document.Post](Configuration/NodeTypes.Document.Post.yaml) - Blog post
    - [Breadlesscode.Blog:Mixin.Authorable](Configuration/NodeTypes.Mixin.Authorable.yaml)
    - [Breadlesscode.Blog:Mixin.PublicationDate](Configuration/NodeTypes.Mixin.PublicationDate.yaml)
    - [Breadlesscode.Blog:Mixin.Taggable](Configuration/NodeTypes.Mixin.Taggable.yaml)
    - [Breadlesscode.Blog:Mixin.Categorisable](Configuration/NodeTypes.Mixin.Categorisable.yaml)
    - [Breadlesscode.Commentable:Mixin.Commentable](https://github.com/breadlesscode/neos-commentable/blob/master/Configuration/NodeTypes.Mixin.Commentable.yaml)
 - [Breadlesscode.Blog:Document.CategoryBlog](Configuration/NodeTypes.Document.Category.yaml) - Category
 - [Breadlesscode.Blog:Document.Tag](Configuration/NodeTypes.Document.Tag.yaml) - Tag

#### Content
 - [Breadlesscode.Blog:Content.PostListing](Configuration/NodeTypes.Content.PostListing.yaml) - Listing of blog posts
    - [Breadlesscode.Blog:Mixin.Limit](Configuration/NodeTypes.Mixin.Limit.yaml)
    - [Breadlesscode.Blog:Mixin.Paginate](Configuration/NodeTypes.Mixin.Paginate.yaml)
    - [Breadlesscode.Blog:Mixin.SelectedPosts](Configuration/NodeTypes.Mixin.SelectedPosts.yaml)
    - [Breadlesscode.Blog:Mixin.SelectedCategories](Configuration/NodeTypes.Mixin.SelectedCategories.yaml) 


### Important Fusion-Prototypes
 - [Breadlesscode.Blog:Component.PostListItem](Resources/Private/Fusion/Component/PostListItem.fusion) - Singel list item for listing element
 - [Breadlesscode.Blog:Document.Post](Resources/Private/Fusion/Document/Post.fusion) - The post document node
 - [Breadlesscode.Blog:Document.Category](Resources/Private/Fusion/Document/Category.fusion) - The category document node
 - [Breadlesscode.Blog:Document.Tag](Resources/Private/Fusion/Document/Tag.fusion) - The tag document node

### Configuration
[Setting.yaml](Configuration/Settings.yaml)
```yaml
Breadlesscode:
  Blog:
    comments:
      confirmation:
        # Confirmation message, if null confirmation message is disabled
        message: 'Breadlesscode.Blog:Form.BlogComment:confirmation.message'
      notification:
        # enable mail on new comment
        sendMail: false
        # email subject
        subject: 'New Comment!'
        # the notification mail template path
        template: 'resource://Breadlesscode.Blog/Private/Email/comment_notification.html'
        # which is the recipient of the notification email
        recipient:
          email: null
          name: null
```

#### SwiftMailer
[Settings.yaml](https://github.com/neos/swiftmailer/blob/master/Configuration/Settings.yaml)
```yaml
Neos:
  SwiftMailer:
    transport:
      type: 'Swift_MailTransport'
      arguments: ~
      options: []

# Example settings for sending emails via SMTP / SSL:
#
# SwiftMailer:
#   transport:
#     type: 'Swift_SmtpTransport'
#     options:
#       host: 'smtp.example.com'
#       port: 465
#       username: 'myaccount@example.com'
#       password: '5js9j1lkjs8'
#       localDomain: 'example.com'

# Example settings for "sending" emails to an mbox file:
#
# SwiftMailer:
#   transport:
#     type: 'Neos\SwiftMailer\Transport\MboxTransport'
#     options:
#       mboxPathAndFilename: '%FLOW_PATH_DATA%/Persistent/sent-mail'

```

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
