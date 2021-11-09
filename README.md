# Installation

## Get the source code

### composer

```
composer create-project friendsofcake/crud-demo-app
cd crud-demo-app
```

## Setup the database

Modify ``config/app_local.php`` in the `Datasources` section to reflect your own database.

Create the database schema `bin/cake migrations migrate`

Seed the database `bin/cake migrations seed`

## Create a webserver

```
php -S 0.0.0.0:9999 -t webroot/ index.php
```

## Access the website

Go to `http://localhost:9999/posts`
