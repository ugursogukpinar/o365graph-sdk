#O365Graph-Sdk

## Introduction
O365Graph-Sdk is a php sdk for Microsoft Graph API which documented [**here**](https://graph.microsoft.io).
It allows to you manage your Office365 tenant with your daemon applications.
Before you start, you should read [**this**](https://msdn.microsoft.com/en-us/office/office365/howto/add-common-consent-manually) article to create credentials.

```php
    $credentials = [
        'tenant_id' => '<tenant_id>',
        'client_id' => '<client_id>,
        'client_secret' => '<client_secret>',
        'grant_type' => 'client_credentials',
        'resource' => 'https://graph.microsoft.com'
    ];
```


## Documentation

* [**Users**](https://github.com/docs/users.md)
