<?php
require '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

include("../../config/connect.php");

$query = mysqli_query($connect, "SELECT cart.idCart, users.idUser, fullName, phone , address , statusCart , SUM(sellingPrice * quantity) as result, cart.createdAt 
                                FROM cart INNER JOIN users 
                                ON cart.idUser = users.idUser 
                                INNER JOIN cart_detail 
                                ON cart.idCart = cart_detail.idCart 
                                INNER JOIN products 
                                ON cart_detail.idProduct = products.idProduct 
                                WHERE statusCart != 0 
                                GROUP BY cart.idCart, users.idUser, fullName, statusCart, cart.createdAt;
                                ");

// Tạo tiêu đề
$sheet
    ->setCellValue('A1', 'STT')
    ->setCellValue('B1', 'Mã đơn hàng')
    ->setCellValue('C1', 'Mã khách hàng')
    ->setCellValue('D1', 'Họ tên')
    ->setCellValue('E1', 'Số điện thoại')
    ->setCellValue('F1', 'Địa chỉ')
    ->setCellValue('G1', 'Trạng Thái')
    ->setCellValue('H1', 'Giá trị đơn hàng')
    ->setCellValue('I1', 'Ngày đặt');

// Ghi dữ liệu
$rowCount = 2;
$stt = 1;
foreach ($query as $key => $value) {
    $sheet->setCellValue('A' . $rowCount, $stt);
    $sheet->setCellValue('B' . $rowCount, $value['idCart']);
    $sheet->setCellValue('C' . $rowCount, $value['idUser']);
    $sheet->setCellValue('D' . $rowCount, $value['fullName']);
    $sheet->setCellValue('E' . $rowCount, $value['phone']);
    $sheet->setCellValue('F' . $rowCount, $value['address']);
    $sheet->setCellValue('G' . $rowCount, $value['statusCart']);
    $sheet->setCellValue('H' . $rowCount, $value['result']);
    $sheet->setCellValue('I' . $rowCount, $value['createdAt']);
    $rowCount++;
    $stt++;
}
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setOffice2003Compatibility(true);

// Tạo tên file với timestamp để đảm bảo tên duy nhất

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DS_Don_Hang.xls"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');

echo
"<script>
    alert('Xuất file thành công!');
  location.href = '../../index.php?quanly=orders'
</script>";
