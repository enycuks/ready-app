<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
	<noscript>
		<xml>
			<o:OfficeDocumentSettings>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml>
	</noscript>
	<![endif]-->
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr>
                        <td align="center" style="padding:40px 0 30px 0;background:#ee3333;">
                            <img src="http://kejati-kalimantantengah.info/images/logo.png" alt="" width="150" style="height:auto;display:block;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;"><?= $judul ?></h1>

                                        <table align="center" style="font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                            <?php if (isset($t4) and isset($indo)) : ?>
                                                <tr>
                                                    <td>Lokasi Exposes</td>
                                                    <td>:</td>
                                                    <td><?= $t4 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal & Jam</td>
                                                    <td>:</td>
                                                    <td><?= $indo ?></td>
                                                </tr>
                                            <?php endif ?>
                                            <tr>
                                                <td style="width: 50%;">Penyidik</td>
                                                <td style="width: 5%;">:</td>
                                                <td><?= $penyidik ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Tersangka</td>
                                                <td>:</td>
                                                <td><?= $tsk ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pasal</td>
                                                <td>:</td>
                                                <td><?= $pasal ?></td>
                                            </tr>
                                            <tr>
                                                <td>JPU</td>
                                                <td>:</td>
                                                <td><?= $jpu ?></td>
                                            </tr>
                                            <?php if (isset($berkas)) : ?>
                                                <tr>
                                                    <td>Kelengkapan Berkas/ Status</td>
                                                    <td>:</td>
                                                    <td><?= $berkas ?></td>
                                                </tr>
                                            <?php endif ?>
                                            <?php if (isset($hasil)) : ?>
                                                <tr>
                                                    <td>Hasil Exposes</td>
                                                    <td>:</td>
                                                    <td><?= $hasil ?></td>
                                                </tr>
                                            <?php endif ?>

                                        </table>

                                        <br>
                                        <a href="http://sipppakk.com/" style="background-color:#1F7F4C;border-radius:5px;color:#ffffff;display:inline-block;font-size: 18px; font-family: Helvetica, Arial, sans-serif;font-weight:bold;line-height:40px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;">Klik Disini &rarr;</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:30px;background:#ee3333;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                <tr>
                                    <td style="padding:0;width:100%;" align="center">
                                        <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                            &reg; SIPP PaKK <br> Sistem Informasi Pengendalian Perkara Tahap Propenuntutan Kejati Kalteng
                                        </p>
                                    </td>
                                    <td style="padding:0;width:50%;" align="right">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>