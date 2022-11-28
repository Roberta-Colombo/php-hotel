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

function booleanToString($hotel)
{
    return $hotel['parking'] === true ? 'Sì' : 'No';
}

if (isset($_GET['parkingOption']) && !empty($_GET['parkingOption'])) {
    $parking = $_GET['parkingOption'];
    // var_dump($parking);

    $temporary = [];
    foreach ($hotels as $hotel) {
        if (booleanToString($hotel) == $parking) {
            $temporary[] = $hotel;
        }
    }
    $hotels = $temporary;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>PHP Hotels</title>
</head>

<body>
    <label>Disponibilit&agrave; parcheggio:</label>
    <form action="index.php" method="GET">
        <select name="parkingOption" id="parkingOption">
            <option value="">Scegli</option>
            <option value="Sì">Sì</option>
            <option value="No">No</option>
        </select>
        <button type="submit">Cerca</button>
    </form>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Stelle</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($hotels as $hotel) {
                    echo "<tr>" . "<th>" . $hotel['name'] . "</th>" . "<td>" . $hotel['description'] . "</td>" . "<td>" . booleanToString($hotel) . "</td>" . "<td>" . $hotel['vote'] . "</td>" . "<td>" . $hotel['distance_to_center'] . " km" . "</td>" . "</tr>";

                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>