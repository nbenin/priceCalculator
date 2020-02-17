<label for="Customers"> Find Customers:</label>
<select id="customer" name="customer">
    <?php foreach($customerObjects as $customer) {
        echo '<option value="' . $customer->getId() . '">' . $customer->getName() . '</option>';
    } ?>

</select>

<label for="products">Products:</label>
<select id="products" name="products">
    <?php foreach($productObjects as $product) {
        echo '<option value="' . $product->getId() . '">' . $product->getName() . '</option>';
    } ?>
</select>

<button type="submit" class="btn btn-secondary btn-lg">Search</button>
