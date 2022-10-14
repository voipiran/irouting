

# Voipiran irouting-dev Developer Version
voipiran call center stats

## path Uploaded files
> storage/app/ 

## Setup
```
$ cd /var/www
$ mkdir voipiran //ignore ig voipiran dir exists
$ cd voipiran
$ add your ssh key to authorized_ssh in ~/.ssh
$ git clone git@github.com:voipiran/irouting-dev.git
$ cd irouting-dev
$ cp .env.example .env
$ composer install // install the composer if is not installed
$ mkdir /var/www/html/voipiran // ignore if /html/voipiran exists
$ mkdir /var/www/html/voipiran/irouting-dev
$ cd  /var/www/voipiran/irouting-dev/public 
$ mv ./.[!.]* /var/www/html/voipiran/irouting-dev

$ ln -s /var/www/voipiran/irouting-dev/storage/app storage  // craete shortcut to access from public to storage_path

$ cd ..
$ rm -rf public 
$ chmod -R 777 storage
$ php artisan cache:clear
$ composer dump-autoload
$ vim /etc/httpd/conf.d/issabel-htaccess.conf 
   // add folowing command top of the issabel-htaccess.conf  file
   <Directory "/var/www/html/voipiran/irouting-dev">
        AllowOverride All
   </Directory>
$ systemctl restart httpd
$ done
```