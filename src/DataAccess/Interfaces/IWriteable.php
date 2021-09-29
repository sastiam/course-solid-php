<?php

namespace Sastiam\CourseSolid\DataAccess\Interfaces;

interface IWriteable
{
    public function update(int $id, object $obj);

    public function create(object $obj);
}