<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var nama_posyandu;
		var alamat_posyandu;
		var kel_posyandu;
		var kec_posyandu;
		var kota_kab_posyandu;
		var posyandu;
		$(document).ready(function(){
			$("#ttambah").click(function(){ 
				//ambil nilai-nilai dari masing-masing input 
				nama_posyandu = $("#nama_posyandu").val();

    			alamat_posyandu = $("#alamat_posyandu").val();
    			kel_posyandu = $("#kel_posyandu").val();
    			kec_posyandu = $("#kec_posyandu").val();
    			kota_kab_posyandu = $("#kota_kab_posyandu").val();
    			//data = "&nama_posyandu="+nama_posyandu+"&alamat_posyandu="+alamat_posyandu+"&kel_posyandu="+kel_posyandu+"&kec_posyandu="+kec_posyandu+"&kota_kab_posyandu="+kota_kab_posyandu;
				posyandu = {
					"nama_posyandu" : nama_posyandu,
					"alamat_posyandu" : alamat_posyandu,
					"kel_posyandu" : kel_posyandu,
					"kec_posyandu" : kec_posyandu,
					"kota_kab_posyandu" : kota_kab_posyandu
				};	

				
    			$("#status").html("Lagi di update . . . ");
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "prosesCrudPosyandu.php",
    			data : {posyandu : posyandu, func_posyandu : "tambah_data_posyandu"},
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
	<form id="formimun">
Nama Posyandu : 
<input type="text" id="nama_posyandu"><p>
Alamat :
<input type="text" id="alamat_posyandu"><p>
Kelurahan Posyandu : 
<input type="text" id="kel_posyandu"><p>
Kecamatan Posyandu : 
<input type="text" id="kec_posyandu"><p>
Kota/Kabupaten Posyandu :  
<input type="text" id="kota_kab_posyandu"> <p><br>
<button type="button" id="ttambah"> TAMBAH </button>
<button onclick="window.location.href='crudPosyandu.php'" type="button"> KEMBALI </button>
<span id="status"></span>
</form>

</body>
</html>