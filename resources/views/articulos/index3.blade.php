<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#provincia").change(function(evento){
                alert("Has pulsado el enlace...nAhora serás enviado a DesarrolloWeb.com");
            });
        });
    </script>
</head>
<body>
<select name="provincia" id="provincia">
    <?php
    foreach($articulos as $articulo)
    {
    ?>
    <option value="<?=$articulo->id ?>"><?=$articulo->nombre ?></option>
    <?php
    }
    ?>
</select>

<select name="localidad" id="localidad">
    <option value="">Selecciona tu provincía</option>
</select>
</body>
</html>



