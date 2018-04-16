<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

    <form action="/api/purchases" method="POST">
        <input type="hidden" name="customer_id" value="4f46ce4f-8f33-4f10-aec1-e527d13be67d">
        <input type="hidden" name="schedule_id" value="9634960e-0fba-40f8-88aa-ec34c80b9179">
        <input type="hidden" name="seat_id" value="6ddc57ef-a974-4dab-8b0c-f4c9d4cc551c">
        <input type="hidden" name="promo_id" value="4a06acb3-1af6-42f6-85ca-bb1b9eaa82fb">
        <input type="hidden" name="quantity" value="2">
        <input type="hidden" name="total_price" value="10000">
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_18fkuvplx0UaWxpA8IOObWP2"
            data-amount="999"
            data-name="JAVTix"
            data-description="Widget"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
    </script>
    </form>

</body>
</html>