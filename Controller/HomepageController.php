<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $POST)
    {
        // Make customer and product depending on the GET/POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->calculateDiscount($POST);
        }

        // Load the view
        require 'View/homepage.php';

    }

    public function loadObjects()
    {
        // Set empty arrays to hold objects
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
        // Store objects in Session
        $_SESSION['customers'] = $customerObjects;
        $_SESSION['products'] = $productObjects;
    }

    public function calculateDiscount($POST) {

        // Getting object of chosen stuff
        $chosenProductPrice = $_SESSION["products"][$POST["products"]]->getPrice();
        $chosenCustomerGroup = $_SESSION["customers"][$POST["customer"]]->getGroupsArray();

        $fixedDiscount = [];
        $variableDiscount = [];

        foreach ($chosenCustomerGroup as $value){
            if (isset($value{"fixed_discount"})) {
                array_push($fixedDiscount, $value{"fixed_discount"});
            }
            if(isset($value{"variable_discount"})) {
                array_push($variableDiscount, $value{"variable_discount"});
            }
        }
        $fixedDiscount = array_sum($fixedDiscount);
        $variableDiscount = max($variableDiscount);

        $discountedPriceFixed = $chosenProductPrice - $fixedDiscount;
        $discountedPriceVariable =   $chosenProductPrice - ($chosenProductPrice * ($variableDiscount / 100));

        $bestDeal = 0;

        if($discountedPriceFixed <= $discountedPriceVariable && $discountedPriceFixed >= 0) {
            $bestDeal = $discountedPriceFixed;
            $discountUsed = 'You saved: &euro;' . $fixedDiscount . ' by using a fixed discount.';
        } else {
            $bestDeal = $discountedPriceVariable;
            $discountUsed = 'You saved: %' . $variableDiscount . ' by using a variable discount.';
        }

        $_SESSION['discountUsed'] = $discountUsed;
        $_SESSION['bestDeal'] = $bestDeal;
    }
}