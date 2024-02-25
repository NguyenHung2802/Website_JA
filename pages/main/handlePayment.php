<?php
echo "<script>
const urlParams = new URLSearchParams(window.location.search);
const resultCode = urlParams.get('resultCode');

if (resultCode && resultCode === '1006') {
    window.location.href = 'http://localhost:88/N7_PHP_Website_BanDT/index.php'
} else {
    window.location.href = 'http://localhost:88/N7_PHP_Website_BanDT/pages/main/paymentSuccess.php';
}
    </script>"
    ?>
