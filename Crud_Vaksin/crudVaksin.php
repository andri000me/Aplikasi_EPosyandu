<!DOCTYPE html>
<html>
<head>

  <title>Vaksin</title>

</head>
<body>
    <button onclick="window.location.href='form_tambah_vaksin.html'">Tambah Data Vaksin</button>
  <table id="ttable"border="1">
    <thead>
        <tr>
            <th>ID Vaksin</th>
            <th>Nama Vaksin</th>
            <th colspan=2>Aksi</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
  </table>
  <button type="button" onclick="window.location.href='../home.html'">BACK TO DASHBOARD</button>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var id_vaksin;
    var nama_vaksin;
    var data;
    $(document).ready(function() {
      $("#ttable").val();
    });

    $(document).ready(function(){

	  function getAllData(){
      $.ajax({
		  type : "GET",	
          url : "ambil_data_vaksin.php",
          data : {func_vaksin : "ambil_data_vaksin"},
          cache : false,
          success : function(msg){
          data = JSON.parse(msg);
          console.log(data);
          var content = "";
            for (let index = 0; index < data.length; index++) {
              const element = data[index];
              content+="<tr>";
              content+= "<td>"+element.id_vaksin+"</td>"+
              "<td>"+element.nama_vaksin+"</td>" +
              '<td><button onclick="window.location.href=\'formEditVaksin.php?id_vaksin='+ element.id_vaksin +'\'">EDIT</button></td>' +
              '<td><button class="tdelete" value="'+element.id_vaksin+'">DELETE</button></td>'
              content+="</tr>";
            }

            content+="</tr>";
            $("#content").html(content);
          }
        });
      }
      getAllData();
      $("#id_vaksin").change(function() {
        id_vaksin = $("#id_vaksin").val();
      });

      $(document).on('click', '.tdelete', function(){
				$.ajax({
          type : "POST",
					url : "prosesCrudVaksin.php",
					data : {func_vaksin : "delete", id_vaksin : $(this).val()},
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