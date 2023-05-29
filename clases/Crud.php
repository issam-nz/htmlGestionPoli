<?php
class Crud
{
    private $manager;
    private $database;

    public function __construct()
    {
        // Initialize MongoDB Manager and database name
        $this->manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
        $this->database = "db_polideportivos";
    }

    // socios collection functions
    public function getSocios()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $query = new MongoDB\Driver\Query([]);
            $socios = $manager->executeQuery("$database.$collection", $query);
            return $socios;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getFirstSocioId()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $query = new MongoDB\Driver\Query([], ['limit' => 1]);
            $socios = $manager->executeQuery("$database.$collection", $query);
            $firstSocio = current($socios->toArray());

            if ($firstSocio) {
                return (string) $firstSocio->_id;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function getSocio($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
            $query = new MongoDB\Driver\Query($filter);

            $cursor = $manager->executeQuery("$database.$collection", $query);
            $socio = current($cursor->toArray());

            return $socio;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertSocio($socio)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->insert($socio);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteSocio($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateSocio($id, $socio)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "socios";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->update(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $socio]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    // polideportivos collection functions

    public function getPolideportivos()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $query = new MongoDB\Driver\Query([]);
            $polideportivos = $manager->executeQuery("$database.$collection", $query);

            return $polideportivos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function getFirstPolideportivoId()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $query = new MongoDB\Driver\Query([], ['limit' => 1]);
            $polideportivos = $manager->executeQuery("$database.$collection", $query);
            $firstPolideportivo = current($polideportivos->toArray());

            if ($firstPolideportivo) {
                return (string) $firstPolideportivo->_id;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPolideportivo($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
            $query = new MongoDB\Driver\Query($filter);

            $cursor = $manager->executeQuery("$database.$collection", $query);
            $polideportivo = current($cursor->toArray());

            return $polideportivo;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertPolideportivo($polideportivo)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->insert($polideportivo);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deletePolideportivo($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updatePolideportivo($id, $polideportivo)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "polideportivos";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->update(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => $polideportivo]);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // registroEntradas collection functions

    public function getEntradas()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "entradas";

            $query = new MongoDB\Driver\Query([]);
            $entradas = $manager->executeQuery("$database.$collection", $query);
            return $entradas;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getEntrada($id)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "entradas";

            $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
            $query = new MongoDB\Driver\Query($filter);

            $cursor = $manager->executeQuery("$database.$collection", $query);
            $entrada = current($cursor->toArray());

            return $entrada;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertEntrada($entrada)
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017/admin");
            $database = "db_polideportivos";
            $collection = "entradas";

            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->insert($entrada);

            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

            $result = $manager->executeBulkWrite("$database.$collection", $bulkWrite, $writeConcern);

            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // functions for the query


    function getEntradasBySocio($id)
    {
        $collection = 'entradas';

        $filter = ['idSocio' => new MongoDB\BSON\Regex($id, 'i')];
        $query = new MongoDB\Driver\Query($filter);

        $cursor = $this->manager->executeQuery("$this->database.$collection", $query);
        $entradas = $cursor->toArray();

        $result = [];

        foreach ($entradas as $entrada) {
            // Access the entrada data as needed and add it to the result array
            $result[] = [
                '_id' => (string) $entrada->_id,
                'idSocio' => $entrada->idSocio,
                'idPolideportivo' => $entrada->idPolideportivo,
                'fechaHora' => $entrada->fechaHora,
            ];
        }

        return $result;
        $collection = 'entradas';

        $filter = ['idSocio' => new MongoDB\BSON\Regex($id, 'i')];
        $query = new MongoDB\Driver\Query($filter);

        $entradas = $this->manager->executeQuery("$this->database.$collection", $query);
        return $entradas;
    }

    function getEntradasByPolideportivo($id)
    {
        $collection = 'entradas';

        $filter = ['idPolideportivo' => new MongoDB\BSON\Regex($id, 'i')];
        $query = new MongoDB\Driver\Query($filter);

        $cursor = $this->manager->executeQuery("$this->database.$collection", $query);
        $entradas = $cursor->toArray();

        $result = [];

        foreach ($entradas as $entrada) {
            // Access the entrada data as needed and add it to the result array
            $result[] = [
                '_id' => (string) $entrada->_id,
                'idSocio' => $entrada->idSocio,
                'idPolideportivo' => $entrada->idPolideportivo,
                'fechaHora' => $entrada->fechaHora,
            ];
        }

        return $result;
        $collection = 'entradas';

        $filter = ['idPolideportivo' => new MongoDB\BSON\Regex($id, 'i')];
        $query = new MongoDB\Driver\Query($filter);

        $entradas = $this->manager->executeQuery("$this->database.$collection", $query);
        return $entradas;
    }

    // Función para obtener los socios que más acuden al polideportivo
    function getSociosMasAcuden()
    {
        $pipeline = [
            [
                '$group' => [
                    '_id' => '$idSocio',
                    'count' => ['$sum' => 1]
                ]
            ],
            ['$sort' => ['count' => -1]]
        ];

        $command = new MongoDB\Driver\Command([
            'aggregate' => 'entradas',
            'pipeline' => $pipeline,
            'cursor' => new stdClass,
        ]);

        $cursor = $this->manager->executeCommand($this->database, $command);

        $result = [];
        foreach ($cursor as $document) {
            $result[] = [
                'socio' => $document->_id,
                'totalEntradas' => $document->count
            ];
        }

        return $result;
    }

    function getSociosMasAcudenPorPoli() {
        $pipeline = [
            [
                '$addFields' => [
                    'socioId' => ['$toObjectId' => '$idSocio'],
                    'polideportivoId' => ['$toObjectId' => '$idPolideportivo']
                ]
            ],
            [
                '$lookup' => [
                    'from' => 'socios',
                    'localField' => 'socioId',
                    'foreignField' => '_id',
                    'as' => 'socio'
                ]
            ],
            [
                '$unwind' => '$socio'
            ],
            [
                '$lookup' => [
                    'from' => 'polideportivos',
                    'localField' => 'polideportivoId',
                    'foreignField' => '_id',
                    'as' => 'polideportivo'
                ]
            ],
            [
                '$unwind' => '$polideportivo'
            ],
            [
                '$group' => [
                    '_id' => [
                        'socioId' => '$socio._id',
                        'socioNombre' => '$socio.nombre',
                        'socioApellido' => '$socio.apellido',
                        'polideportivoNombre' => '$polideportivo.nombre'
                    ],
                    'totalAsistencias' => ['$sum' => 1]
                ]
            ],
            [
                '$sort' => [
                    '_id.polideportivoNombre' => 1
                ]
            ],
            [
                '$project' => [
                    '_id' => 0,
                    'socioId' => '$_id.socioId',
                    'socioNombre' => '$_id.socioNombre',
                    'socioApellido' => '$_id.socioApellido',
                    'polideportivoNombre' => '$_id.polideportivoNombre',
                    'totalAsistencias' => 1
                ]
            ]
        ];
        
        // Select the collection
        $collectionName = 'entradas';
        
        // Prepare the MongoDB command
        $command = new MongoDB\Driver\Command([
            'aggregate' => $collectionName,
            'pipeline' => $pipeline,
            'cursor' => new stdClass,
        ]);
        
        // Execute the aggregation query
        $cursor = $this->manager->executeCommand($this->database, $command);
        
        // Fetch the result documents
        $result = [];
        foreach ($cursor as $document) {
            $result[] = $document;
        }
        return $result;
    }


}

?>