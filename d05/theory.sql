show databases;
use dbname;
show tables;
select * from news; // news - table name select * from - pick everithing
select id, id from news; - will select 2 id tables from table news;
describe film;
select id, new from news limit 10;  === last 10 
SELECT id_film, titre FROM film ORDER BY titre LIMIT 10;
SELECT id_film, titre FROM film ORDER BY titre DESC LIMIT 10;  // descending order
SELECT id_film, titre, annee_prod FROM film WHERE annee_prod != 0 ORDER BY titre DESC LIMIT 10;
SELECT count(*) FROM film WHERE annee_prod > 2005 AND annee_prod < 2007 ORDER BY titre DESC LIMIT 10;
SELECT titre FROM film INNER JOIN genre ON film.id_genre = genre.id_genre WHERE id_genre = 25;
SELECT count(*), id_genre FROM film GROUP BY id_genre;
DELETE FROM genre; // will delete everything
DELETE FROM genre WHERE id_genre = 29;
INSERT INTO genre ("nom") VALUES ("test");
UPDATE genre SET now = "test" WHERE id_genre = 29;
SELECT INSERT UPDATE DELETE
CREATE TABLE Test(nom VARCHAR(255), id INT PRIMARY KEY AUTO_INCREMENT);
INSERT INTO Test (nom) VALUES ("toto");

mysql_connect("localhost:/Users...../mysql/mysql.sock", "root", $_ENV['PASS']) or die("ERROR");
mysql_select_db("sql42");
$res = mysql_query(..);
$res = mysql_fetch_array($res);
mysql_real_escape_string();
CREATE DATABASE dynweb CHARACTER SET utf8 COLLATE utf8_general_ci;
DROP DATABASE name;
// НОВЫЙ ПОЛЬЗОВАТЕЛЬ
GRANT ALL ON dynweb.* TO 'admin'@'localhost' IDENTIFIED BY '123';
CREATE TABLE films (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(400) NOT NULL,
	genre VARCHAR(255) NOT NULL,
	duration SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO films (name, genre, duration)
	VALUES ('Логан', 'Триллер', 141), ('Остров','Детектив',138), ('Престиж','Триллер',125);
	SELECT * FROM films;

ALTER TABLE films RENAME movies;
ALTER TABLE movies CHANGE name title VARCHAR(400) NOT NULL;
ALTER TABLE movies ADD 'release' INT;
ALTER TABLE movies MODIFY 'release' YEAR NOT NULL;
ALTER TABLE movies DROP 'release';
SELECT столбцы FROM таблица WHERE условие;
SELECT * FROM movies WHERE title LIKE '%остров%';
UPDATE movies SET 'release' = '2017' WHERE title = 'Логан';	
DELETE FROM movies WHERE id = 2;