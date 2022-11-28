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

if (isset($_GET['parkingOption']) || isset($_GET['category'])) {
    $parking = $_GET['parkingOption'];
    $category = $_GET['category'];

    $temporary = [];
    foreach ($hotels as $hotel) {
        if (booleanToString($hotel) == $parking && $hotel['vote'] >= $category) {
            $temporary[] = $hotel;
        } elseif (empty($_GET['parkingOption']) && !empty($_GET['category'])) {
            if ($hotel['vote'] >= $category) {
                $temporary[] = $hotel;
            }
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
    <link rel="stylesheet" href="./style/style.css">
    <title>PHP Hotels</title>
</head>

<body>
    <h1 class="text-center my-5">Cerca un hotel:</h1>
    <div class="container mt-5">
        <form action="index.php" method="GET">
            <label>Disponibilit&agrave; parcheggio:</label>
            <select name="parkingOption" id="parkingOption">
                <option value="">Seleziona</option>
                <option value="Sì">Sì</option>
                <option value="No">No</option>
            </select>

            <label class="ms-5">Categoria minima:</label>
            <select name="category" id="category">
                <option value="">Seleziona</option>
                <option value="1">*</option>
                <option value="2">**</option>
                <option value="3">***</option>
                <option value="4">****</option>
                <option value="5">*****</option>
            </select>
            <button class="ms-4 btn btn-dark" type="submit">Cerca</button>
        </form>
    </div>


    <div class="container pt-5">
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
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