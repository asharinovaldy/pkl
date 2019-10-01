SELECT COUNT(p.id) AS ONTIME
FROM project p
WHERE p.selesai != "Proses" AND  p.sisa >= 0 AND p.tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10" AND p.tim_support="MEN008"