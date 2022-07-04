<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <title>Simple Crud Ajax</title>

    <script>
        $(document).ready(function(){

            //meload data mahasiswa saat aplikasi dijalankan
            loadData();

            //load form add
            $("#contentData").on("click", "#addButton", function(){
                $.ajax({
                    url: 'form-add.php',
                    type: 'get',
                    success: function(data){
                        $('#contentData').html(data);
                    }
                })
            });
            
            //load form edit dengan parameter idmhsw
            $("#contentData").on("click","#EditButton", function(){
                var IdMhsw = $(this).attr("value");
                $.ajax({
                    url: 'form-edit.php',
                    type: 'get',
                    data: {
                        IdMhsw: IdMhsw
                    },
                    success: function(data){
                        $("#contentData").html(data);
                    }
                });
            });
            
            //button batal
            $("#contentData").on("click", "#cancelButton", function(){
                loadData();
            });
            
            //simpan Data mahasiswa
            $("#contentData").on("submit","#formAdd", function(e){
                e.preventDefault();
                $.ajax({
                    url: 'service.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data){
                        alert(data);
                        loadData();
                    }
                });
            });

            //edit data mahasiswa
            $("#contentData").on("submit", "#formEdit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'service.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });
            //hapus data mahasiswa berdasarkan IdMhsw
            $("#contentData").on("click","#DeleteButton",function(){
                var IdMhsw = $(this).attr("value");
                $.ajax({
                    url: 'service.php?action=delete',
                    type: 'post',
                    data:{
                        IdMhsw: IdMhsw
                    },
                    success: function (data) { 
                        alert(data);
                        loadData();
                     }
                });
            });
            
            function loadData(){
                $.ajax({
                    url: 'data-mahasiswa.php',
                    type: 'get',
                    success: function(data){
                        $("#contentData").html(data);
                    }
                })
            }

        });
    </script>
</head>
<body>
    <div style="text-align: left;">
        <h2>Simple Crud Ajax dan PHP</h2>
        <div id="contentData"></div>
        <div class="tes"></div>
    </div>
</body>
</html>