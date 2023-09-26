<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ env('JAVASCRIPT_LIBRARY_STAGING_URL') }}"></script>

  

</head>
<body>

<div class="jumbotron text-center">
  <h1>Menú</h1>
  <p>Bancard y Sus Funciones</p>
  
  <div class="container">
  <div class="row" width="300" height="400">
    <div id='addcard' class="well" width="300" height="300">
    <a href="{{ url('add_card') }}" type="button" class="btn btn-primary">Agregar Taretas</a>
    <a href="{{ url('list_card') }}" type="button" class="btn btn-primary">Listar Tarjetas</a>
    <!--<button type="button" class="btn btn-primary">Boton comprar</button>-->
      
    </div>
    
  </div>
</div> 
</div>

</body>
</html>
