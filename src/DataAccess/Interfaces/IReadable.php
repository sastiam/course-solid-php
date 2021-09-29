<?php

namespace Sastiam\CourseSolid\DataAccess\Interfaces;

interface IReadable {
    public function get(int $id);
    public function getAll();
}

