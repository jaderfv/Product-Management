# ProductManagement
 Product and Supplier registration in PHP using Yii2 framework and Docker Server
 
 Part 1 - If you are installing e configuring the Yii2 without make a clone of Project, START HERE.
 
 Download and install Docker.

Make download Yii2 in https://www.yiiframework.com/download
	-Choose the option yii-basic-app-X.X.XX
	-Extract the folder, enter in "yii-advanced-app-X.X.XX" and you'll see a another folder called "basic", rename that to Yii2
	-Create a folder Docker in c:/users/yourUser/ 
	-Create a folder with the name of your project inside "c:/users/yourUser/Docker"
	-Copy the folder now called "Yii2" and paste inside folder of your project (c:/users/yourUser/Docker/yourProject)
	-Cut the folder "web" inside "Yii2" and paste in "c:/users/yourUser/Docker/yourProject", so you'll have "Yii2" and "web" in the same structure 
	-Copy and paste the file docker-compose.yml to inside "c:/users/yourUser/Docker/yourProject", the same structure where it's "Yii2" and "web"
	-Open the prompt(open windows's search and type CMD),go until the folder where it's the file docker-compose.yml("c:/users/yourUser/Docker/yourProject")
	and type "docker-compose up -d" for start machine docker to run php and apache.

-Open the file "index.php" in /web/index.php, and it must be changed that 3 lines follow:

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/../config/web.php';
		
change to: 

require __DIR__ . '/../../Yii2/vendor/autoload.php';
require __DIR__ . '/../../Yii2/vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/../../Yii2/config/web.php';

-Go to /config/web.php and edit the line 'cookieValidationKey' => '' to 'cookieValidationKey' => 'setyourkey'
-Now, you should allow to access throught of IP in the CRUD generator(http://localhost/web/index.php?r=gii),
in /config/web.php, uncomment the line 'allowedIPs', insert '*' in the end of array like 'allowedIPs' => ['127.0.0.1', '::1','*']

Part 2 - If you made a clone of project, START HERE

-Install the database that you chose.Inside the folder script contains the script of creation mysql for database ProductManagement and its tables(Product and Supplier)
-After installed the mysql, go to /config/db.php, so put host(pay attention, here should be to put, the ip that it's in the adapter docker network in "Control Panel\Network and Internet\Network Connections",
find a conection DockerNat, click with right button, in properties Ipv4...for example, my case was 10.0.75.1) and dbname(name givem to database).
-if a problem occurs saying that certain ip is not allowed, you must open MySql command line and type:
			
 mysql> grant all privileges on *.* to 'root'@'%' identified by '12345';
	mysql> flush privileges;
			
	Changing the user(root) for your user and password(12345) for your password.
 
 What's missing in the project?
 
 -create scripts to table Supplier and Product
 -create crud for both tables.
 
 It Will be done soon.
