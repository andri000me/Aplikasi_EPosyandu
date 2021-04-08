<html>
<head>
	<title>CRUD IBU</title>

</head> 
<body> 
	<button type="button" onclick="window.location.href='formTambahIbu.php'">DATA IBU</button>
	<table id="ttable"border="1">
		<thead>
			<tr>
				<th>ID Ibu</th>
				<th>Nama Ibu</th>
				<th>Nik Ibu</th>
				<th>Alamat Ibu</th>
				<th>No Telp Ibu</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody id="content">
	
		</tbody>
	  </table>
	  <button type="button" onclick="window.location.href='../home.html'">BACK TO DASHBOARD</button>

	  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	  <script type="text/javascript">
		var id_ibu;
		var nama_ibu;
		var nik_ibu;
		var alamat_ibu;
		var telp_ibu;
		var data;
		$(document).ready(function() {
		  $("#ttable").val();
		});
	
		$(document).ready(function(){
	
		  function getAllData(){
			$.ajax({
					type : "GET",	
				url : "ambil_data_ibu.php",
				data : {func_ibu : "ambil_semua_data"},
				cache : false,
				success : function(msg){
				data = JSON.parse(msg);
				console.log(data);
				var content = "";
					for (let index = 0; index < data.length; index++) {
					const element = data[index];
					content+="<tr>";
					content+= "<td>"+element.id_ibu+"</td>"+
					"<td>"+element.nama_ibu+"</td>" +
					"<td>"+element.nik_ibu+" </td>"+
					"<td>"+element.alamat_ibu+" </td>" +
					"<td>"+element.no_telp_ibu+"</td>"+
				'<td><button onclick="window.location.href=\'formEditIbu.php?id_ibu='+ element.id_ibu +'\'">EDIT</button></td>' +
              	'<td><button class="tdelete" value="'+element.id_ibu+'">DELETE</button></td>'
					content+="</tr>";
					}
		
					content+="</tr>";
					$("#content").html(content);
				}
				});
			}

			getAllData();
			 $(document).on('click', '.tdelete', function(){
				$.ajax({
          type : "POST",
					url : "prosesCrudIbu.php",
					data : {func_ibu : "delete", id_ibu : $(this).val()},
					cache: false,
					success: function(msg){
						if (msg=="sukses") {
							$("#status").html("Delete Berhasil. . . ");
              getAllData();
						} else {
							$("#status").html("EROR. . .");
						}
						$("#loading").hide();
					}
				});
			});

		});
	
	
	  </script>
</body> 
</html>