Installation
============

Get the source code
-------------------

Git clone
^^^^^^^^^

```
git clone https://github.com/FriendsOfCake/crud-demo-app.git
cd crud-demo-app
composer install
```

composer
^^^^^^^^

```
composer create-project -s dev friendsofcake/crud-demo-app
cd crud-demo-app
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
