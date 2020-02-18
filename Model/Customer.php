<?php
declare(strict_types=1);

class Customer
{
    // Constructor and attributes
    private $customerId;
    private $customerName;
    private $customerGroupId;
    private $groupsArray = [];

    public function __construct(int $customerId, string $name, int $customerGroupId)
    {
        $this->customerId = $customerId;
        $this->customerName = $name;
        $this->customerGroupId = $customerGroupId;
    }

    // Getters
    public function getId() : int {
        return $this->customerId;
    }
    public function getName() : string {
        return $this->customerName;
    }
    public function getGroupId() : int {
        return $this->customerGroupId;
    }
    public function getGroupsArray() : array {
        return $this->groupsArray;
    }

    // Function to add groups to object
    public function addGroups($obj) {
        array_push($this->groupsArray, $obj);
    }
}