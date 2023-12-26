<?php
session_start();
// Include configuration file
include_once 'config.php';

// Include database connection file
include_once 'connect.php';

// If transaction data is available in the URL
if(!empty($_GET['ad']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){
    // Get transaction information from URL
    $ad = $_GET['ad'];
    $txn_id = $_GET['tx'];
    $payment_gross = $_GET['amount'];
    $currency_code = $_GET['cc'];
    $payment_status = $_GET['st'];

    // Get product info from the database
    $productResult = $db->query("SELECT * FROM store WHERE id = ".$ad);
    $productRow = $productResult->fetch_assoc();

    // Check if transaction data exists with the same TXN ID.
    $prevPaymentResult = $db->query("SELECT * FROM payments WHERE txn_id = '".$txn_id."'");

    if($prevPaymentResult->num_rows > 0){
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $payment_id = $paymentRow['payment_id'];
        $payment_gross = $paymentRow['payment_gross'];
        $payment_status = $paymentRow['payment_status'];
    }else{
        // Insert tansaction data into the database
        $insert = $db->query("INSERT INTO payments(ad,txn_id,payment_gross,currency_code,payment_status)
         VALUES('".$ad."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
        $payment_id = $db->insert_id;

        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute(array($_SESSION['clientid']));
        $user = $stmt->fetch();
        $pt = $user['points']  + $productRow['points'];

        $stmt2 = $conn->prepare("UPDATE users SET points = ? WHERE id = ?");
        $stmt2->execute(array($pt, $_SESSION['clientid']));
    }
}
?>

<div class="container">
    <div class="status">
        <?php if(!empty($payment_id)){ ?>
            <h1 class="success">Your Payment has been Successful</h1>

            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $txn_id; ?></p>
            <p><b>Paid Amount:</b> <?php echo $payment_gross; ?></p>
            <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>

            <h4>Product Information</h4>
            <p><b>Your buy a :</b> <?php echo $productRow['points']; ?></p>
            <p><b>with Price:</b> <?php echo $productRow['moneyd']; ?></p>
        <?php }else{ ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>
    </div>
    <a href="index.php" class="btn-link">Back to Products</a>
</div>
