# Fusion prototypes

**Attention:** All Fusion prototypes are prefixed with `Breadlesscode.Blog:`. You can't use `Component.PostList` e.g. in your fusion code. You have to use `Breadlesscode.Blog:Component.PostList`.

## `Component.CommentSection`
This prototype displays the comment form and the comments.

### Properties

| Name         | Default value | Description |
| ------------ | ------------- | ----------- |
| formPosition | `'top'`       | Defines the position of the comment form. If it's set to `'top'` it's displayed on top of the comments. If the value is `'bottom'`, it's the other way round. |

## `Component.PostList`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                                                              | Description                                                                            |
| ------------ | -------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| collection   | `${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').get() }` | Should contain all post items you want to display                        |
| headline     | `${q(documentNode).property('title')}`                                     | Headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                                                        | Defines how many items/posts per page are shown                                        |
| paginated    | `true`                                                                     | List pagination flag, if is false, pagination is disabled                              |


## `Component.PostList.Author`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| author       | `${ documentNode }`                    | Filters posts by author (user identifier)                                              |
| headline     | `${q(documentNode).property('title')}` | Headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| paginated    | `true`                                 | List pagination flag, if is false, pagination is disabled                              |

## `Component.PostList.Category`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                          | Description                                                                           |
| ------------ | -------------------------------------- | ------------------------------------------------------------------------------------- |
| category     | `${ documentNode }`                    | Filters posts by one or more categories                                               |
| headline     | `${q(documentNode).property('title')}` | Headline displayed ontop of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                       |
| paginated    | `true`                                 | List pagination flag, if is false, pagination is disabled                             |

## `Component.PostList.Tag`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| tag          | `${ documentNode }`                    | Filters posts by tag or tags                                                           |
| headline     | `${q(documentNode).property('title')}` | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| paginated    | `true`                                 | List pagination flag, if is false, pagination is disabled                              |

## `Component.PostList.Item`
This prototype represents one item in the post list.

### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| excerpt      | `${ q(item).property('excerpt') }`     | This property is used for a small sub text under the listitem headline                 |
| renderer     | `${q(documentNode).property('title')}` | Here you can override the complete redering of a single list item                      |
