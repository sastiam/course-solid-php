<?php

namespace Sastiam\CourseSolid\Models\User;

abstract class Model
{
    private int $id;
    private \DateTime $createdAt;
    private \DateTime $updateAt;

    public function __construct(int $id, \DateTime $updateAt)
    {
        $this->id = $id;
        $this->createdAt = new \DateTime();
        $this->updateAt = $updateAt;
    }
}