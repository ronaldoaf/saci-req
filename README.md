# saci-req
HTTP requests and XPATH queries in a simpler way
<br />
<br />

<b>Install</b>

Including to your current composer.json

Add this line into require in your composer.json:

"req/req": "*"

and use autoload.php to include the classes

require 'vendor/autoload.php'
<br />
<br />
<br />
<br />
<b>Example usage</b>
<br />

$req=New \Req\Req('http://www.google.com');

echo $req->body;
