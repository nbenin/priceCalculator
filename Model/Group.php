<?php
declare(strict_types=1);

class Group
{
    // Constructor and attributes
    private $id;
    private $name;
    private $discount;
    private $group_id;

    public function __construct(int $id, string $name, array $discount, int $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->discount = $discount;
        $this->group_id = $group_id;
    }

    // Getters
    public function getId() : int {
        return $this->id;
    }
    public function getName() : string {
        return $this->name;
    }
    public function getDiscount() : array {
        return $this->discount;
    }
    public function getGroupId() : int {
        return $this->group_id;
    }
}
