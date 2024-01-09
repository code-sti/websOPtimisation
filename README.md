#websOptimisation

It is a test project to check the basic skills of laravel

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Getting Started](#getting-started)
  - [Installation](#installation)
- [Usage](#usage)
- [Time took](#Timetook)


## Overview

-this project contains basic Laravel authentication in which admin can choose multiple user and trigger email notification

## Features
```
laravel default authentication: where disable register 
added 1 million data in the users with the role:users
show that data using data table
-made one module where using notification class and jobs to trigger email notification
-show a very simple dropdown of all the users
-took care of optimization of query and also logged error
-used mailtrap
```

## Getting Started


### Installation

Provide step-by-step instructions on how to install your project.

```bash
# Example installation steps
git clone https://github.com/yourusername/yourproject.git
cd your project
composer install
cp .env.example .env
php artisan key: generate
# Configure your .env file
php artisan migrate
php artisan serve
after running these two seeder
  `php artisan db:seed --class="AdminSeeder"`
  `php artisan db:seed --class="UserSeeder"` 
**UserSeeder**: has 1 lakh data so it will take time to add
before triggering any mail connect it to connection either Mailtrap or mailgun or any other mail driver

```
### Usage
can be used to send mail notifications with custom messages to an ample amount of selected users

### Timetook 
```
Setup: 30 minutes
Default Authentication and making all blade file and disable registration ability: 45 minutes
Making both seeders: 15 minutes
User module to show users with the use of data tables: 30 minutes
Make trigger module with a simple form and added jobs and notification class to send email: 1.25 hour

this time also included optimization as well

didn't able to add more design-related things as of now just focused on functionality
```
