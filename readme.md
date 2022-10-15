

# Voipiran irouting Developer Version
voipiran irouting

## path Uploaded files
> storage/app/ 

## Setup
```
$ cd /var/www
$ mkdir voipiran //ignore ig voipiran dir exists
$ cd voipiran
$ add your ssh key to authorized_ssh in ~/.ssh
$ git clone git@github.com:voipiran/irouting-dev.git irouting
$ cd irouting
$ cp .env.example .env 
$ in `.env` fill the DB_USERNAME,DB_PASSWORD,DB_DATABASE,DB_DATABASE2,API
$ // install the composer if is not installed then run bellow command
$ composer install
$ mkdir /var/www/html/voipiran // ignore if /html/voipiran exists
$ mkdir /var/www/html/voipiran/irouting
$ cd  /var/www/voipiran/irouting/public 
$ mv ./.[!.]* /var/www/html/voipiran/irouting
$ cd ..
$ rm -rf public 
$ chown -R asterisk:root storage
$ chmod -R 777 storage
$ php artisan cache:clear
$ composer dump-autoload
$ cd /var/www/html/voipiran/irouting
$ ln -s /var/www/voipiran/irouting/storage/app storage  
$ vim /etc/httpd/conf.d/issabel-htaccess.conf 
   // add folowing command top of the issabel-htaccess.conf  file
   <Directory "/var/www/html/voipiran/irouting">
        AllowOverride All
   </Directory>
$ systemctl restart httpd 
$ done, you should see the app on `serverip/voipiran/irouting`
```