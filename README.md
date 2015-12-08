#TODO

1. Create separate containers for
 - Application (index.php)
 - Database (MySQL)
 - Web server (Nginx)

2. Link 3 containers

3. Check if containers interact with each other by changing the database and see if it reflects changes on a browser.

# Preparing a working environment
## These steps might be required when building a docker image

### Using Ubuntu 14.04

```
sudo apt-get update
sudo apt-get install nginx
sudo apt-get install mysql-server
sudo mysql_install_db
sudo mysql_secure_installation
sudo apt-get install php5-fpm php5-mysql
Make sure `cgi.fix_pathinfo=0` in `/etc/php5/fpm/php.ini`
sudo service php5-fpm restart
```
Provision `nginx.conf`

Provision `sample.sql`

`sudo service nginx restart`

Reference
https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-14-04
