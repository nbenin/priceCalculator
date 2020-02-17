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

        // Get Json files and make objects of the right customer/product
        $customerJson = json_decode(file_get_contents('jsons/customers.json'), true);
        $productsJson = json_decode(file_get_contents('jsons/products.json'), true);

        foreach ($customerJson as $customers) {
            array_push($customerObjects, new Customer($customers{'id'}, $customers{'name'}, $customers{'group_id'}));
        }
        foreach ($productsJson as $product) {
            array_push($productObjects, new Product($product{'id'}, $product{'name'}, $product{'description'}, $product{'price'}));
        }
        //var_dump($customerObjects);
        //var_dump($productObjects);

        // Make customer and product depending on the GET/POST
        var_dump($POST);

        //load the view
        require 'View/homepage.php';
    }
}