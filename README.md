# Getting started

The quickest way to get started with this simple php store catalog is to have the following setup.

* Linux
* PHP
* MySQL
* Apache

# Database Sample

There is a database sample in the database folder and there are two scripts in there.

1. The simple database (i.e. `php-store.sql`). This database is the simple products overview and what this project's front end is currently working off of.
2. The advanced database, the ideal database to use (i.e. `advanced-php-store.sql`). This is the database that would likely be used in a more real world situation with bridging tables for categories to allow for multiple categories. Bridging tables for images, to allow multiple images for games and so on.

# Running the application

There is a `deploy.sh` file that can be used as a template to get this code onto the apache webserver (in the correct directory). You will also need to modify the connection.php settings with whatever you have for your database.

# Images

Unfornately, I am not familiar  PHP, and am not yet able to upload images for the game. Currently there is just a place holder image for each item added to the store.

# Test site
You can check out a working version of this code over at: https://projects.newteq.co.za/php-store/