SELECT title, summary FROM `db_lsandor-`.film 
WHERE LOWER(summary) LIKE '%vincent%'
ORDER BY id_film ASC;