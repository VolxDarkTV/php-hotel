<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


  <?php
    $hotels = [

      [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
      ],
      [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
      ],
      [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
      ],
      [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
      ],
      [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
      ],
    
    ];
  ?>
</head>
<body>

  <section class="container">

   
    <div>
      <form>
        <!-- Parking -->
        <input type="checkbox" name="parking" id="parking" 
        <?php
          echo (isset($_GET["parking"])) ? 'checked' : '';
        ?>>
        <label for="parking">Parking</label>
        <!-- No Parking -->
        <input type="checkbox" name="noparking" id="noparking" 
        <?php
          echo (isset($_GET["noparking"])) ? 'checked' : '';
        ?>>
        <label for="noparking">NoParking</label>
        <!-- Search -->
        <input type="submit" value="Search">
      </form>
    </div>

    <div>
      
      <table class="table">
        <thead>
          <tr>
            <th scope='col'>Name</th>
            <th scope='col'>Description</th>
            <th scope='col'>P</th>
            <th scope='col'>Vote</th>
            <th scope='col'>Distance to center</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $hotels_temp = $hotels;
          if (isset($_GET["parking"])) {
            $hotels_temp = array_filter($hotels_temp, function($hotel) {
              return $hotel["parking"] === true;
            });
          }
          if (isset($_GET["noparking"])) {
            $hotels_temp = array_filter($hotels_temp, function($hotel) {
              return $hotel["parking"] === false;
            });
          }
            foreach ($hotels_temp as $hotel){
              $name = $hotel['name'];
              $description = $hotel['description'];
              $parking = $hotel['parking'] ? 'si' : 'no';
              $vote = $hotel['vote'];
              $distanceToCenter = $hotel['distance_to_center'];

              $textLine =
                "<tr>" .
                  "<td>" . $name . "</td>" .
                  "<td>" . $description . "</td>" .
                  "<td>" . $parking . "</td>" .
                  "<td>" . $vote . "</td>" .
                  "<td>" . $distanceToCenter . ' km' . "</td>" .
                "</tr>";
              echo $textLine;
              }
              ?>
        </tbody>
        
      </table>
        
    </div>
  </section>

</body>
</html>