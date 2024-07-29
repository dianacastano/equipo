<?php
// Incluir el archivo de configuración
require_once __DIR__ . '/../config.php';

// Incluir el modelo de contactos
require_once MODEL_PATH . 'equipo_modelo.php';

class EquipoController {
    private $db;
    private $equipo;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->equipo = new Equipo($this->db);
    }

    public function showAddForm() {
        require_once VIEW_PATH .  'anadeequipo.php';
    }

    public function addEquipo() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->equipo->nombre_equipo = $_POST['nombre_equipo'];

            if($this->equipo->create()) {
                require_once VIEW_PATH .  'equipoanadido.php';
            } else {
                echo "Error al añadir el equipo.";
            }
        }
    }
}
?>
