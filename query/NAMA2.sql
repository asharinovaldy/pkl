SELECT DISTINCT(p.tim_support)
			FROM project p
			WHERE p.id IN (SELECT p.id
						   FROM project p 
						   WHERE p.tim_support = "MEN007" AND p.tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10")