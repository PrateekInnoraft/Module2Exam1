create database todo;
use todo;

create table tasks(
id int(10) auto_increment,
task varchar(255),
created_at timestamp,
updated_at timestamp,
primary key(id)
);