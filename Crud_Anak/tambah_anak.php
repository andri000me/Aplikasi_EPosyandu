<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var nik_anak;
		var nama_anak;
		var temp_lahir_anak;
		var tgl_lahir_anak;
		var jk_anak;
		var data_ibu;
		$(document).ready(function(){
			$("#ttambah").click(function(){ 
				//ambil nilai-nilai dari masing-masing input 
				nik_anak = $("#nik_anak").val();

    			nama_anak = $("#nama_anak").val();
    			temp_lahir_anak = $("#temp_lahir_anak").val();
    			tgl_lahir_anak = $("#tgl_lahir_anak").val();
    			usia_anak = $("#usia_anak").val();


    			 jk_anak = $("#jk_anak").val();
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				data_anak = {
					"nik_anak" : nik_anak,
					"nama_anak" : nama_anak,
					"temp_lahir_anak" : temp_lahir_anak,
					"tgl_lahir_anak" : tgl_lahir_anak,
					"usia_anak" : usia_anak,
					"jk_anak" : document.getElementById('laki').checked ? 'L' : 'P'
				};	
				
				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesCrudAnak.php",
    			data : {data_anak : data_anak, func_anak : "tambah_data_anak"},
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
<input type="text" id="nik_anak"> --> 
</p> 
<p> 
Nik Anak :<br> 
<input type="text" id="nik_anak"><p>
Nama Anak :<br> 
<input type="text" id="nama_anak"><p> 
Tempat Lahir :<br> 
<input type="text" id="temp_lahir_anak"><p> 
Tanggal Lahir : (YYYY/MM/DD)<br> 
<input type="date" id="tgl_lahir_anak" size="30"><p>
Usia :<br>
<input type="text" id="usia_anak"><p>
Jenis Kelamin :<br>
<input type="radio" value="L" id="laki" name="jk_anak">Laki - Laki<p>
<input type="radio" value="P" id="perempuan" name="jk_anak">Perempuan<p>
<button type="button" id="ttambah">TAMBAH</button>
<button onclick="window.location.href='crudAnak.php'" type="button"> KEMBALI </button>
<span id="status"></span>
</form>

</body>
</html>