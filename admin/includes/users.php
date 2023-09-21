<?php
class Users
{

    protected static $db_table = "usuarios";
    public $id;
    public $username;
    public $pwd;
    public $email;
    public $permissions;
    public $age;
    public $approved;
    public $created_at;


    public static function find_all_users()
    {
        return self::find_this_query("SELECT * FROM usuarios");
    }

    public static function find_user_by_id($user_id)
    {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM usuarios WHERE id=$user_id LIMIT 1");

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

    public static function verify_user($username, $pwd)
    {
        global $database;
        $username = $database->escape_string($username);
        $pwd = $database->escape_string($pwd);

        $sql = "SELECT * FROM usuarios WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND pwd = '{$pwd}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function verify_email($email)
    {
        global $database;
        $email = $database->escape_string($email);
        $sql = "SELECT * FROM usuarios WHERE ";
        $sql .= "email = '{$email}' ";
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

        $sql = "INSERT INTO " . self::$db_table . " (username, email, age, pwd, permissions, approved) ";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->username) . "', '";
        $sql .= $database->escape_string($this->email) . "', ";
        $sql .= $database->escape_string($this->age) . ", '";
        $sql .= $database->escape_string($this->pwd) . "', '";
        $sql .= $database->escape_string($this->permissions) . "', ";
        $sql .= $database->escape_string($this->approved) . ")";

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
        $sql .= "username= '" . $database->escape_string($this->username) . "', ";
        $sql .= "email= '" . $database->escape_string($this->email) . "', ";
        $sql .= "age= '" . $database->escape_string($this->age) . "', ";
        $sql .= "pwd= '" . $database->escape_string($this->pwd) . "', ";
        $sql .= "permissions= '" . $database->escape_string($this->permissions) . "', ";
        $sql .= "approved= '" . $database->escape_string($this->approved) . "' ";
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
