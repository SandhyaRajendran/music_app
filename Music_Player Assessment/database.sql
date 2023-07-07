create DATABASE musicc_player;

CREATE TABLE users(
id int not null AUTO_INCREMENT PRIMARY key,
user_name varchar(250),
PASSWORD varchar(250),
user_type varchar(250),
created_at timestamp,
updated_at timestamp
);

INSERT INTO `users`(`user_name`, `PASSWORD`, `user_type`) VALUES ("shivam","shivam@123","admin"),
("Rajendran","raje@098","login"),("Sara","sara#1999","login"),("moni","moni#0124","login");


CREATE TABLE admin(
id int not null AUTO_INCREMENT PRIMARY key,
song_name varchar(250),
admin_id int,
created_at timestamp,
updated_at timestamp,
FOREIGN key (admin_id) REFERENCES users(id)
);


INSERT INTO `admin`(`song_name`, `admin_id`) VALUES ('Om shivoham',1),
('Anna ready',1),('Sudithar aninthu',1),('Vatthhi coming',1),('Pollatha ulagam',1);


create table images(
id int not null AUTO_INCREMENT PRIMARY key,
images varchar(250),
module_type varchar(250),
admin_id int,
created_at timestamp,
updated_at timestamp,
FOREIGN key (admin_id) REFERENCES admin(id)
    );

CREATE TABLE playlist(
id int not null AUTO_INCREMENT PRIMARY KEY,
song_name varchar(250),
user_id int,
created_at timestamp,
updated_at timestamp,
FOREIGN key (user_id) REFERENCES users(id));
