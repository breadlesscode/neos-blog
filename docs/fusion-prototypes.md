# Fusion prototypes

**Attention:** All Fusion prototypes are prefixed with `Breadlesscode.Blog:`. You cant use `Component.PostList` e.g. in your fusion code. You have to use `Breadlesscode.Blog:Component.PostList`.

## `Component.CommentSection`
This prototype displays the commenting form and the comments.

### Properties

| Name         | Default value | Description |
| ------------ | ------------- | ----------- |
| formPosition | `'top'`       | this property defines the position of the commenting form. If its set to `'top'` its displayed on top of the comments. If the value is `'bottom'`, its the other way round. |

## `Component.PostList`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                                                              | Description                                                                            |
| ------------ | -------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| collection   | `${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').get() }` | this property should contain all post items you want to display                        |
| headline     | `${q(documentNode).property('title')}`                                     | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                                                        | Defines how many items/posts per page are shown                                        |
| paginated    | `true`                                                                     | List pagination flag, if is false, pagination is disabled                              |


## `Component.PostList.Author`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| author       | `${ documentNode }`                    | this property is for the author (user identifier) which should filtered by                    |
| headline     | `${q(documentNode).property('title')}` | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| paginated    | `true`                                 | List pagination flag, if is false, pagination is disabled                              |

## `Component.PostList.Category`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                          | Description                                                                           |
| ------------ | -------------------------------------- | ------------------------------------------------------------------------------------- |
| category     | `${ documentNode }`                    | this property is for the cetegory or categories which should filtered by              |
| headline     | `${q(documentNode).property('title')}` | headline displayed ontop of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                       |
| paginated    | `true`                                 | List pagination flag, if is false, pagination is disabled                             |

## `Component.PostList.Tag`
This prototype is for displaying all kind of post lists.

### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| tag          | `${ documentNode }`                    | this property is for the tag or tags which should filtered by                          |
| headline     | `${q(documentNode).property('title')}` | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| paginated    | `true`                                 | List pagination flag, if is false, pagination is disabled                              |

## `Component.PostList.Item`
This prototype represents one item in the post list.

### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| tag          | `${ documentNode }`                    | this property is for the tag or tags which should filtered by                          |
| headline     | `${q(documentNode).property('title')}` | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| paginated    | `true`                                 | List pagination flag, if is false, pagination is disabled                              |