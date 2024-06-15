<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kas Keluar</title>
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
            <img src="<?= base_url('assets/l/img/logo.png') ?>" alt="Logo" style="float: left; margin-right: 10px;">
            <h1>Toko Tulus Makmur</h1>
            <p>Jl. H. Mansyur No.44, Pekauman Kulon, Kec. Dukuhturi, Kab. Tegal 52192</p>
            <hr>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Uang Keluar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan_kaskeluar as $index => $kaskeluar): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $kaskeluar->keterangan ?></td>
                        <td><?= $kaskeluar->uangkeluar ?></td>
                        <td><?= $kaskeluar->tanggal ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="footer">
            <p>Terima kasih atas perhatian Anda</p>
        </div>
    </div>
    <script>
        async function convertHTMLToPDF() {
            const { jsPDF } = window.jspdf;
            const content = document.getElementById('content');

            // Menggunakan html2canvas untuk menangkap elemen HTML sebagai gambar
            const canvas = await html2canvas(content, {
                scale: 2, // Skala untuk meningkatkan kualitas
                useCORS: true, // Menangani cross-origin resource sharing untuk gambar
            });
            const imgData = canvas.toDataURL('image/png');

            // Tentukan margin dan ukuran kertas
            const margin = 10; // Margin dalam mm
            const pdfWidth = 297; // Lebar A4 dalam mm untuk landscape
            const pdfHeight = 210; // Tinggi A4 dalam mm untuk landscape

            // Buat dokumen PDF baru dengan orientasi landscape
            const pdf = new jsPDF({
                orientation: 'landscape',
                unit: 'mm',
                format: 'a4',
            });

            // Hitung dimensi gambar dengan margin
            const imgProps = pdf.getImageProperties(imgData);
            const imgWidth = pdfWidth - 2 * margin;
            const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

            // Posisikan gambar di halaman PDF dengan margin
            pdf.addImage(imgData, 'PNG', margin, margin, imgWidth, imgHeight);
            pdf.save('Laporan_Kas_Keluar.pdf');
        }

        // Panggil fungsi konversi ketika halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", convertHTMLToPDF);
    </script>
</body>
</html>
