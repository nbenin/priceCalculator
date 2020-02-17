<label for="Customers"> Find Customers:</label>
<select id="customer" name="customer">
    <?php foreach($customerJson as $customer) {
        echo '<option value="' . $customer{"id"} . '">' . $customer{"name"} . '</option>';
    } ?>

</select>

<label for="products">Products:</label>
<select id="products" name="products">
    <option value="prod1">Prod1</option>
    <option value="prod2">Prod2</option>
    <option value="prod3">Prod3</option>
    <option value="prod4">Prod4</option>
</select>

<button type="submit" class="btn btn-secondary btn-lg">Search</button>
