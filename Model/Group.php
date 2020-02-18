<?php
declare(strict_types=1);

class Group
{
    // Constructor and attributes
    private $id;
    private $name;
    private $variable_discount;
    private $group_id;

    public function __construct(int $id, string $name, int $variable_discount, int $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->variable_discount = $variable_discount;
        $this->group_id = $group_id;
    }

    // Getters
    public function getId() : int {
        return $this->id;
    }
    public function getName() : string {
        return $this->name;
    }
    public function getDiscount() : int {
        return $this->variable_discount;
    }
    public function getGroupId() : int {
        return $this->group_id;
    }
}
