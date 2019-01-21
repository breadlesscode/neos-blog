# Fusion prototypes

## Lists and list items

### `Breadlesscode.Blog:Component.PostList`
This prototype is for displaying all kind of post lists.

#### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| collection   | `${ [] }`                              | this property should contain all post items you want to display                        |
| headline     | `${q(documentNode).property('title')}` | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| pagined      | `true`                                 | List pagination flag, if is false, pagination is disabled                              |


### `Breadlesscode.Blog:Component.PostList.Author`
This prototype is for displaying all kind of post lists.

#### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| author       | `${ documentNode }`                    | this property is for the author or authors which should filtered by                    |
| headline     | `${q(documentNode).property('title')}` | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| pagined      | `true`                                 | List pagination flag, if is false, pagination is disabled                              |

### `Breadlesscode.Blog:Component.PostList.Category`
This prototype is for displaying all kind of post lists.

#### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| category     | `${ documentNode }`                    | this property is for the cetegory or categories which should filtered by               |
| headline     | `${q(documentNode).property('title')}` | headline displayed ontop of this list. Can be disabled by setting property to `false`  |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| pagined      | `true`                                 | List pagination flag, if is false, pagination is disabled                              |

### `Breadlesscode.Blog:Component.PostList.Tag`
This prototype is for displaying all kind of post lists.

#### Properties
| Name         | Default value                          | Description                                                                            |
| ------------ | -------------------------------------- | -------------------------------------------------------------------------------------- |
| tag          | `${ documentNode }`                    | this property is for the tag or tags which should filtered by                          |
| headline     | `${q(documentNode).property('title')}` | headline displayed on top of this list. Can be disabled by setting property to `false` |
| itemsPerPage | `5`                                    | Defines how many items/posts per page are shown                                        |
| pagined      | `true`                                 | List pagination flag, if is false, pagination is disabled                              |