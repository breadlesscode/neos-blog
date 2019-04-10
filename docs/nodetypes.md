# NodeTypes
All node types the package provides.

## Document
### `Breadlesscode.Blog:Document.Post`
```yaml
'Breadlesscode.Blog:Document.Post':
  superTypes:
    'Neos.Neos:Document': true
    'Breadlesscode.Blog:Mixin.Authorable': true
    'Breadlesscode.Blog:Mixin.PublicationDate': true
    'Breadlesscode.Blog:Mixin.RelatedPosts': false
    'Breadlesscode.Blog:Mixin.Taggable': true
    'Breadlesscode.Blog:Mixin.Categorisable': true
    'Breadlesscode.Commentable:Mixin.Commentable': true
```

### `Breadlesscode.Blog:Document.Author`
```yaml
'Breadlesscode.Blog:Document.Author':
  superTypes:
    'Neos.Neos:Document': true
```


### `Breadlesscode.Blog:Document.CategoryBlog`
```yaml
'Breadlesscode.Blog:Document.CategoryBlog':
  superTypes:
    'Neos.Neos:Document': true
```

### `Breadlesscode.Blog:Document.Tag`
```yaml
'Breadlesscode.Blog:Document.Tag':
  superTypes:
    'Neos.Neos:Document': true
```

## Content
### `Breadlesscode.Blog:Content.PostListing`
```yaml
'Breadlesscode.Blog:Content.PostListing':
  superTypes:
    'Neos.Neos:Content': true
    'Breadlesscode.Blog:Mixin.Limit': true
    'Breadlesscode.Blog:Mixin.Paginate': true
    'Breadlesscode.Blog:Mixin.SelectedPosts': true
    'Breadlesscode.Blog:Mixin.SelectedCategories': true
```