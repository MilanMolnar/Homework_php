UPDATE auto
JOIN szerviz
ON (szerviz.auto_id = auto.id)
SET auto.muszaki = 0
WHERE szerviz.datum < DATE_SUB(CURDATE(), INTERVAL 2 YEAR)