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

       

   });
  </script>

</head>
<body>

<div class="jumbotron text-center">
  <h1>List Card</h1>
  <p>Lista de tarjetas</p>
  
  <div class="container">
  <div class="row" width="300" height="400">
    <div id='addcard' class="well" width="300" height="300">
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>alias_token</th>
                    <th>card_masked_number</th>
                    <th>expiration_date</th>
                    <th>card_brand</th>
                    <th>card_id</th>
                    <th>card_type</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $dato)
                    <tr>
                        <td>{{ $dato->alias_token }}</td>
                        <td>{{ $dato->card_masked_number }}</td>
                        <td>{{ $dato->expiration_date }}</td>
                        <td>{{ $dato->card_brand }}</td>
                        <td>{{ $dato->card_id }}</td>
                        <td>{{ $dato->card_type }}</td>
                        <td>
                            <p>
                            <a href="{{ url('buy_token/'.$dato->alias_token) }}" type="button" class="btn btn-primary">Pagar con token</a>
                            </p>
                            <p>
                            <a href="{{ url('delete_card/'.$dato->alias_token) }}" type="button" class="btn btn-primary">Eliminar Tarjeta</a>
                            </p>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
  </div>
</div> 
</div>
    <!-- Incluye Bootstrap JS (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
