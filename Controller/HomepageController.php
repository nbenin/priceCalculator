<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $POST)
    {
        // set empty arrays to hold objects
        $customerObjects = [];
        $productObjects = [];
        $groupObjects = [];

        // Get Json files and make objects of the right customer/product/groups
        $customerJson = json_decode(file_get_contents('jsons/customers.json'), true);
        $productsJson = json_decode(file_get_contents('jsons/products.json'), true);
        $groupsJson = json_decode(file_get_contents('jsons/groups.json'), true);

        foreach ($customerJson as $customers) {
            array_push($customerObjects, new Customer($customers{'id'}, $customers{'name'}, $customers{'group_id'}));
        }
        foreach ($productsJson as $product) {
            array_push($productObjects, new Product($product{'id'}, $product{'name'}, $product{'description'}, $product{'price'}));
        }
        foreach ($groupsJson as $group) {
            // Sorting discounts for object
            $fixed_discount = 0;
            $variable_discount = 0;
            $groupId = 100;
            if (isset($group{'fixed_discount'})) {
                $fixed_discount = $group{'fixed_discount'};
            } else {
                $variable_discount = $group{'variable_discount'};
            }
            // Case for groups without group id
            if (!isset($group{'group_id'})) {
                break;
            } else {
                $groupId = $group{'group_id'};
            }
            array_push($groupObjects, new Group($group{'id'}, $group{'name'}, $variable_discount, $fixed_discount, $groupId));
        }


        // Connect the groups to each customer
        var_dump($groupObjects);
        //var_dump($customerObjects);
        //var_dump($productObjects);

        // Make customer and product depending on the GET/POST
        var_dump($POST);

        //load the view
        require 'View/homepage.php';
    }
}