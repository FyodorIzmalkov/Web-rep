SELECT UPPER(last_name) AS 'NAME', first_name, price
FROM `db_lsandor-`.user_card
JOIN `db_lsandor-`.member
ON `db_lsandor-`.user_card.id_user = `db_lsandor-`.member.id_user_card
JOIN `db_lsandor-`.subscription
ON `db_lsandor-`.member.id_sub = `db_lsandor-`.subscription.id_sub
WHERE `db_lsandor-`.subscription.price > 42
ORDER BY last_name ASC,
first_name ASC;