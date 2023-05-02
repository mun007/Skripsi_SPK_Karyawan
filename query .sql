
SELECT  
  t_penilaian.id_penilaian,
  t_penilaian.id_alternatif,
  t_alternatif.nama,
  t_penilaian.id_kriteria,
  t_kriteria.kriteria,
  t_subkriteria.id_subkriteria,
  t_subkriteria.subkriteria,
  t_subkriteria.nilai
FROM t_penilaian
JOIN t_alternatif ON t_penilaian.id_alternatif=t_alternatif.id_alternatif
JOIN t_kriteria ON t_penilaian.id_kriteria=t_kriteria.id_kriteria
JOIN t_subkriteria ON t_penilaian.id_subkriteria = t_subkriteria.id_subkriteria
                                                                    
SELECT 
  t_penilaian.id_penilaian,
  t_penilaian.id_alternatif,
  t_alternatif.nama,
  t_penilaian.id_kriteria,
  t_kriteria.kriteria,
  t_penilaian.nilai
FROM t_penilaian
JOIN t_alternatif ON t_penilaian.id_alternatif=t_alternatif.id_alternatif
JOIN t_kriteria ON t_penilaian.id_kriteria=t_kriteria.id_kriteria
WHERE t_penilaian.id_alternatif='$id_alternatif'
AND t_penilaian.id_penilaian='$id_penilaian'

# Mencari nama yang belum dinilai
select 
	t_alternatif.id_alternatif,
	t_alternatif.nama
FROM t_alternatif
WHERE
t_alternatif.id_alternatif NOT IN ( SELECT t_penilaian.id_alternatif FROM t_penilaian)

DELETE FROM t_perangkingan;
ALTER TABLE t_perangkingan DROP t_perangkingan.id_rangking;
ALTER TABLE t_perangkingan ADD t_perangkingan.id_rangking INT(10) NOT NULL AUTO_INCREMENT FIRST,ADD PRIMARY KEY (id_rangking);

SELECT 
  t_alternatif.id_alternatif,
  t_alternatif.nama,
  t_perangkingan.nilai_akhir 
FROM t_perangkingan 
JOIN t_alternatif ON t_perangkingan.id_alternatif=t_alternatif.id_alternatif 
ORDER BY t_perangkingan.nilai_akhir DESC