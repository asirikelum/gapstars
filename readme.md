Instruction:

1. Add .htaccess file for the rootpath and add following code

RewriteEngine On
RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
RewriteRule ^(.*)$ http://%1/$1 [R=301,L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

2. Download the Database from the "gs_test_mysql_db.sql"
3. Config Database access in applications/config/database.php
4. Create a instagram Application and provide the credentials https://www.instagram.com/developer/


** I have used the Instagram Sandbox for this application so it will not provide data for all the public access. To send this application live it will take sometime. Therefor I request you to create a Instagram Application or Send me the test Instagram id to link with my Sandbox 


5. Provide the credentials applications/controllers/Insta.php



 // initialize class
        $this->instagram = new Instagram(array(
            'apiKey'      => 'your apiKey here',
            'apiSecret'   => 'your app apiSecret here',
            'apiCallback' => 'http://'.$_SERVER['HTTP_HOST'].'/insta/insta_success' // 
        ));
        
6. Enjoy the application...       



Further Development:

Show Followers Growth and Show Post Impression Growth as a report

Show Different Post according to the Hash Tags

Can Add a user login and allow different users to access the application


Framework : CodeIgniter 3
API : Instagram
Jquery
JavaScript 
