<?php
class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;



    public static function find_all_users()
    {

        return self::find_this_query("SELECT * FROM users");
    }

    public static function get_user_by_id($id)
    {
        $result_array = self::find_this_query("SELECT * FROM users WHERE id = $id LIMIT 1");
        return !empty($result_array) ? $result_array[0] : null;
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

    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
        $result_array = self::find_this_query($sql);

        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function instantiation($the_record)
    {
        $the_object = new self;

        // $the_object->id         = $found_user['id'];
        // $the_object->username   = $found_user['username'];
        // $the_object->password   = $found_user['password'];
        // $the_object->first_name = $found_user['first_name'];
        // $the_object->last_name  = $found_user['last_name'];

        foreach ($the_record as $key => $value) {
            if ($the_object->has_the_attribute($key)) {
                $the_object->$key = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($attribute, $object_properties);
    }
}
