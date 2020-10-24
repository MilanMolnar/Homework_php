SELECT ember.nev as nev, count(auto.id) as autok_szama, ember.lakhely as lakhely
FROM ember
LEFT JOIN auto
ON ember.id = auto.ember_id
group by ember.id