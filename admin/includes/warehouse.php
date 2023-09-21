<?php
class Merch
{

    protected static $db_table = "warehouse";
    public $id;
    public $merch_name;
    public $amount;
    public $orders;
    public $status;
    public $price;
    public $code;



    public static function find_all_merch()
    {
        return self::find_this_query("SELECT * FROM warehouse");
    }

    public static function find_merch_by_id($merch_id)
    {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM warehouse WHERE id=$merch_id LIMIT 1");

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

    public static function verify_merch($merch_name, $code)
    {
        global $database;
        $merch_name = $database->escape_string($merch_name);
        $code = $database->escape_string($code);

        $sql = "SELECT * FROM usuarios WHERE ";
        $sql .= "merch_name = '{$merch_name}' ";
        $sql .= "AND code = '{$code}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function verify_code($code)
    {
        global $database;
        $code = $database->escape_string($code);
        $sql = "SELECT * FROM warehouse WHERE ";
        $sql .= "code = '{$code}' ";
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

        $sql = "INSERT INTO " . self::$db_table . " (merch_name, amount, orders, status, price, code) ";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->merch_name) . "', ";
        $sql .= $database->escape_string($this->amount) . ", ";
        $sql .= $database->escape_string($this->orders) . ", '";
        $sql .= $database->escape_string($this->status) . "', ";
        $sql .= $database->escape_string($this->price) . ", ";
        $sql .= $database->escape_string($this->code) . ")";

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
        $sql .= "merch_name= '" . $database->escape_string($this->merch_name) . "', ";
        $sql .= "amount= " . $database->escape_string($this->amount) . ", ";
        $sql .= "orders= " . $database->escape_string($this->orders) . ", ";
        $sql .= "status= '" . $database->escape_string($this->status) . "', ";
        $sql .= "price= " . $database->escape_string($this->price) . ", ";
        $sql .= "code= " . $database->escape_string($this->code) . " ";
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
