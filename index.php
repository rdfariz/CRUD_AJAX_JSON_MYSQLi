<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>TP8 RdFariz/4127</title>
    <script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<body class="blue">

    <br><br>
    <ul class="collection with-header container white"><br>
        <form action="add.php" class="container row" id="form" method="POST">
            <h3>CRUD JSON</h3>
            <div class="input-field col s5">
                <label class="active" for="nama">Nama</label>
                <input name="nama" id="nama" type="text" class="validate" autocomplete="off">
            </div>
            <div class="input-field col s5">
                <label class="active" for="comment">Comment</label>
                <input name="comment" id="comment" type="text" class="validate" autocomplete="off">
            </div>

            <button class="btn waves-effect waves-light submit blue" type="submit" name="submit">Submit</button>
        </form><br>

        <div class="container" id="content">
            
        </div>
        <br><br>
      </ul>
      

    <script src="js/materialize.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            loadData();

            $('#form').on('submit', function(e){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: data,
                    success: function(res) {
                        loadData();
                        resetForm();
                    }
                });
            });
        });

        function loadData() {
            $.get('content.php', function(data){
                $("#content").html(data);     

                $('.btn_del').click(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('href'),
                        type: 'GET',
                        success: function() {
                            loadData();
                        }
                    });
                });

                $('.btn_upd').click(function(e){
                    e.preventDefault();
                    $('[name=nama]').val($(this).attr('nama')).focus();
                    $('[name=comment]').val($(this).attr('comment')).focus();
                    $('form').attr('action', $(this).attr('href'));
                    $('[name=submit]').text('Update');
                });
                
            });            
        }

        function resetForm() {
            $('[type=text]').val('').focus();
            $('[name=submit]').text('Submit');
            $('form').attr('action', 'add.php');
        }

	</script>
    
</body>
</html>