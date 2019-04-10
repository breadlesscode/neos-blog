# Eel Helpers

## Blog.getUserByIdentifier(*&lt;user-identifier&gt;*)
For querying users, e.g. the author.

```fusion
${ Blog.getUserByIdentifier(q(blogPost).property('author')) }
```