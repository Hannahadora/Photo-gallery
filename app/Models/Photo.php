<?php

class Photo
{
    public $id;
    public $user_id;
    public $title;
    public $description;
    public $filename;
    public $filetype;
    public $filesize;
    public $upload_date;

    public static function find_all_photos()
    {
        return self::find_this_query("SELECT * FROM photos ORDER BY upload_date DESC");
    }

    public static function get_photo_by_id($id)
    {
        $result_array = self::find_this_query("SELECT * FROM photos WHERE id = $id LIMIT 1");
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

    public static function create_photo($title, $description, $filename, $filetype, $filesize)
    {
        global $database;

        $title = $database->escape_string($title);
        $description = $database->escape_string($description);
        $filename = $database->escape_string($filename);
        $filetype = $database->escape_string($filetype);
        $filesize = (int) $filesize;

        $sql = "INSERT INTO photos (title, description, filename, filetype, filesize, upload_date) ";
        $sql .= "VALUES ('{$title}', '{$description}', '{$filename}', '{$filetype}', {$filesize}, NOW())";

        $database->query($sql);

        return $database->the_insert_id();
    }

    public function save()
    {
        global $database;

        $this->title = $database->escape_string($this->title);
        $this->description = $database->escape_string($this->description);
        $this->filename = $database->escape_string($this->filename);
        $this->filetype = $database->escape_string($this->filetype);
        $this->filesize = (int) $this->filesize;

        $sql = "INSERT INTO photos (title, description, filename, filetype, filesize, upload_date) ";
        $sql .= "VALUES ('{$this->title}', '{$this->description}', '{$this->filename}', '{$this->filetype}', {$this->filesize}, NOW())";

        $database->query($sql);

        $this->id = $database->the_insert_id();

        return $this->id;
    }

    public static function instantiation($the_record)
    {
        $the_object = new self;

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