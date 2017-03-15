<?php
class Drive extends Model{
    protected $_pdo;
    private $_driverId;
    private $_name;
    private $_age;
    public function __construct()
    {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=entities','root','root',array(pdo::ATTR_PERSISTENT => true));
    }
    /**
     * Get all models
     *
     * @return array
     */
    public function all()
    {
        $stmt = $this->_pdo->query('SELECT driver_id, name, age FROM driver');
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
            'SELECT driver_id, name, age FROM driver WHERE driver_id = ' . $this->_pdo->quote($id)
        );
        $result = $stmt->fetch();
        $this->_driverId = $result['driver_id'];
        $this->_name = $result['name'];
        $this->_age = $result['age'];
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
            $age = $this->getAge();
            if (!$this->getDriverId()) {
                $this->_pdo->query("INSERT INTO driver (name, age) VALUES ('$name', '$age')");
            } else {
                $this->_pdo->query(
                    "UPDATE drive SET name = '$name', age = '$age'" .
                    " WHERE driver_id = " . $this->getDriverId()
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
        $this->_pdo->query("delete from driver where driver_id = {$this->getDriverId()}");
    }

    public function getDriverId()
    {
        return $this->_driverId;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setDriverId($id)
    {
        $this->_driverId = $id;
        return $this;
    }

    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    public function setAge($age)
    {
        $this->_age = $age;
        return $this;
    }
}