# How to Setup Development Environment?
### Prerequisites
1. Mysql Server
2. PHP version 7
1. Composer

### Steps to setup local dev environment
1. Clone the repository.
1. Navigate to the project directory in a command prompt
1. enter the command "***composer install***"
1. Make sure you have the mysql server up and running.
1. Login to mysql server and create a database named "***sep_las***"
1. Comment out the database configurations of the remote server and uncomment the configurations related to the localhost in the "***/config/databases.php***" file. (instructions will be there within the file)
1. After a succesfull installation enter the commands below
	1. To migrate the tables into the databse enter "***php artisan migrate***"
	1. To create the default data, enter "***php artisan DB:seed***"
1. After completing the above enter "***php artisan serve***" to launch the application
1. Open a web browser and access "***localhost:8000***" for the application.
1. To execute unit tests enter "***php artisan test***"

### Developer Info
Bhagya Rathnayake
Hasara Abeywardhane
Kaushalya Abeywardhane
Perinpanayagam Mayooran
Vibhath Algama
