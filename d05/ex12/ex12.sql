SELECT last_name, first_name 
FROM `db_lsandor-`.user_card c1
WHERE c1.last_name LIKE "%-%" OR
c1.first_name LIKE "%-%"
ORDER BY last_name, first_name;