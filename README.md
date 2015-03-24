[![WebSight Designs](http://www.websightdesigns.com/img/headerlogo-light.png)](http://www.websightdesigns.com)

# Collaborate

This is a tool for collaboration using Ace.js and Mozilla's Together.js.

# Demo

Visit the online demo at [http://websightdesigns.com/dev/lab/collaborate/](http://websightdesigns.com/dev/lab/collaborate/)

# Requirements

This web application is intended to be cloned and placed on a web server running Apache, PHP and MySQL. Currently only Linux is supported, though we intend to add in support for Windows web servers in the future. Version 5.4+ of PHP is recommended, we developed this application on PHP 5.4. Version of 5+ MySQL is recommended, we developed this application on MySQL 5. The MySQL user with access to the database should be assigned only the SELECT, INSERT, UPDATE, and DELETE priveleges.

# Install

To install the app, copy over the `example.config.php` file to `config.php` and set your MySQL login information in `config.php`. Then use the SQL in `install.sql` to create the database. This example uses the table name `colab` but you can change this to another table name if you like.

# Tools Used

- [Ace](http://ace.c9.io/) - embeddable code editor
- [TogetherJS](https://togetherjs.com/) - TogetherJS by Mozilla
- [jQuery](http://jquery.com/) - jQuery 1.9.0
- [Chosen plugin](http://harvesthq.github.io/chosen/) - Chosen plugin by Harvest

# More Information

Visit the webSIGHTdesigns website at [http://websightdesigns.com/](http://websightdesigns.com/)
