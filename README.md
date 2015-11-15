# saci/req
HTTP requests and XPATH queries in a simpler way


##Install

Including to your current composer.json

Add this line into require in your composer.json:

```javascript
"saci/req": "*"
```
and use autoload.php to include the classes


##Example usage
```php
require 'vendor/autoload.php'

$req=New \Saci\Req('http://www.google.com');

$req->query("//a[@class='gbgt']");
```


###Documentation

####Input Parameters







------------------------------------
#####method
*Description:* Any HTTP Method: GET, POST, PUT, DELETE

*Type:* String

*Default:* GET








----------------------------
#####fields
*Description:* Fields for Post Requests

*Type:* String or Array

*Default:* GET



