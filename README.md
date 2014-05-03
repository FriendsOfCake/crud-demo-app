Installation
============

Get the source code
-------------------

```
git clone git@github.com:jippi/demo-app.git
cd demo-app
composer install
```

Setup the database
------------------

Import ``App/Config/db.sql`` into your database.

Modify ``App/app.php`` in the `Datasources` section to reflect your own database.

Create a webserver
------------------

```
php -S 0.0.0.0:9999 -t webroot/ index.php
```

Access the website
------------------

Go to `http://localhost:9999/posts`
