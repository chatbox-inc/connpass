## Connpass API Proxy

Connpass APIのプロクシアプリケーションです。

composer install して任意の場所にindex.php と .htaccessを配置することで、
APIサーバを構築できます。

````
$ composer install chatbox-inc/connpass:dev-application
````



````
# index.php
<?php
require __DIR__."/../vendor/autoload.php"; // point to autoload.php
\Chatbox\Connpass\Application::boot();
````


````
# .htaccess
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
````


## API SERVER

API の仕様についてはこちら

http://connpass.com/about/api/



