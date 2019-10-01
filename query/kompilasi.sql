SELECT a1.PROJEK, a2.SELESAI, a3.PROSES, a4.TELAT, a5.ONTIME, a6.NAMA
FROM (SELECT COUNT(p.id) AS PROJEK
	  FROM project p
	  WHERE tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10" )a1,
	  (SELECT COUNT(p.id) AS SELESAI
	  FROM project p
     WHERE p.selesai != "Proses"  AND tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10")a2,
     (SELECT COUNT(p.id) AS PROSES
	  FROM project p
	  WHERE p.selesai = "Proses" AND tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10")a3,
	  (SELECT COUNT(p.id) AS TELAT
	  FROM project p
	  WHERE p.selesai != "Proses" AND p.tgl_est < "2019-08-08" AND p.tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10")a4,
	  (SELECT COUNT(p.id) AS ONTIME
	  FROM project p
	  WHERE p.selesai != "Proses" AND  p.tgl_est > "2019-08-07" AND p.tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10")a5,
	  (SELECT DISTINCT(p.tim_support) AS NAMA
	  FROM project p
	  WHERE tgl_mulai BETWEEN "2019-08-01" AND "2019-08-10")a6
GROUP BY a6.NAMA
     