<?php

include __DIR__ . '/../config/conn.php';

function generateCode($length = 8) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $code = "";
    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $code;
}

// Safety check for user is member and form was POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST'
    || !isset($_SESSION['user_id'])
    || $_SESSION['user_role'] !== "member") {
    
    header("Location: /RWDD2507/public/?page=rewards");
    exit;
}

$userId = (int) $_SESSION['user_id'];
$rewardId = (int) $_POST['reward_id'];

// Start the transaction
mysqli_begin_transaction($conn);

try {
    // Get and Lock Reward for Transaction
    $result = mysqli_query($conn, "SELECT * FROM rewards WHERE reward_id = $rewardId FOR UPDATE");
    $reward = mysqli_fetch_assoc($result);
    $cost = (int) $reward['point_cost'];
    
    // Check user points
    $result = mysqli_query($conn, "SELECT SUM(points) AS total_points FROM points_ledger WHERE user_id = {$userId} FOR UPDATE");
    $row = mysqli_fetch_assoc($result);
    $totalPoints = (int) $row['total_points'];
    
    // Safety check sufficient points
    if ($totalPoints < $cost) {
        throw new Exception("Not enough points.");
    }
    
    $deduction = -$cost;
    
    // Update Transaction Ledger
    mysqli_query($conn, "INSERT INTO points_ledger VALUES (NULL, {$userId}, NULL, {$rewardId}, {$deduction}, NOW())");
    $ledgerId = mysqli_insert_id($conn);
    
    // Update Rewards Stock
    mysqli_query($conn, "UPDATE rewards SET quantity = quantity - 1 WHERE reward_id = {$rewardId}");
    
    // Update Claimed Rewards Table
    $code = generateCode(8);
    mysqli_query($conn, "INSERT INTO claimed_rewards VALUES ({$ledgerId}, '{$code}', 'Active', NULL)");
    
    // Successful
    mysqli_commit($conn);
    $_SESSION['message'] = "Reward redeemed successfully!";
    $_SESSION['message_type'] = 'success';
}
catch (Exception $e) {
    mysqli_rollback($conn);
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['message_type'] = 'error';
}

header("Location: /RWDD2507/public/?page=rewards")
    
?>