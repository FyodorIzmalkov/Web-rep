SELECT title AS 'Title', summary AS 'Summary', prod_year
FROM `db_lsandor-`.film JOIN `db_lsandor-`.genre
ON `db_lsandor-`.film.id_genre = `db_lsandor-`.genre.id_genre
WHERE `db_lsandor-`.genre.name = 'erotic'
ORDER BY prod_year DESC;