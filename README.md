# CSS32_Project

Go to /client and Install package form package.json 

```bash
  npm install  
```

Go to /server and run this command make sure you have Docker on your machine
(Docker image used in this project

[MySQL](https://hub.docker.com/_/mysql) and [PhpMyAdmin](https://hub.docker.com/_/phpmyadmin))

```bash
  docker-compose up -d
```
Go to your browser and type [http://localhost:8080/](http://localhost:8080/) User = root ,password is “CSS326” for access phpmyadmin

to connect to database don’t forget to install php-MySQL
phpmyadmin will be runing at
<http://localhost:8080/>
## Start testing server
Go to root directory and run this command for start php server
```bash
  php -S localhost:8000
```
you can choose any free port
