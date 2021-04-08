<html>
<head>
	<title>CRUD ANAK</title>

</head> 
<body> 
	<button type="button" onclick="window.location.href='tambah_anak.html'">DATA ANAK</button><p>
		<table id="ttable"border="1">
			<p>TABEL ANAK</p>
    <thead>
        <tr>
            <th>ID Anak</th>
            <th>Nama Anak</th>
            <th>NIK Anak</th>
            <th>Tempat Lahir</th> 
            <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
  </table>
  <button type="button" onclick="window.location.href='../home.html'">BACK TO HOME</button>
<br> 
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_anak;
    var nama_anak;
    var temp_lahir_anak;
    var tgl_lahir_anak;
    var usia_anak;
    var jk_anak;
    
    var data;
    $(document).ready(function() {
      $("#ttable").val();
    });

    $(document).ready(function(){
      $("#id_anak").load("ambil_data_anak.php", "func_anak=ambil_data_anak");

	  function getAllData(){
      $.ajax({
		      type : "GET",	
          url : "ambil_data_anak.php",
          data : {func_anak : "ambil_data_anak"},
          cache : false,
          success : function(msg){
          data = JSON.parse(msg);
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td>"+element.id_anak+"</td>"+
              "<td>"+element.nama_anak+"</td>" +
              "<td>"+element.nik_anak+" </td>"+
              "<td>"+element.tempat_lahir_anak+" </td>" +
              "<td>"+element.tanggal_lahir_anak+" </td>" +
              "<td>"+element.usia+" tahun</td>" +
              "<td>"+element.jk_anak+"</td>"
              //'<td><button onclick="window.location.href=\'formedit.php?id_anak='+ element.id_anak +'\'">EDIT</button></td>' +
              //'<td><button class="tdelete" value="'+element.id_anak+'">DELETE</button></td>'
              content+="</tr>";
            }

            content+="</tr>";

            $("#content").html(content);
          }
        });
      }
      getAllData();
      $("#id_anak").change(function() {
        id_anak = $("#id_anak").val();
      });

      $(document).on('click', '.tdelete', function(){
				$.ajax({
          type : "POST",
					url : "prosesCrudAnak.php",
					data : {func_anak : "delete", id_anak : $(this).val()},
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