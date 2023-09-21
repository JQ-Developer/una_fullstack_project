<?php
class Agency
{

    protected static $db_table = "agencias";
    public $id;
    public $name;
    public $responsible;
    public $assets;
    public $email;
    public $address;
    public $telf;
    public $created_at;



    public static function find_all_agencies()
    {
        return self::find_this_query("SELECT * FROM agencias");
    }

    public static function find_agency_by_id($agency_id)
    {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM agencias WHERE id=$agency_id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_this_query($sql)
    {
        global $database;
        $result_set = $database->query($sql);

        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantiation($row);
        }

        return $the_object_array;
    }


    public static function verify_id($id)
    {
        global $database;
        $code = $database->escape_string($id);
        $sql = "SELECT * FROM agencias WHERE ";
        $sql .= "id = '{$id}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function instantiation($the_record)
    {
        $the_object = new self;

        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public function create()
    {
        global $database;
        $sql = "INSERT INTO " . self::$db_table . " (name, responsible, assets, email, address, telf) ";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->name) . "', '";
        $sql .= $database->escape_string($this->responsible) . "', ";
        $sql .= $database->escape_string($this->assets) . ", '";
        $sql .= $database->escape_string($this->email) . "', '";
        $sql .= $database->escape_string($this->address) . "', '";
        $sql .= $database->escape_string($this->telf) . "')";

        echo ($sql);

        if ($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return true;
        }
    }

    public function update()
    {
        global $database;
        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= "name= '" . $database->escape_string($this->name) . "', ";
        $sql .= "responsible= '" . $database->escape_string($this->responsible) . "', ";
        $sql .= "assets= " . $database->escape_string($this->assets) . ", ";
        $sql .= "email= '" . $database->escape_string($this->email) . "', ";
        $sql .= "address= '" . $database->escape_string($this->address) . "', ";
        $sql .= "telf= '" . $database->escape_string($this->telf) . "' ";
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function delete()
    {
        global $database;
        $sql = "DELETE FROM " . self::$db_table;
        $sql .= " WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }
}
