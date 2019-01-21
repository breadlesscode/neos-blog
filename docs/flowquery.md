# FlowQuery-Oprations

## filterByTags(*&lt;tags&gt;*)
You can filter a collection of nodes by tags. Example:

```fusion
${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').fliterByTags(q(node).property('tags')).get() }
```

## filterByCategories(*&lt;categories&gt;*)
You can filter a collection of nodes by tags. Example:

```fusion
${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').filterByCategories(q(node).property('categories')).get() }
```

## filterByAuthor(*&lt;user-identifier&gt;*)
You can filter a collection of nodes by the author. Example:

```fusion
${ q(site).find('[instanceof Breadlesscode.Blog:Document.Post]').filterByAuthor(q(node).property('author')).get() }
```