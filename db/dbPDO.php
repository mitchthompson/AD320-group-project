<?php

/**
 * Created by PhpStorm.
 * User: ahand
 * Date: 2/22/17
 * Time: 6:14 PM
 */
class dbPDO extends PDO
{
    public function __construct($file = 'db/db_settings.ini')
    {
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');

        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];

        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
}