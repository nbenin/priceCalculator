<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $POST)
    {

        // Make customer and product depending on the GET/POST
        var_dump($POST);

        //load the view
        require 'View/homepage.php';

    }

    public function loadObjects()
    {
        // set empty arrays to hold objects
        $customerObjects = [];
        $productObjects = [];

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

        // Connect the groups to each customer
        foreach($customerObjects as $customer) {

            // Flags for end of chain and group #
            $nextGroup = $customer->getGroupId();
            $endOfList = false;

            while ($endOfList === false) {
                foreach ($groupsJson as $group) {
                    if ($nextGroup === $group{'id'}) {
                        $customer->addGroup($group);
                        if(isset($group{'group_id'})) {
                            $nextGroup = $group{'group_id'};
                            break;
                        } else {
                            $endOfList = true;
                            break;
                        }
                    }
                }
            }
        }
    var_dump($customerObjects);
        // Store objects in Session
        $_SESSION['customers'] = $customerObjects;
        $_SESSION['products'] = $productObjects;


    }
}