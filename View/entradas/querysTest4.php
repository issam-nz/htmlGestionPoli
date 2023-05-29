<?php
$manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017");
$database = 'db_polideportivos';
$collection = 'entradas';

// Query: Obtén los socios que han ido al polideportivo menos de 5 días al mes
$pipeline = [
    ['$group' => [
        '_id' => [
            'idSocio' => '$idSocio',
            'idPolideportivo' => '$idPolideportivo',
            'month' => ['$month' => ['$toDate' => '$fechaHora']]
        ],
        'visits' => ['$sum' => 1]
    ]],
    ['$match' => [
        'visits' => ['$lt' => 5]
    ]],
    ['$group' => [
        '_id' => '$_id.idSocio',
        'polideportivos' => ['$push' => [
            'idPolideportivo' => '$_id.idPolideportivo',
            'month' => '$_id.month',
            'visits' => '$visits'
        ]],
        'totalMonths' => ['$sum' => 1]
    ]],
    ['$project' => [
        '_id' => 0,
        'idSocio' => '$_id',
        'polideportivos' => 1,
        'totalMonths' => 1
    ]],
];

$command = new MongoDB\Driver\Command([
    'aggregate' => $collection,
    'pipeline' => $pipeline,
    'cursor' => new stdClass,
]);

$cursor = $manager->executeCommand($database, $command);
$entries = $cursor->toArray();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Polideportivos - Socios con menos de 5 días al mes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Socios con menos de 5 días al mes en el Polideportivo</h1>

    <table>
        <tr>
            <th>Socio ID</th>
            <th>Polideportivos</th>
            <th>Total Months</th>
        </tr>
        <?php foreach ($entries as $entry) { ?>
            <tr>
                <td><?php echo $entry->idSocio; ?></td>
                <td>
                    <ul>
                        <?php foreach ($entry->polideportivos as $polideportivo) { ?>
                            <li>
                                Polideportivo: <?php echo $polideportivo->idPolideportivo; ?> |
                                Mes: <?php echo $polideportivo->month; ?> |
                                Visitas: <?php echo $polideportivo->visits; ?>
                            </li>
                        <?php } ?>
                    </ul>
                </td>
                <td><?php echo $entry->totalMonths; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
