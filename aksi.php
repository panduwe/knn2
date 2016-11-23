<?php
error_reporting(0);

include "koneksi.php";

$b_tinggi = $_POST['tinggi'];
$b_berat = $_POST['berat'];


if (empty($b_tinggi) or empty($b_berat))
{
	echo "<script>
				alert('Ada yang belum anda isi');
				window.location = 'javascript:history.go(-1)'; 
		</script>";
}
else
{
	//Membaca jumlah baris data pada database
	$sql = mysql_query("SELECT * FROM data ORDER BY id ASC");
	$numrows = mysql_num_rows($sql);

	//Menentukan nilai K
	/*$k=0.3 * $numrows;
	$k=round($k);
	$r=$k % 2;
	if($r!=0)
	{
		$k=$k+1;
	}
	else
	{
		$k=$k;
	}*/

	$k=1; 

	echo "<b>Nilai K adalah sebesar $k </b><br><br>";

	//Perhitungan dengan KNN
	for ($i=1; $i <= $numrows; $i++)
	{	
		$sql1 = mysql_query("SELECT * FROM data Where id = $i");
		while($data = mysql_fetch_array($sql1))
		{
			//Pengurangan(KNN)
			$v1 = $b_tinggi - $data[tinggi];
			$v2 = $b_berat - $data[berat];

			
			//Pengkuadratan(KNN)
			$hit1 = (pow($v1,2)) + (pow($v2,2));
			
			//Pengakaran(KNN)
			$hit2 = sqrt($hit1);
			
			//Penyimpanan perhitungan ke database sementara
			mysql_query("INSERT INTO sementara (id,
												jarak,
												tinggi,
												berat,
												status)
										VALUES ('$i',
												'$hit2',
												'$data[tinggi]',
												'$data[berat]',
												'$data[status]')");
		}	
	}

	
	
	//data yang sudah d sorting dari data pertama sampai data nilai K
	$sql3 = mysql_query("SELECT * FROM  `sementara` ORDER BY  `sementara`.`jarak` ASC LIMIT 0 , $k");
	$x=1;
	
	while($data = mysql_fetch_array($sql3))
		{			
			//memasukkan data yang sudah di sorting mulai dari pertama sampai data nilai k ke dalam database sementara
			mysql_query("INSERT INTO urut (id,
										jarak,
										tinggi,
										berat,
										status)
								VALUES ('$x',
										'$data[jarak]',
										'$data[tinggi]',
										'$data[berat]',
										'$data[status]')");
								$x=$x+1;
		}	
	

	$sqlrtes = mysql_query("SELECT * FROM  urut ORDER BY id ASC LIMIT 0 , 1");
	while($datates = mysql_fetch_array($sqlrtes))
	{
		if($datates['jarak']>'10') // <<<==== ANGKA BATAS ATUR SENDIRI
		{
			echo "Jarak Data Terlalu Jauh";
		}
		else
		{
			//mencari hasil
			$sqlrx = mysql_query("SELECT * FROM  urut ORDER BY id ASC");
			//$hasil_nam = mysql_fetch_array($sql_nam);
			while($datax = mysql_fetch_array($sqlrx))
			{
				if($datax['jarak']=='0')
				{
					$Status = $datax['status'];
					$Tinggi = $datax['tinggi'];
					$Berat = $datax['berat'];
					
				echo "<br>Terklasifikasi sebagai Status <b>$Status</b>, dengan Tinggi <b>$Tinggi</b>, dan berat <b>$Berat</b></b>"; 	
					break;	
				}
				else
				{
					$Status = $datax['status'];
					$Tinggi = $datax['tinggi'];
					$Berat = $datax['berat'];

				echo "<br>Terklasifikasi sebagai Status <b>$Status</b>, dengan Tinggi <b>$Tinggi</b>, dan berat <b>$Berat</b></b>";  
					break;
				}
			}		
		}
	}	


	//langkah terakhir menghapus histori perhitungan pada database
	$sqls = mysql_query("SELECT * FROM sementara ORDER BY id ASC");
	$numrows1 = mysql_num_rows($sqls);
	for ($i=1; $i <= $numrows1; $i++)
	{
		mysql_query("DELETE FROM sementara WHERE id=$i");
	}


	$sql_urut = mysql_query("SELECT * FROM data ORDER BY id ASC");
	$numrows_urut = mysql_num_rows($sql_urut);
	for ($i=1; $i <= $numrows_urut; $i++)
	{
		mysql_query("DELETE FROM urut WHERE id=$i");
	}


}
?>


<!-- huhuhuhuuhu -->