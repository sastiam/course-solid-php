<?php

namespace Sastiam\CourseSolid\Db\Mysql;
use PDO;

interface DBConnectionInterface
{
    public function connect(): PDO;
}