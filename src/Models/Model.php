<?php

namespace Sastiam\CourseSolid\Models;

use DateTime;

abstract class Model
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var DateTime
     */
    private DateTime $createdAt;
    /**
     * @var DateTime
     */
    private DateTime $updateAt;

    /**
     * @param int $id
     * @param DateTime $updateAt
     */
    public function __construct(int $id, DateTime $updateAt)
    {
        $this->id = $id;
        $this->createdAt = new DateTime();
        $this->updateAt = $updateAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdateAt(): DateTime
    {
        return $this->updateAt;
    }
}