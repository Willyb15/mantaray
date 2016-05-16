###Yik Yak Clone
###Steps to setup virtual host with PHP
```
sudo /etc/hosts
//add what you want
127.0.0.1 local-mantaray.com
```
###Go into v-hosts config and update
```
sudo vi /etc/hosts/apache2/extra/httpd-vhosts.conf
```
```
<VirtualHost *:80>
  ServerName local-mantaray.com
  DocumentRoot /Users/Bryant/Desktop/DigitalCrafts/unit4/mantaray

  <Directory "/Users/Bryant/Desktop/DigitalCrafts/unit4/mantaray">
    Allow from all
    Options +Includes +Indexes +FollowSymLinks
    AllowOverride all
    Require all granted
  </Directory>
</VirtualHost>
```
###Restart Apache
```
sudo apache ctl restart

/this one tests

sudo apchectl -t
```
###Include compass boilerplate

####Insdie mqSQL created mantaray database
####Added users posts and votes tables

