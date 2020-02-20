<label for="Customers"> Find Customers:</label>
<select id="customer" name="customer">
    <?php foreach($_SESSION['customers'] as $customer) {
        echo '<option value="' . $customer->getId() . '">' . $customer->getName() . '</option>';
    } ?>
</select>
<br>
<br>
<label for="products">Products:</label>
<select id="products" name="products">
    <?php foreach($_SESSION['products'] as $product) {
        echo '<option value="' . $product->getId() . '">' . $product->getName() . '</option>';
    } ?>
</select>
<br>
<br>


<button type="submit" style="width: 140px; height: 60px;border-radius: 14px;">Search</button>



