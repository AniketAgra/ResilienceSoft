<!--script src="https://cdn.lr-in-prod.com/LogRocket.min.js" crossorigin="anonymous"></script>
<script>window.LogRocket && window.LogRocket.init('i6psi1/gsm2go-esim');</script-->
<?php
$log_userId = '0';
$log_email = 'guestuser@notsignedin.com';
$log_name = 'Guest User';
if(isset($_SESSION['userId']) && $_SESSION['userId'] != '') {
    $log_userId = $_SESSION['userId'];
    $log_email = $_SESSION['user'];
    $log_name = $_SESSION['name'];
    
}
?>
<!--script>
    window.LogRocket && window.LogRocket.init('i6psi1/gsm2go-esim');
    LogRocket.identify('<?php echo $log_userId; ?>', {
        name: '<?php echo $log_name; ?>',
        email: '<?php echo $log_email; ?>',
        userId: '<?php echo $log_userId; ?>',
        // Add your own custom user variables here, ie:
        subscriptionType: 'free'
    });
</script-->