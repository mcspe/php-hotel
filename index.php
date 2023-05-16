<?php
  $hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance to center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance to center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance to center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance to center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance to center' => 50
    ]
  ];
  $itemKeys = array_keys($hotels[0]);
  $filteredHotels = $hotels;
  // var_dump($_POST);
  if ($_POST) {
    $filter = $_POST['parkingRadios'];
    // var_dump($filter);
    if ($filter === 'all') {
      $filteredHotels = $hotels;
    } elseif ($filter === 'parking') {
      $filteredHotels = [];
      foreach ($hotels as $hotel) {
        if ($hotel['parking']) {
          $filteredHotels[] = $hotel;
        }
      }
    } elseif ($filter === 'noParking') {
      $filteredHotels = [];
      foreach ($hotels as $hotel) {
        if (!$hotel['parking']) {
          $filteredHotels[] = $hotel;
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'/>
  <title>PHP Hotel</title>
</head>
<body>
  <div class="container">
    <h1 class="text-center my-3">HOTEL</h1>
    <form action="index.php" method="POST" class="d-flex justify-content-center align-items-center gap-3 my-5" id="radioForm">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="parkingRadios" id="all" value="all" <?php echo ((($filter === 'all') || ($filter === null)) ? 'checked' : '');?>>
        <label class="form-check-label" for="all">
          All
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="parkingRadios" id="parking" value="parking" <?php echo (($filter === 'parking') ? 'checked' : '');?>>
        <label class="form-check-label" for="parking">
          With Parking
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="parkingRadios" id="noParking" value="noParking" <?php echo (($filter === 'noParking') ? 'checked' : '');?>>
        <label class="form-check-label" for="noParking">
          Without Parking
        </label>
      </div>
    </form>
    <table class="table table-dark table-hover table-striped">
      <thead>
        <tr>
          <?php
            foreach ($itemKeys as $key) {
              echo '<th scope="col">' . ucfirst($key) . '</th>';
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($filteredHotels as $hotel) :?>
          <tr role="button">
            <?php foreach ($hotel as $info) :?>
            <td scope="row">
              <?php
                if ($info === true) {
                  echo '<i class="fa-solid fa-check"></i>';
                } elseif ($info === false) {
                  echo '<i class="fa-solid fa-xmark"></i>';
                } else {
                  echo $info;
                }
              ?>
            </td>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <script>
    const form = document.getElementById('radioForm');
    const all = document.getElementById('all');
    const parking = document.getElementById('parking');
    const noParking = document.getElementById('noParking');

    all.addEventListener('click', (e) => {
      form.submit();
    });
    parking.addEventListener('click', (e) => {
      form.submit();
    });
    noParking.addEventListener('click', (e) => {
      form.submit();
    });
  </script>
</body>
</html>