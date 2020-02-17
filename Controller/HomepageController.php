<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        
        // Get Json files and make objects of the right customer/product
        $customerJson = file_get_contents('jsons/customers.json');
        $productsJson = file_get_contents('jsons/products.json');
        var_dump($productsJson);
        var_dump($customerJson);


        // Make customer and product depending on the GET/POST
        $customer = new Customer('John Smith', 1);

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}