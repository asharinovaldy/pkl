SELECT COUNT(p.id) AS PROJEK
FROM project p
WHERE tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10" AND tim_support="MEN007"