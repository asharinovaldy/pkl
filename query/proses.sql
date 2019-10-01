SELECT COUNT(p.id) AS SELESAI
FROM project p
WHERE p.selesai = "Proses" and p.tim_support="MEN007" AND tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10"