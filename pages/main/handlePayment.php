<?php
echo "<script>
const urlParams = new URLSearchParams(window.location.search);
const resultCode = urlParams.get('resultCode');

if (resultCode && resultCode === '1006') {
    window.location.href = 'http://localhost:8080/WebSite_JA/index.php?quanly=showAllProduct&page=1'
} else {
    window.location.href = 'http://localhost:8080/WebSite_JA/pages/main/paymentSuccess.php';
}
    </script>"
    ?>
