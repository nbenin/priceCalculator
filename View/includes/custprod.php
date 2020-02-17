<label for="Customers"> Find Customers:</label>
<select id="customer" name="customer">
    <?php foreach($customerJson as $customer) {
        echo '<option value="' . $customer{"id"} . '">' . $customer{"name"} . '</option>';
    } ?>

</select>

<label for="products">Products:</label>
<select id="products" name="products">
    <?php foreach($productsJson as $product) {
        echo '<option value="' . $product{"id"} . '">' . $product{"name"} . '</option>';
    } ?>
</select>

<button type="submit" class="btn btn-secondary btn-lg">Search</button>
