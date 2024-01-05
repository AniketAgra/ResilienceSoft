<?php
require('stripe-php-master/init.php');
$publishableKey="pk_live_H7raYbpQSnBygosj5eDJd6rm";
$secretKey="sk_live_hhGCSncAMNRDjmpPMobAHqVT";
\Stripe\Stripe::setApiKey($secretKey);
?>
<form method="post">
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
		data-amount="100"
		data-name="Payment Name"
		data-description="Payment Description"
		data-image="https://www.logostack.com/wp-content/uploads/designers/eclipse42/small-panda-01-600x420.jpg"
		data-currency="USD"
		data-email="sunil@roam1.com"
	>
	</script>
</form>

<?php
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>100,
		"currency"=>"USD",
		"description"=>"Payment Description",
		"source"=>$token,
	));

	echo "<pre>";
	print_r($data);
}
?>