<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
            margin-bottom: 20px;
            float: left;
            margin-right: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
        }
    </style>
    <!-- Tambahkan html2canvas dan jsPDF dari CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    <div class="container" id="content">
        <div class="header">
            <hr>
            <img src="<?= base_url('assets/l/img/logo.png') ?>" alt="Logo">
            <h1>Tulus Makmur</h1>
            <p>Jl. H. Mansyur No.44, Pekauman Kulon, Kec. Dukuhturi, Kab. Tegal 52192</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No Invoice</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($content)) : ?>
                    <?php foreach ($content as $row) : ?>
                        <tr>
                            <td><?= $row->invoice ?></td>
                            <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                            <td>Rp<?= number_format($row->total, 0, ',', '.') ?>,-</td>
                            <td><?php $this->load->view('layouts/_status', ['status' => $row->status]) ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No data available</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>

    </div>
    <script>
        async function convertHTMLToPDF() {
            const { jsPDF } = window.jspdf;
            const content = document.getElementById('content');

            // Menggunakan html2canvas untuk menangkap elemen HTML sebagai gambar
            const canvas = await html2canvas(content, {
                scale: 2, // Skala untuk meningkatkan kualitas gambar
                useCORS: true, // Menangani masalah cross-origin untuk gambar
            });
            const imgData = canvas.toDataURL('image/png');

            // Tentukan margin dan ukuran kertas
            const margin = 10; // Margin dalam mm
            const pdfWidth = 297; // Lebar kertas A4 dalam mm (landscape)
            const pdfHeight = 210; // Tinggi kertas A4 dalam mm (landscape)

            // Buat dokumen PDF baru dengan orientasi landscape
            const pdf = new jsPDF({
                orientation: 'landscape',
                unit: 'mm',
                format: 'a4',
            });

            // Hitung dimensi gambar untuk mempertahankan aspek rasio
            const imgProps = pdf.getImageProperties(imgData);
            const imgWidth = pdfWidth - 2 * margin; // Lebar gambar dengan margin
            const imgHeight = (imgProps.height * imgWidth) / imgProps.width; // Tinggi gambar dengan mempertahankan rasio

            // Tambahkan gambar ke dokumen PDF dengan margin
            pdf.addImage(imgData, 'PNG', margin, margin, imgWidth, imgHeight);
            pdf.save('Laporan_Penjualan.pdf');
        }

        // Panggil fungsi konversi ketika halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", convertHTMLToPDF);
    </script>
</body>
</html>
