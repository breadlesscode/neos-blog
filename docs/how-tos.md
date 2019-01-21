# How-Tos
*more comming soon*

## How to add a finisher to the comment form?
This packages uses the [breadlesscode/neos-commentable](https://github.com/breadlesscode/neos-commentable) package which is using the [neos/form-fusionrenderer](https://github.com/neos/form-fusionrenderer) package. You can easily add finishers like this:

```fusion
prototype(Breadlesscode.Blog:Form.BlogComment) [
    finisher {
        hereYourOwnFinisher = Neos.Form.Builder:EmailFinisher.Definition {
            // … the finisher options
        }
    }
]
```