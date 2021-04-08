<html>
<head>
	<title>CRUD POSYANDU</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		var option_nama_posyandu;
		var alamat_posyandu;
		var kel_posyandu;
		var kec_posyandu;
		var kota_kab_posyandu;
		var data_posyandu;
		$(document).ready(function(){
			//meloading option NIK dari database
			$("#option_nama_posyandu").load("prosesCrudPosyandu.php", "func_posyandu=ambil_option_posyandu");

			//jika ada event onchange ambil data dari database
			$("#option_nama_posyandu").change(function(){
				//ambil nilai nik dari form
				option_nama_posyandu = $("#option_nama_posyandu").val();
			
				//lakukan pengiriman data 
				$.ajax({
					url: "prosesCrudPosyandu.php",
					data: "func_posyandu=ambil_data_posyandu&option_nama_posyandu="+option_nama_posyandu,
					cache: false,
					success: function(msg){
						//karna di server pembatas setiap data adalah |
						//maka kita split dan akan membentuk array
						data = msg.split("|");

						//masukan ke masing - masing textfield
						$("#alamat_posyandu").val(data[0]);
						$("#kel_posyandu").val(data[1]);
						$("#kec_posyandu").val(data[2]);
						$("#kota_kab_posyandu").val(data[3]);
					}
				});
			});
			//jika tombol update diclick
			$("#tupdate").click(function(){
				//ambil nilai-nilai dari masing-masing input
				option_nama_posyandu = $("#option_nama_posyandu").val();
				if (!option_nama_posyandu) {
					alert("Pilih dulu Nama Posyandu");
					exit();
				}

				alamat_posyandu = $("#alamat_posyandu").val();
				kel_posyandu = $("#kel_posyandu").val();
                kec_posyandu = $("#kec_posyandu").val();
				data_posyandu = "&option_nama_posyandu="+option_nama_posyandu+"&alamat_posyandu="+alamat_posyandu+"&kel_posyandu="+kel_posyandu+"&kec_posyandu="+kec_posyandu+"&kota_kab_posyandu="+kota_kab_posyandu;
				//tampilkan status Updating dan animasinya
				$("#status").html("Lagi di update. . .");
				$("#loading").show();
				$.ajax({
					url: "prosesCrudPosyandu.php",
					data: "func_posyandu=update_data_posyandu"+data_posyandu,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Update Berhasil . . ");
						} else {
							$("#status").html("ERROR. . .");
                            console.log(msg);
						}
						$("#loading").hide();
					}
				});
			});

			//jika tombol DEL diklik
			$("#tdelete").click(function(){
				option_nama_posyandu = $("#option_nama_posyandu").val();
				if (option_nama_posyandu=="Pilih Nama Posyandu") {
					alert("Pilih dulu Nama Ibu");
					exit();
				}
				
				$.ajax({
					url: "prosesCrudPosyandu.php",
					data: "func_posyandu=del_data_posyandu&option_nama_posyandu="+option_nama_posyandu,
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Delete Berhasil. . . ");
						} else {
							$("#status").html("EROR. . .");
						}

						$("#alamat_posyandu").val("");
						$("#kel_posyandu").val("");
						$("#kec_posyandu").val("");
						$("#kota_kab_posyandu").val("");
						$("#loading").hide();
						$("#option_nama_posyandu").load ("prosesCrudPosyandu.php", "func_posyandu=ambil_option_posyandu");
					}
				});
			});

			// //Jika link tambah dta diklik
			// $("#formtambah").click(function(){ 
			// 	$("#formnama").show(); 
			// 	$("#nama_posyandu").val(""); 
			// 	$("#alamat_posyandu").val(""); 
			// 	$("#kel_posyandu").val(""); 
			// 	$("#kec_posyandu").val("");
			// 	$("#kota_kab_posyandu").val(""); 
			// });
			
			// //jika link Tambah Data Karyawan diklik 
			// $("#formtambah").click(function(){ 
			// 	$("#formnama").show(); 
			// 	$("#nama_posyandu").val(""); 
			// 	$("#alamat_posyandu").val(""); 
			// 	$("#kel_posyandu").val(""); 
			// 	$("#kec_posyandu").val("");
			// 	$("#kota_kab_posyandu").val(""); 
			// });
 
			// //jika tombol TAMBAH diklik 
			// $("#ttambah").click(function(){ 
			// 	//ambil nilai-nilai dari masing-masing input 
			// 	option_nama_posyandu = $("#option_nama_posyandu").val(); 
			// 	if(option_nama_posyandu==""){ 
			// 		alert("Nama Posyandu belum diisi\nKlik Tambah Data Posyandu"); 
			// 		exit(); 
			// 	} 
				
			// 	alamat_posyandu = $("#alamat_posyandu").val(); 
			// 	kel_posyandu = $("#kel_posyandu").val(); 
			// 	kec_posyandu = $("#kec_posyandu").val(); 
			// 	kota_kab_posyandu = $("#kota_kab_posyandu").val();
			// 	data_posyandu = "&nama_posyandu="+nama_posyandu + "&alamat_posyandu="+alamat_posyandu+"&kel_posyandu="+kel_posyandu+"&kec_posyandu="+kec_posyandu+"&kota_kab_posyandu="+kota_kab_posyandu;
				
			// 	$("#status").html("Lagi ditambah..."); 
			// 	$("#loading").show(); 
			// 	$.ajax({ 
			// 		url: "prosesCrudPosyandu.php", 
			// 		data: "func_posyandu=tambah_data_posyandu"+data_posyandu, 
			// 		cache: false, 
			// 		success: function(msg){ 
			// 			if(msg=="sukses"){ 
			// 				$("#status").html("Berhasil ditambah..."); 
			// 			} else { 
			// 				$("#status").html("ERROR.."); 
			// 			} 
			// 			$("#loading").hide(); 
			// 			$("#option_nama_posyandu").load("prosesCrudPosyandu.php","func_posyandu=ambil_option_posyandu"); 
			// 			$("#formnama").hide(); 
			// 			$("#nama_posyandu").val(""); 
			// 		}
			// 	});
 			// });
		});
 	</script>
</head> 
<body> 
		Nama Posyandu : 
	<select id="option_nama_posyandu"></select><br> 
	<!-- <a id="formtambah" style="cursor:pointer;color:red;"><u>Tambah Data Posyandu</u></a>  -->
	<p style="display:none" id="formnama"> 
		Nama Posyandu  :<br> 
		<input type="text" id="nama_posyandu"> 
	</p> 
	<p> 
		Alamat Posyandu :<br> 
		<input type="text" id="alamat_posyandu"><p> 
		Kelurahan :<br> 
		<input type="text" id="kel_posyandu"><p> 
		Kecamatan :<br> 
		<input type="text" id="kec_posyandu" size="30"><p> 
		<button id="tupdate">UPDATE</button> 
		<!-- <button id="tdelete">DEL</button><br><br> -->
		<!-- <button id="ttambah">TAMBAH</button><br><br> -->
		<button onclick="window.location.href='../home.html'">BACK TO HOME</a></button><br> 
	<span id="status"></span>  
</body> 
</html> 