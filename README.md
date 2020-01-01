# IITR Databse
A winter project for maintaining all the course related materials for iitr students. 

A few guidelines on how to use the project -

1. The server connection configuration is mentioned in db.php .

2. If you want to have a look on how this website will work once compiled then have a look on video link in extras/how_it_works. The website has been hosted at 000webhost. https://iitr-database.000webhostapp.com/index.html .

3. You would need to create few tables with following configuration in mysql. Following are tablenames and their configuration -

doc

	+-----------+--------------+------+-----+---------+-------+
	| Field     | Type         | Null | Key | Default | Extra |
	+-----------+--------------+------+-----+---------+-------+
	| branch    | varchar(55)  | NO   |     | NULL    |       |
	| year      | varchar(2)   | NO   |     | NULL    |       |
	| semester  | varchar(2)   | NO   |     | NULL    |       |
	| files     | varchar(100) | NO   |     | NULL    |       |
	| subject   | varchar(10)  | NO   |     | NULL    |       |
	| downloads | int(11)      | YES  |     | NULL    |       |
	+-----------+--------------+------+-----+---------+-------+


	create table doc(branch varchar(55) not null, year varchar(2) not null, semester varchar(2) not null, files varchar(100) not null, subject varchar(10) not null, downloads int );

personalize
  
	+--------+----------------+------+-----+---------+-------+
	| Field  | Type           | Null | Key | Default | Extra |
	+--------+----------------+------+-----+---------+-------+
	| email  | varchar(50)    | NO   |     | NULL    |       |
	| data   | varchar(10000) | NO   |     | NULL    |       |
	| type   | varchar(20)    | NO   |     | NULL    |       |
	| parent | varchar(1000)  | NO   |     | NULL    |       |
	| occur  | datetime       | NO   |     | NULL    |       |
	+--------+----------------+------+-----+---------+-------+
	
	create table personalize( email varchar(50) not null, data varchar(10000) not null, type varchar(20) not null, parent varchar(1000) not null, occur datetime not null); 
	
  
subjects

	+------------+-------------+------+-----+---------+-------+
	| Field      | Type        | Null | Key | Default | Extra |
	+------------+-------------+------+-----+---------+-------+
	| branch     | varchar(55) | NO   |     | NULL    |       |
	| year       | varchar(2)  | NO   |     | NULL    |       |
	| semester   | varchar(2)  | NO   |     | NULL    |       |
	| number     | varchar(2)  | YES  |     | NULL    |       |
	| subject_1  | varchar(15) | YES  |     | NULL    |       |
	| subject_2  | varchar(15) | YES  |     | NULL    |       |
	| subject_3  | varchar(15) | YES  |     | NULL    |       |
	| subject_4  | varchar(15) | YES  |     | NULL    |       |
	| subject_5  | varchar(15) | YES  |     | NULL    |       |
	| subject_6  | varchar(15) | YES  |     | NULL    |       |
	| subject_7  | varchar(15) | YES  |     | NULL    |       |
	| subject_8  | varchar(15) | YES  |     | NULL    |       |
	| subject_9  | varchar(15) | YES  |     | NULL    |       |
	| subject_10 | varchar(15) | YES  |     | NULL    |       |
	+------------+-------------+------+-----+---------+-------+
	create table subjects(branch varchar(55) not null, year varchar(2) not null, semester varchar(2) not null, number varchar(2), subject_1 varchar(15), subject_2 varchar(15), subject_3 varchar(15), subject_4 varchar(15), subject_5 varchar(15), subject_6 varchar(15), subject_7 varchar(15), subject_8 varchar(15), subject_9 varchar(15), subject_10 varchar(15) );
  
users

	+---------------+--------------+------+-----+-----------------------------+----------------+
	| Field         | Type         | Null | Key | Default                     | Extra          |
	+---------------+--------------+------+-----+-----------------------------+----------------+
	| id            | int(11)      | NO   | PRI | NULL                        | auto_increment |
	| fname         | varchar(50)  | NO   |     | NULL                        |                |
	| lname         | varchar(50)  | NO   |     | NULL                        |                |
	| email         | varchar(50)  | NO   |     | NULL                        |                |
	| password      | varchar(100) | NO   |     | NULL                        |                |
	| enroll        | varchar(10)  | YES  |     | NULL                        |                |
	| hash          | varchar(50)  | NO   |     | NULL                        |                |
	| active        | tinyint(1)   | NO   |     | 0                           |                |
	| profile_photo | varchar(500) | YES  |     | default_profile_photo.jpeg  |                |
	| branch        | varchar(55)  | YES  |     | NULL                        |                |
	| year          | varchar(2)   | YES  |     | NULL                        |                |
	| semester      | varchar(2)   | YES  |     | NULL                        |                |
	+---------------+--------------+------+-----+-----------------------------+----------------+

	create table users(id int not null auto_increment, fname varchar(50) not null, lname varchar(50) not null, email varchar(50) not null, password varchar(100) not null, enroll varchar(10), hash varchar(50) not null, active tinyint not null set default 0, profile_photo varchar(500) set default 'default_profile_photo.jpeg', branch varchar(55), year varchar(2), semester varchar(2) );

  Here default_profile_photo.jpeg is a file in the repository
  
4. The project uses mail() of php. To confiure mail() in your server follow these instructions-

Gmail uses https:// (it's hyper text secure) so first let us install ca-certificates .
In the terminal type the following - (linux)

    ~$ sudo apt-get install msmtp ca-certificates

Now we will create configuration file(msmtprc) using , gedit editor.
gedit comes already installed in linux.

	~$ sudo gedit /etc/msmtprc

Now type the following in the text editor which opens up
when you created above file.
caution: MY_GMAIL_ID is your id and MY_GMAIL_PASSSWORD is your password but when you would do this
google may attempt to block it. SO go to https://myaccount.google.com/security and turn on "Less secure app access"

-------------------in msmtprc file

	defaults
	tls on
	tls_starttls on
	tls_trust_file /etc/ssl/certs/ca-certificates.crt

	account default
	host smtp.gmail.com
	port 587
	auth on
	user MY_GMAIL_ID@gmail.com
	password MY_GMAIL_PASSSWORD
	from MY_GMAIL_ID@gmail.com
	logfile /var/log/msmtp.log
-----------------------------msmtprc close

Now create msmtp.log
using below code

	~$ sudo touch /var/log/msmtp.log

change the mode of the file
using chmod

	~$ sudo chmod 0644 /etc/msmtprc

enable sendmail log file as writable
with following code

	~$ sudo chmod 0777 /var/log/msmtp.log

Your configuration for gmail's SMTP is now ready.
Open and edit php.ini file
caution: first check the php version you were using and change accordingly , I used php 7.2

	~$ sudo gedit /etc/php/7.2/apache2/php.ini

You have to set sendmail_path in your php.ini file. 
Simply use search feature of gedit and find 'sendmail_path'
For setting sendmail_path you need smtp path, which you can check
using following code in terminal.

	~$ which msmtp 

(It must be /usr/bin/msmtp or similar)
Now i hope your php.ini file must be open and ready. 
If you want to know location of your php.ini then write following code in your text editor

	<?php
	phpinfo();
	?>

Save it as php_check.php in /var/www/html (It is location where you must store all your files 
which you want to run on your apache server)
Open your browser and type "localhost/php_check.php"
find php.ini and there you have its address
So in php.ini search sendmail_path
Your neighbouring code must be changed to 

-----
	[mail function]
	SMTP = smtp.gmail.com
	smtp_port = 587
	sendmail_path = /usr/bin/msmtp -t          [Notice /usr/bin/msmtp we got from ~$ which msmtp ]
-----

Now restart your server
go to terminal and type

	~$ sudo /etc/init.d/apache2 restart

And now you can use mail() in your php script

5. Currently the project supports all subjects of all years of only 3 departments(IIT ROORKEE). Others can be added using extras/add_subjects.php . 
   For using add_subjects.php you have to use same database which we are using for main website.

