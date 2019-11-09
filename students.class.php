<?php
class students extends ObjectModel
{
    public $name;
    public $date_of_birth;
    public $is_studying;
    public $average_rating;

    public static $definition = array(
        'table' => 'students',
        'primary' => 'id',
        'multilang' => false,
        'fields' => array(
            'id' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName'),
            'date_of_birth' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'is_studying' => array('type' => self::TYPE_BOOL),
            'average_rating' => array('type' => self::TYPE_FLOAT, 'validate' => 'isUnsignedFloat'),
        ),
    );

    public static function getStudents()
    {
        $sql = 'SELECT `name` FROM ' ._DB_PREFIX_. 'students ORDER BY `average_rating` DESC LIMIT 1';
        return Db::getInstance()->executeS($sql);
    }

    public static function getBestStudent()
    {
        $sql = 'SELECT `name` FROM ' ._DB_PREFIX_. 'students ORDER BY `average_rating` DESC';
        return Db::getInstance()->getValue($sql);
    }

    public static function getBestAverageRating()
    {
        $sql = 'SELECT `average_rating` FROM ' ._DB_PREFIX_. 'students ORDER BY `average_rating` DESC';
        return Db::getInstance()->getValue($sql);
    }
}