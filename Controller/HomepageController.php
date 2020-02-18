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
            array_push($groupObjects, new Group($group{'id'}, $group{'name'}, $group{'variable_discount'}, $group{'group_id'}));
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