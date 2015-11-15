# saci/req
HTTP requests and XPATH queries in a simpler way


##Install

Including to your current composer.json

Add this line into require in your composer.json:

"saci/req": "*"

and use autoload.php to include the classes


##Example usage
```php
require 'vendor/autoload.php'

$req=New \Saci\Req('http://www.google.com');

echo $req->body;

$req->query("//a[@class='gbgt']");
```
