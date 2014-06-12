![Homework Hunt](http://homeworkhunt.com/img/logo-dark.png)
=========

Homework Hunt is a state of the art site that provides two primary services.

  - Sharing homework.
  - Finding answers to assignments.

The officially hosted site can be found on [www.HomeworkHunt.com] and is hosted on an optimized Nginx server but we have integrated all the neccesary `.htaccess` files to make setup on an Apache server seamless.

Our Story
----

The Homework Hunt project was founded in June of 2014 when [Isaiah Turner], attended [WWDC]. With the help of [Luke Jarboe] and serveral others, it has sense grown to become a powerful and comprehensive service for sharing and finding homework answers.

Version
----

0.2 Beta

Credits
-----------

Homework Hunt relies on a number of projects to work properly. Several are in bold indicating they must be configured on your server before installing Homework Hunt.

* [Agolia] - Hosted cloud search as a service.
* **[MySQL]** - The world's most popular open source database.
* **[PHP]** - PHP is a popular scripting language that is especially suited to web development.
* **[Composer]** - Dependency Management for PHP.
* [Twitter Bootstrap] - A sleek, intuitive, and powerful mobile first front-end framework.
* [Piwik] - Piwik is a open source web analytics application that runs on a PHP/MySQL server.
* [Font Awesome] - Font Awesome gives you scalable vector icons that can be customized.
* [jQuery] - jQuery is a fast, small, and feature-rich JavaScript library.
* [Apache] - A secure, efficient and extensible server that provides HTTP services.
* [NGINX] - NGINX is the most popular open source web server for high-traffic websites

Installation
--------------

See the Credits for software installation prerequisites.

```sh
git clone https://github.com/IsaiahJTurner/HomeworkHunt.git homeworkhunt
cd homeworkhunt
composer install
cp config-sample.php sample.php
cd analytics
composer install
```

To finish the installation, open config.php and enter your own API keys and database connection settings. If you would like to set up MySQL integration with Algolia, please follow these steps.

  1. Move jdbc-connector.sh and config.sample.json to a new directory that is not accessible by the web.
  2. Rename config.sample.json to config.json.
  3. Open config.json and enter the requested data.
  4. `cd` to the directory containing the jdbc-connector.sh script.
  5. Execute `chmod +x jdbc-connector.s` in the terminal.
  6. Ececute `./jdbc-connector.sh config.json` in the terminal.


License
----

Copyright 2014 Isaiah Turner


**Open Source, Hell Yeah!**

[www.HomeworkHunt.com]:http://homeworkhunt.com
[Agolia]:https://www.algolia.com/
[Composer]:https://getcomposer.org/
[MySQL]:http://www.mysql.com/
[PHP]:http://www.php.net/
[Piwik]:http://piwik.org/
[Twitter Bootstrap]:http://twitter.github.com/bootstrap/
[Font Awesome]:http://fortawesome.github.io/Font-Awesome/
[jQuery]:http://jquery.com
[Apache]:http://httpd.apache.org/
[NGINX]:http://nginx.org/
[Isaiah Turner]:http://isaiahjturner.com/
[Luke Jarboe]:http://lukejarboe.com/
[WWDC]:https://developer.apple.com/WWDC/
