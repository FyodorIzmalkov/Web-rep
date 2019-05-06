DROP TABLE IF EXISTS news;
CREATE TABLE news
( id smallint unsigned NOT NULL auto_increment,
 title varchar(255),
 date timestamp,
 short_content text,
 content text,
 author_name varchar(255),
 preview varchar(255),
 type varchar(50),
 PRIMARY KEY (id)
);