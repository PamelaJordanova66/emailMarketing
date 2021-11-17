## About Email Marketing Tool

Email Marketing is a toll that helps you sending emails to customers.

## Technologies

Laravel 8  
MySql  
Bootstrap  
Mailtrap for sending emails  


## How to use the tool

First you slould create template.  
When creating the email message be aware that you can use values like first_email, last_email for including customer information. For example. Dear first_name.  
Available information: first_name, last_name, sex, email and birth_date.  
Then create a group and add the template you would like to use for that group of customers.  
When creating a group and you can schedule a date when you would like all the custumer from this group to receive a mail.  
Send Email Now button will send an email at that moment to all the customers from that group.  
After create your customers and add them to a whatever group you want.  

## Start the project

clone code  
php artisan key:generate  
composer update  
php artisan migrate  
add mail variables in .env  
create a user  
create a template then group then the customers  

### Command

SendScheduleEmail - Command for scheduled email for custumers group that runs once a day.  
Run php artisan scheduled-emails:send for testing that command.  

