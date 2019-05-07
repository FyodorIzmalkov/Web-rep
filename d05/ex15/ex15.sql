SELECT LEFT(REVERSE(phone_number), LENGTH(phone_number) - 1) AS `rebmunenohp`
FROM `db_lsandor-`.distrib
WHERE phone_number LIKE '05%';