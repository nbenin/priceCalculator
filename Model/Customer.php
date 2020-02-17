<?php
declare(strict_types=1);

class Customer
{
    private $customerName;
    private $customerGroupId;

    public function __construct(string $name, int $customerGroupId)
    {
        $this->customerName = $name;
        $this->customerGroupId = $customerGroupId;
    }

    public function getName() : string
    {
        return $this->customerName;
    }

    public function getGroupId() : int
    {
        return $this->customerGroupId;
    }
}