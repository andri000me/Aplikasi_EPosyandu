<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var nama_petugas;
		var jabatan_petugas;
		var jk_petugas;
		var temp_lahir_petugas;
		var tgl_lahir_petugas;
        var alamat_petugas;
        var telp_petugas;
        var status_petugas;
		var petugas;
		$(document).ready(function(){
			$("#ttambah").click(function(){ 
				//ambil nilai-nilai dari masing-masing input 
				nama_petugas = $("#nama_petugas").val();
    			jabatan_petugas = $("#jabatan_petugas").val();
    			temp_lahir_petugas = $("#temp_lahir_petugas").val();
    			tgl_lahir_petugas = $("#tgl_lahir_petugas").val();
                alamat_petugas = $("#alamat_petugas").val();
    			telp_petugas = $("#telp_petugas").val();
    			status_petugas = $("#status_petugas").val();

    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				petugas = {
					"nama_petugas" : nama_petugas,
					"jabatan_petugas" : jabatan_petugas,
					"jk_petugas" : document.getElementById('laki').checked ? 'L' : 'P',
					"temp_lahir_petugas" : temp_lahir_petugas,
					"tgl_lahir_petugas" : tgl_lahir_petugas,
                    "alamat_petugas" : alamat_petugas,
                    "telp_petugas" : telp_petugas,
                    "status_petugas" : status_petugas
				};	

				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesCrudPetugas.php",
    			data : {petugas : petugas, func_petugas : "tambah_data_petugas"},
    			cache : false,
    			success : function(msg){
    				if(msg=="sukses"){
    					$("#status").html("Tambah Berhasil. . . ");
    				}else{
    					$("#status").html("ERROR. . . ");
    				}
    				$("#loading").hide();
       			}
				});
 			});
		});
	</script>
</head>
<body>
	<form id="formnik">
	<!-- NIK Anak  :<br> 
<input type="text" id="nama_petugas"> --> 
</p> 
<p> 
Nama Petugas :<br> 
<input type="text" id="nama_petugas"><p>
Jabatan Petugas :<br> 
<input type="text" id="jabatan_petugas"><p> 
Jenis Kelamin Petugas :<br>
<input type="radio" value="L" id="laki" name="jk_petugas">Laki - Laki<p>
<input type="radio" value="P" id="perempuan" name="jk_petugas">Perempuan<p>
Tempat Lahir Petugas : <br>
<input type="text" id="temp_lahir_petugas"><p>
Tanggal Lahir : <br> 
<input type="date" id="tgl_lahir_petugas" size="30"><p>
Alamat Petugas : <br>
<input type="text" id="alamat_petugas"><p>
No Telepon Petugas : <br>
<input type="text" id="telp_petugas"><p>
Status Petugas :<br>
<input type="text" id="status_petugas"><p>

<button type="button" id="ttambah">TAMBAH</button>
<button onclick="window.location.href='crudpetugas.php'" type="button"> BACK </button>
<span id="status"></span>
</form>

</body>
</html>