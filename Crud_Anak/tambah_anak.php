<html>
<head></head>
<body>
NIK Anak : 
<select id="option_nik_anak"></select> 
<br> 
<a id="formtambah" style="cursor:pointer;color:green;"><u>Tambah Data Anak</u></a> 
<p style="display:none" id="formnik"> 
NIK Anak  :<br> 
<input type="text" id="nik_anak"> 
</p> 
<p> 
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
<button type="button" id="tupdate">UPDATE</button> 
<button type="button" id="tdelete">DEL</button> 
<button type="button"id="ttambah">TAMBAH</button><br><br>
<button type="button" onclick="window.location.href='crudAnak.html'">KEMBALI</a></button>
<span id="status"></span>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		var option_nik_anak;
		var nama_anak;
		var temp_lahir_anak;
		var tgl_lahir_anak;
		var usia_anak;
		var jk_anak;
		var data_anak;
		$(document).ready(function(){
			//meloading option NIK dari database
			$("#option_nik_anak").load("prosesCrudAnak.php", "func_anak=ambil_option_anak");

			//jika ada event onchange ambil data dari database
			$("#option_nik_anak").change(function(){
				//ambil nilai nik dari form
				option_nik_anak = $("#option_nik_anak").val();
			

			//lakukan pengiriman data 
			$.ajax({
				url: "prosesCrudAnak.php",
				data: "func_anak=ambil_data_anak&option_nik_anak="+option_nik_anak,
				cache: false,
				success: function(msg){
					//karna di server pembatas setiap data adalah |
					//maka kita split dan akan membentuk array
					data = msg.split("|");

					//masukan ke masing - masing textfield
					$("#nama_anak").val(data[0]);
					$("#temp_lahir_anak").val(data[1]);
					$("#tgl_lahir_anak").val(data[2]);
					$("#usia_anak").val(data[3]);
					if (data[4] == 'L'){
						$("#laki").prop("checked", true);
						$("#perempuan").prop("checked", false);
					} else {
						$("#perempuan").prop("checked", true);
						$("#laki").prop("checked", false);
					}
				}
				});
			});
			//jika tombol update diclick
			$("#tupdate").click(function(){
				//ambil nilai-nilai dari masing-masing input
				option_nik_anak = $("#option_nik_anak").val();
				if (option_nik_anak == "Pilih dulu NIK Anak") {
					alert("Pilih dulu NIK Anak");
					exit();
				}
				nama_anak = $("#nama_anak").val();
				temp_lahir_anak = $("#temp_lahir_anak").val();
                tgl_lahir_anak = $("#tgl_lahir_anak").val();
                usia_anak = $("#usia_anak").val();
                jk_anak = $("input[name='jk_anak']:checked").val();
				data_anak = "&option_nik_anak="+option_nik_anak+"&nama_anak="+nama_anak+"&temp_lahir_anak="+temp_lahir_anak+"&tgl_lahir_anak="+tgl_lahir_anak+"&usia_anak="+usia_anak+"&jk_anak="+jk_anak;
				//tampilkan status Updating dan animasinya
				$("#status").html("Lagi di update. . .");
				$("#loading").show();
				$.ajax({
					url: "prosesCrudAnak.php",
					data: "func_anak=update_data_anak"+data_anak,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
								$("#status").html("Update Berhasil . . ");
						}else{
								$("#status").html("ERROR. . .");
                                console.log(msg);
							}
							$("#loading").hide();
						}
				});
			});

			//jika tombol DEL diklik
			$("#tdelete").click(function(){
				option_nik_anak = $("#option_nik_anak").val();
				if (option_nik_anak=="Pilih NIK Anak") {
					alert("Pilih dulu NIK Anak");
					exit();
				}
				$.ajax({
					url: "prosesCrudAnak.php",
					data: "func_anak=del_data_anak&option_nik_anak="+option_nik_anak,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Delete Berhasil. . . ");
						}else{
							$("#status").html("ERROR. . .");
						}
						$("#nama_anak").val("");
						$("#temp_lahir_anak").val("");
						$("#tgl_lahir_anak").val("");
						$("#usia_anak").val("");
						$("#jk_anak").val("");
						$("#loading").hide();
						$("#option_nik_anak").load ("prosesCrudAnak.php", "func_anak=ambil_option_anak");
					}
				});
			});

	//Jika link tambah dta diklik
	$("#formtambah").click(function(){ 
 		$("#formnik").show(); 
 		$("#nik_anak").val(""); 
 		$("#nama_anak").val(""); 
 		$("#temp_lahir_anak").val(""); 
 		$("#tgl_lahir_anak").val("");
 		$("#usia_anak").val("");
 		$("#jk_anak").val(""); 
 		});
 	//jika link Tambah Data Karyawan diklik 
 $("#formtambah").click(function(){ 
 $("#formnik").show(); 
 $("#nik_anak").val(""); 
 $("#nama_anak").val(""); 
 $("#temp_lahir_anak").val(""); 
 $("#tgl_lahir_anak").val("");
 $("#usia_anak").val("");
 $("#jk_anak").val(""); 
 }); 
 
 //jika tombol TAMBAH diklik 
 $("#ttambah").click(function(){ 
 //ambil nilai-nilai dari masing-masing input 
 nik_anak = $("#nik_anak").val(); 
 if(nik_anak==""){ 
 alert("NIK belum diisi\nKlik Tambah Data Anak"); 
 exit(); 
 } 
 nama_anak = $("#nama_anak").val(); 
 temp_lahir_anak = $("#temp_lahir_anak").val(); 
 tgl_lahir_anak = $("#tgl_lahir_anak").val();
 usia_anak = $("#usia_anak").val();
 jk_anak = $("input[name='jk_anak']:checked").val(); 
 data_anak = "&nik_anak="+nik_anak + "&nama_anak="+nama_anak+"&temp_lahir_anak="+temp_lahir_anak+"&tgl_lahir_anak="+tgl_lahir_anak+"&usia_anak="+usia_anak+"&jk_anak="+jk_anak;
 			$("#status").html("Lagi ditambah..."); 
 			$("#loading").show(); 
 			$.ajax({ 
 			url: "prosesCrudAnak.php", 
 			data: "func_anak=tambah_data_anak"+data_anak, 
 			cache: false, 
 			success: function(msg){ 
 			if(msg=="sukses"){ 
 			$("#status").html("Berhasil ditambah..."); 
 			}else{ 
			 $("#status").html("ERROR.."); 
            } 
 			$("#loading").hide(); 
 			$("#option_nik_anak").load("prosesCrudAnak.php","func_anak=ambil_option_anak"); 
 			$("#formnik").hide(); 
 			$("#nik_anak").val(""); }
 		});
 	});
});
 </script>
</body>
</html>