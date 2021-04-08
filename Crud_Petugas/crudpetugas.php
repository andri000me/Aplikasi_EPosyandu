<html>
<head>
	<title>CRUD PETUGASs</title>
	
</head> 
<body> 
	<button type="buton" onclick="window.location.href='tambah_petugas.php'">Tambah Data Petugas</button>
	<table id="ttable"border="1">
    <thead>
        <tr>
            <th>ID Petugas</th>
            <!-- <th>Nama Anak</th>
            <th>ID Petugas</th>
            <th>ID Vaksin</th> -->
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th colspan=2>Aksi</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
  </table>
  
	
	 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_petugas;
    var nama_petugas;
    var jabatan_petugas;
    var jk_petugas;
    var temp_lahir_petugas;
    var tgl_lahir_petugas;
    var alamat_petugas;
    var telp_petugas;
    var status_petugas;
    var data_petugas;
    $(document).ready(function() {
      $("#ttable").val();
    });

    $(document).ready(function(){
      $("#id_petugas").load("ambil_data_petugas.php", "func_petugas=ambil_data_petugas");

	  function getAllData(){
      $.ajax({
		      type : "GET",	
          url : "ambil_data_petugas.php",
          data : {func_petugas : "ambil_data_petugas"},
          cache : false,
          success : function(msg){
          data = JSON.parse(msg);
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td>"+element.id_petugas+"</td>"+
              "<td>"+element.nama_petugas+"</td>" +
              "<td>"+element.jabatan_petugas+" </td>"+
              "<td>"+element.jk_petugas+" </td>" +
              "<td>"+element.temp_lahir_petugas+" </td>" +
              "<td>"+element.tgl_lahir_petugas+" </td>" +
              "<td>"+element.alamat_petugas+" </td>"+
              "<td>"+element.telp_petugas+" </td>" +
              "<td>"+element.status_petugas+" </td>"+
              '<td><button onclick="window.location.href=\'formEditPetugas.php?id_petugas='+ element.id_petugas +'\'">EDIT</button></td>' +
              '<td><button class="tdelete" value="'+element.id_petugas+'">DELETE</button></td>'
                            content+="</tr>";
            }

            content+="</tr>";
            $("#content").html(content);
          }
        });
      }
      getAllData();
      $("#id_petugas").change(function() {
        id_petugas = $("#id_petugas").val();
      });

      $(document).on('click', '.tdelete', function(){
				$.ajax({
          type : "POST",
					url : "prosesCrudPetugas.php",
					data : {func_petugas : "delete", id_petugas : $(this).val()},
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


	<button onclick="window.location.href='../home.html'">BACK TO DASHBOARD</a></button><br> 
</body> 
</html>