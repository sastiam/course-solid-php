<?php

namespace Sastiam\CourseSolid\Db\Mysql;

interface DBConnectionInterface
{
    public function connect(): \PDO;
}