<div class="card text-center">
    <div class="card-body">
        <h2 class="card-title">
            <?php echo ucwords($_SESSION['products'][$_POST['products']]->getName()); ?>
        </h2>
        <p class="card-text">
            <?php echo 'Before: <s>&euro;' .  $_SESSION['products'][$_POST['products']]->getPrice() . '</s>' ?>
        </p>
        <p class="card-text">
            <?php echo 'Now only: &euro;' . round($_SESSION['bestDeal'], 2) . '!' ?>
        </p>
        <p class="card-text">
            <?php echo $_SESSION['discountUsed'] ?>
        </p>
    </div>
</div>