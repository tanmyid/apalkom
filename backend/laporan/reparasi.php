<?php
require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'stretch']);

// Document Metadata
include '../function.php';
$mpdf->SetTitle('Laporan Reparasi');
$mpdf->SetAuthor($_SESSION['nama']);
$mpdf->SetCreator('SMA N 1 PATI');
$mpdf->SetSubject('Data Aset');

function print_data()
{
    $html = '';
    include '../function.php';
    $no = 1;
    while ($row = $get_data_reparasi->fetch_array()) {
        $html .= '<tr>
            <td>' . $no++ . '</td>
            <td>' . $row["kode_aset"] . '</td>
            <td>' . $row["kategori"] . '</td>
            <td>' . $row["nama"] . '</td>
            <td>' . ucwords(str_replace("_", " ", $row["status_reparasi"])) . '</td>
            <td>' . $row["tgl_masuk"] . '</td>
            <td>' . $row["tgl_keluar"] . '</td>            
        </tr>';
    }
    return $html;
}
// SET HEADER (KOP SURAT)
$htmlHeader = <<<EOD
<table>
    <tr>
        <td style="border-style: none;"><img src="../../assets/images/logo-sma.jpg" style="float: left; margin-right: 50px;" width="80"></td>
        <td style="border-style: none;">
            <span>PEMERINTAH PROVINSI JAWA TENGAH </span><br>
            <span>DINAS PENDIDIKAN DAN KEBUDAYAAN </span><br>
            <b>SEKOLAH MENENGAH ATAS NEGERI 1 PATI</b> <br>
            <small>Jalan  Panglima  Sudirman Nomor  24  Pati Kode Pos 59113 Telepon 0295 - 381454</small><br>
            <small>Faksimile 0295 – 381491 Surat Elektronik smansapati@yahoo.com</small>
        </td>
        <td style="border-style: none;"></td>
        <td style="border-style: none;"></td>
        <td style="border-style: none;"></td>
        <td style="border-style: none;"></td>
        <td style="border-style: none;"></td>
    </tr>
</table>
<hr>
EOD;
// SET FOOTER
$htmlFooter = <<<EOD
<table width="100%">
    <tr>
        <td width="33%" style="text-align: left; border-style: none;">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right; border-style: none;">Reparasi Aset</td>
    </tr>
</table>
EOD;

// KONTEN
$html = <<<EOD
<html><head></head> <style>body { font-family: monospace; } p { padding-top: 1; font-size: xx-large; font-weight: bolder; } table {border-collapse: collapse; width: 100%; margin: auto; font-size: large; } th,td { border: 1px solid; text-align: left; padding: 8px; text-align: center; width: auto;} th {background-color: grey; color: azure; } </style>
<body><div><table><thead>
<tr>
    <th>No</th>
    <th>Kode Aset</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Status Reparasi</th>
    <th>Tanggal Masuk</th>
    <th>Tanggal Keluar</th>
</tr>
</thead>
EOD;
$html .= print_data();
$html .= '</table></div></body></html>';

// 
$mpdf->setHTMLHeader($htmlHeader, 'O');
$mpdf->setHTMLFooter($htmlFooter, 'O');
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);


$mpdf->Output('laporan Reparasi ' . date('Y-m-d') . '.pdf', 'I');
// $mpdf->OutputFile(__DIR__ . '/pdf/' . base64_encode(substr(str_shuffle('0123456789'), 0, 3)) . '.pdf');
