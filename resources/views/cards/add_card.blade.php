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

  <script type="text/javascript">
   $(document).ready(function() {

        styles = {
                "form-background-color": "rgb(235, 235, 235)", "button-background-color": "#4faed1", "button-text-color": "#fcfcfc", "button-border-color": "#dddddd", "input-background-color": "#fcfcfc", "input-text-color": "#111111", "input-placeholder-color": "#111111"
            };
    
        $("#cargando").hide();   
            
            Bancard.Cards.createForm('addcard','{{$codigo}}',styles); 

   });
  </script>

</head>
<body>

<div class="jumbotron text-center">
  <h1>Add Card</h1>
  <p>Agregar tarjetas a bancard</p>
  
  <div class="container">
  <div class="row" width="300" height="400">
    <div id='addcard' class="well" width="300" height="300">
      <h3 id='cargando'>Cargando...</h3>
      
    </div>
    
  </div>
</div> 
</div>

</body>
</html>
