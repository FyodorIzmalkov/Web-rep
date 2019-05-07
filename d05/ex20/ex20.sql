SELECT `db_lsandor-`.film.id_genre,
`db_lsandor-`.genre.name AS `name_genre`,
`db_lsandor-`.film.id_distrib,
`db_lsandor-`.distrib.name AS `name_distrib`,
`title` AS `title_film`
FROM `db_lsandor-`.film
LEFT JOIN `db_lsandor-`.genre
ON `db_lsandor-`.film.id_genre = `db_lsandor-`.genre.id_genre
LEFT JOIN `db_lsandor-`.distrib
ON `db_lsandor-`.film.id_distrib = `db_lsandor-`.distrib.id_distrib
WHERE `db_lsandor-`.film.id_genre BETWEEN 4 AND 8;