# Configuration

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

## Pagination

See this documentation: [https://github.com/breadlesscode/neos-listable#configuration](https://github.com/breadlesscode/neos-listable#configuration)

## (Swift)Mailer

See this documentation: [https://swiftmailer-for-flow.readthedocs.io/en/latest/#configuration](https://swiftmailer-for-flow.readthedocs.io/en/latest/#configuration)