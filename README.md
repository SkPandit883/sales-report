# CodeIgniter 4 Sales Management System
## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:
Also Make sure that `composer` installed on your local machine [official site](https://getcomposer.org/).

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Steps for Project Setup

<h6>Step 1</h6>

Clone git repository to your local machine `https://github.com/SkPandit883/sales-report.git`.
<h6>Step 2.</h6>

<!-- ## Steps for Project Setup -->
Copy `env` to `.env` ,uncomment lines and tailor for your app, specifically the baseURL
and any database settings[ if `.env` does not exist create one ].
<h6>Step 3.</h6>

run  `composer install` to install all dependencies.
if you get any kind of error about dependencies try `composer install --with-all-dependencies` or `composer install --ignore-platform-reqs`


<h6>Step 4.</h6>
<!-- ## Steps for Project Setup -->

create database `sales_management` on your local server.


<h6>Step 5.</h6>
<!-- ## Steps for Project Setup -->

run `php spark migrate --all` for  creating  all the required tables
<h6>Step 6.</h6>
<!-- ## Steps for Project Setup -->

run `php spark db:seed DatabaseSeeder` to populate data initially.
this command create data in `categories`,`products`,`sales`,`sales_details` tables.
<h6>Step 7.</h6>
<!-- ## Steps for Project Setup -->

Finally wait is over.run `php spark serve` to run your project.
your project will be running on your local `server` at port `8080`.try to 
follow this link `http://localhost:8080/` to view your running project.


<!-- ## Follow official documentation to explore about Codeigniter/4 -->
[Read more about codeigniter](https://www.codeigniter.com/user_guide/index.html)




