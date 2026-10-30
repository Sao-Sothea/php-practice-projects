<?php

function withdraw(float $balance, float $amount): float
{
    if ($balance < 0) {
        throw new InvalidArgumentException(
            "Balance cannot be negative."
        );
    }

    if ($amount <= 0) {
        throw new InvalidArgumentException(
            "Withdrawal amount must be greater than zero."
        );
    }

    if ($amount > $balance) {
        throw new Exception("Insufficient balance.");
    }

    return $balance - $amount;
}

$balance = 500;

try {
    $balance = withdraw($balance, 200);

    echo "Withdrawal successful.<br>";
    echo "Remaining balance: $" . $balance;
} catch (InvalidArgumentException | Exception $e) {
    echo "Transaction failed: " . $e->getMessage();
} finally {
    echo "<br>Transaction process completed.";
}
?>