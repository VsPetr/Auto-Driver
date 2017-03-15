<?php
class Auto extends Model{
    protected $_pdo;
    private $_autoId;
    private $_name;
    private $_brand;
    private $_engine;
    public function __construct()
    {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=entities','root','root',array(pdo::ATTR_PERSISTENT => true));
        /*$this->_auto_id = $_id;
        $this->_brand = $_brand;
        $this->_birth_year = $_birth_year;
        */
    }

    /**
     * Get all models
     *
     * @return array
     */
    public function all()
    {
        $stmt = $this->_pdo->query('SELECT auto_id, name, brand, engine FROM auto');
        return $stmt->fetchAll();
    }

    /**
     * Load model
     *
     * @param int $id
     * @return Model
     */
    public function load($id)
    {
        $stmt = $this->_pdo->query(
            'SELECT auto_id, name, brand, engine FROM auto WHERE auto_id = ' . $this->_pdo->quote($id)
        );
        $result = $stmt->fetch();
        $this->_autoId = $result['auto_id'];
        $this->_name = $result['name'];
        $this->_brand = $result['brand'];
        $this->_engine = $result['engine'];
        return $this;
    }

    /**
     * If object has id than update
     * Else create new model
     *
     * @return Model
     */
    public function save()
    {
        try {
            $name = $this->getName();
            $brand = $this->getBrand();
            $engine = $this->getEngine();
            if (!$this->getAutoId()) {
                $this->_pdo->query("INSERT INTO auto (name, brand, engine) VALUES ('$name', '$brand', '$engine')");
            } else {
                $this->_pdo->query(
                    "UPDATE auto SET name = '$name', brand = '$brand', engine = '$engine'" .
                    " WHERE auto_id = " . $this->getAutoId()
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
    }

    /**
     * Delete model
     *
     * @return void
     */
    public function delete()
    {
        $this->_pdo->query("delete from auto where auto_id = {$this->getAutoId()}");
    }

    public function getAutoId()
    {
        return $this->_autoId;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getBrand()
    {
        return $this->_brand;
    }

    public function getEngine()
    {
        return $this->_engine;
    }

    public function setAutoId($id)
    {
        $this->_autoId = $id;
        return $this;
    }

    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    public function setBrand($brand)
    {
        $this->_brand = $brand;
        return $this;
    }

    public function setEngine($engine)
    {
        $this->_engine = $engine;
        return $this;
    }

}