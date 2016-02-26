<?php

namespace Hyn\DirHelpers\Models;

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Directory
 *
 * @package Hyn\DirHelpers\Models
 *
 * @property int    $id
 * @property string $name
 * @property string $path
 */
class Directory extends Model
{

    protected static $hyn_connection;

    /**
     * @param Connection $hyn_connection
     */
    public static function setHynConnection(Connection $hyn_connection)
    {
        self::$hyn_connection = $hyn_connection;
    }

    /**
     * {@inheritdoc}
     */
    public function getConnection()
    {
        return self::$hyn_connection;
    }
}