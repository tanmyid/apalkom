<?php
require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'pad', 'default_font' => 'dejavusans']);

// Document Metadata
include '../includes.php';
$mpdf->SetTitle('Surat Pengajuan');
$mpdf->SetAuthor($_SESSION['nama']);
$mpdf->SetCreator('SMA N 1 PATI');
$mpdf->SetSubject('Reparasi');

// custom variable for EOD
include '../tgl.php';
$kalab = $_SESSION['nama'];

function print_data()
{
    $html = '';
    include '../includes.php';
    $no = 1;
    while ($row = $get_data_pengajuan->fetch_array()) {
        $html .= '<tr>
            <td>' . $no++ . '</td>
            <td>' . $row["kategori"] . '</td>
            <td>' . $row["nama"] . '</td>
            <td>' . $row["jumlah"] . '</td>
            <td>' . $row["ruangan"] . '</td>
            
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
    </tr>
</table>
<hr>
EOD;
// SET FOOTER
// $htmlFooter = <<<EOD
// <table width="100%">
//     <tr>
//         <td width="33%" style="text-align: left; border-style: none;">{PAGENO}/{nbpg}</td>
//         <td width="33%" style="text-align: right; border-style: none;">Pemusnahan Aset</td>
//     </tr>
// </table>
// EOD;

// KONTEN
$html = <<<EOD
<html><head></head> <style>body { font-family: monospace; } p { padding-top: 1; font-size: xx-large; font-weight: bolder; } table {border-collapse: collapse; width: 100%; margin: auto; font-size: large; } th,td { border: 1px solid; text-align: left; padding: 8px; text-align: center; width: auto;} th {background-color: grey; color: azure; } </style>
<body>
<table width="100%">
    <tr>
        <td width="33%" style="text-align: left; border-style: none;"></td>
        <td width="33%" style="text-align: right; border-style: none;">Pati, $tanggalIndonesia</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="33%" style="text-align: left; border-style: none;">Perihal : Pengajuan Aset Baru</td>
        <td width="33%" style="text-align: right; border-style: none; float: left;">Kepada Yth <br> Kepala Sekolah <br> SMA N 1 Pati</td>
    </tr>
</table>
<br>
<br>

<pre style="text-align: justify">
    Dengan ini, saya mengajukan permohonan untuk mendapatkan aset laboratorium komputer sebagai bagian dari upaya peningkatan fasilitas dan kualitas pendidikan di laboratorium SMA N 1 Pati.
    Adapun rincian permohonan adalah sebagai berikut : 
</pre>

<table><thead>
<tr>
    <th>No</th>
    <th>Kategori</th>
    <th>Nama</th>
    <th>Jumlah</th>
    <th>Lokasi</th>
</tr>
</thead>
EOD;
$html .= print_data() . '</table>';
$html .= <<<EOD
<pre style="text-align: justify">
    Demikianlah surat pengajuan ini kami buat dengan harapan mendapatkan persetujuan dari pihak terkait. Kami siap memberikan informasi tambahan atau melakukan koordinasi lebih lanjut sesuai kebutuhan
</pre>
<pre style="text-align: justify">
    Atas perhatian dan kerjasamanya, kami mengucapkan terima kasih.
</pre>
<br>
<br>
<pre style="text-align: justify">





                                                    Kelapa Laboratorium





                                                            $kalab
</pre>

EOD;
$html .= '</div></body></html>';

// 
$mpdf->setHTMLHeader($htmlHeader, 'O');
$mpdf->setHTMLFooter($htmlFooter, 'O');
$mpdf->AddPage('P');
$mpdf->WriteHTML($html);


$mpdf->Output('Surat Pengajuan Aset Baru.pdf', 'I');
// $mpdf->OutputFile(__DIR__ . '/pdf/' . base64_encode(substr(str_shuffle('0123456789'), 0, 3)) . '.pdf');
