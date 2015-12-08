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

`sudo nano /etc/nginx/sites-available/default`:
```
server {
    listen 80 default_server;
    listen [::]:80 default_server ipv6only=on;

    root /usr/share/nginx/html;
    index index.php index.html index.htm;

    server_name localhost;

    location / {
        try_files $uri $uri/ =404;
    }

    error_page 404 /404.html;
    error_page 500 502 503 504 /50x.html;
    location = /50x.html {
        root /usr/share/nginx/html;
    }

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

`sudo service nginx restart`

# Steps coming soon
- make a sample SQL file
- import sample SQL file into mysql-server
- create `index.php` that reads info from a DB

Reference
https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-14-04
