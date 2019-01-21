# Eel Helpers

## Blog.getUserByIdentifier(*&lt;user-identifier&gt;*)
For quering users, e.g. the author.

```fusion
${ Blog.getUserByIdentifier(q(blogPost).property('author')) }
```