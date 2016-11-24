<?php
error_reporting(0);

include "koneksi.php";
// hhhhhhhh
// hhhh
echo "<h2>Uji</h2>
				<form method=POST action='aksi.php' enctype='multipart/form-data'>
					<table>

						<tr>
							<td>Tinggi</td>     
							<td> : </td>
							<td>
								<input type=text name='tinggi' maxlength=100 size=50>
							</td>
						</tr>
						
						<tr>
							<td>Berat</td>     
							<td> : </td>
							<td>
								<input type=text name='berat' maxlength=100 size=50>
							</td>
						</tr>
						
						<tr><td colspan=2>	<input type=submit value=Proses>
										<input type=button value=Batal onclick=self.history.back()></td></tr>
					</table>
				</form>";


echo "<h2>Tambah Data</h2>
		<form method=POST action='tambah.php' enctype='multipart/form-data'>
					<table>

						<tr>
							<td>Tinggi</td>     
							<td> : </td>
							<td>
								<input type=text name='tinggi' maxlength=100 size=50>
							</td>
						</tr>
						
						<tr>
							<td>Berat</td>     
							<td> : </td>
							<td>
								<input type=text name='berat' maxlength=100 size=50>
							</td>
						</tr>

						<tr>
							<td>Status</td>     
							<td> : </td>
							<td>
								<input type=text name='status' maxlength=100 size=50>
							</td>
						</tr>

						
						<tr><td colspan=2>	<input type=submit value=Simpan>
										<input type=button value=Batal onclick=self.history.back()></td></tr>
					</table>
				</form>";


/*
echo "<h2>Tambah data</h2>
				<form method=POST action='tambah.php' enctype='multipart/form-data'>
					<table>

						<tr><td>Nama Manggrove</td>     <td> : </td><td><input type=text name='nama' maxlength=30 size=30></td></tr>
						<tr><td>Bentuk Tanaman</td>     <td> : </td><td><input type=text name='bt' maxlength=10 size=10></td></tr>
						<tr><td>Bentuk Akar</td>     <td> : </td><td><input type=text name='ba' maxlength=10 size=10></td></tr>
						<tr><td>Bentuk Buah</td>     <td> : </td><td><input type=text name='bb' maxlength=10 size=10></td></tr>
						<tr><td>Bentuk Daun</td>     <td> : </td><td><input type=text name='bd' maxlength=10 size=10></td></tr>
						<tr><td>Susunan Daun</td>     <td> : </td><td><input type=text name='sd' maxlength=10 size=10></td></tr>
						<tr><td>Tata Letak Daun</td>     <td> : </td><td><input type=text name='tld' maxlength=10 size=10></td></tr>
						<tr><td>Bentuk Ujung Daun</td>     <td> : </td><td><input type=text name='bud' maxlength=10 size=10></td></tr>
						<tr><td>Letak Bunga</td>     <td> : </td><td><input type=text name='lb' maxlength=10 size=10></td></tr>
						<tr><td>Rangkaian Bunga</td>     <td> : </td><td><input type=text name='rb' maxlength=10 size=10></td></tr>
						<tr><td>Daun Mahkota Bunga</td>     <td> : </td><td><input type=text name='dmb' maxlength=10 size=10></td></tr>
						<tr><td>Habitat Tempat Tumbuh</td>     <td> : </td><td><input type=text name='htt' maxlength=10 size=10></td></tr>
						
						<tr><td colspan=2>	<input type=submit value=Simpan>
										<input type=button value=Batal onclick=self.history.back()></td></tr>
					</table>
				</form>";

*/

echo "========= data latih =========";
	$sql2 = mysql_query("SELECT * FROM data ORDER BY id ASC");
	echo "<table>
			<thead>
				<th>Data Ke-</th>
				<th>Status</th>
				<th>Tinggi</th>
				<th>Berat</th>
			</thead>";
		while($data = mysql_fetch_array($sql2))
		{
			echo "<tr>
					<td>$data[id]</td>
					<td>$data[status]</td>
					<td>$data[tinggi]</td>
					<td>$data[berat]</td>
				</tr>";
		}	
		echo "</table>";

?>