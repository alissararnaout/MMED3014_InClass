<?php // this is the database connection
class Database
{
    # Note: specify your own database credentials
    private $host = "localhost";

    private $db_name = "db_movies";

    private $username = "root";

    private $password = "root";

    private static $instance = null;
    public $conn;

    private function __construct(){
        $db_dsn = array(
            'host'    => $this->host,
            'dbname'  => $this->db_name,
            'charset' => 'utf8',
        );

        if (getenv('IDP_ENVIRONMENT') === 'docker') {
            $db_dsn['host'] = 'mysql';
            $this->username = 'docker_u';
            $this->password = 'docker_p';
        }

        try {
            $dsn        = 'mysql:' . http_build_query($db_dsn, '', ';');
            $this->conn = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo json_encode(
                array(
                    'error'   => 'Database connection failed',
                    'message' => $exception->getMessage(),
                )
            );
            exit;
        }
    }

    // get the database connection
    public function getConnection()
    {
        return $this->conn;
    }

    public static function getInstance(){
        if(!self::$instance){ // anything marked as static needs ::
            self::$instance = new Database();
        }

        return self::$instance;
    }
}

# this is a design pageant -- makes sure your code is structured properly and is running in the most efficient way
# singleton -- avoids doing the same thing over and over again
    # will detect and reuse the same database connection instead of reloading repeatedly