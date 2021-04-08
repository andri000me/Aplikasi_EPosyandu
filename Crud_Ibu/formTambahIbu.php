<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	NIK Ibu  :<br> 
		<input type="text" id="nik_ibu"> 
	<p> 
		Nama ibu :<br> 
		<input type="text" id="nama_ibu"><br>
		Alamat :<br> 
		<input type="text" id="alamat_ibu"><br> 
		No telp :<br> 
		<input type="text" id="telp_ibu" size="30"><br> 
		<button id="ttambah" type="button">TAMBAH</button><br>
		<span id="status"></span><br>
		<br><br>
		<button onclick="window.location.href='crudIbu.php'">BACK</a></button>
		<span id="status"></span>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		var nik_ibu;
		var nama_ibu;
		var alamat_ibu;
		var telp_ibu;
		var ibu;
		$(document).ready(function(){
		$("#ttambah").click(function(){ 
				nik_ibu = $("#nik_ibu").val(); 
				if(nik_ibu==""){ 
					alert("Nik belum diisi\nKlik Tambah Data Ibu"); 
					exit(); 
				} 
				
				nama_ibu = $("#nama_ibu").val(); 
				alamat_ibu = $("#alamat_ibu").val(); 
				telp_ibu = $("#telp_ibu").val(); 
				data_ibu = "&nik_ibu="+nik_ibu + "&nama_ibu="+nama_ibu+"&alamat_ibu="+alamat_ibu+"&telp_ibu="+telp_ibu;
				
				ibu = {
					"nama_ibu" : nama_ibu,
					"nik_ibu" : nik_ibu,
					"alamat_ibu" : alamat_ibu,
					"telp_ibu" : telp_ibu,		
				};	
				$("#status").html("Lagi ditambah..."); 
				$("#loading").show(); 
				$.ajax({ 
					type : "POST",
					url: "prosesCrudIbu.php", 
					data: {ibu : ibu, func_ibu : "tambah_data_ibu"},
					cache: false, 
					success: function(msg){ 
						if(msg=="sukses"){ 
							$("#status").html("Berhasil ditambah..."); 
						} else { 
							$("#status").html("ERROR.."); 
						} 
						$("#loading").hide(); 
					}
				});
 			});
});
	</script>
</body>
</html>