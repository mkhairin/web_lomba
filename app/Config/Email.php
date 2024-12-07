<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /**
     * Alamat email pengirim.
     */
    public string $fromEmail = '';

    /**
     * Nama pengirim email.
     */
    public string $fromName = '';

    /**
     * Penerima email (opsional).
     */
    public string $recipients = 'mkhairin04@gmail.com';

    /**
     * Protokol pengiriman email: mail, sendmail, smtp.
     */
    public string $protocol = 'smtp';

    /**
     * Jalur ke Sendmail (hanya jika menggunakan protokol sendmail).
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * Host SMTP yang digunakan.
     */
    public string $SMTPHost = 'smtp.gmail.com';

    /**
     * Username untuk autentikasi SMTP.
     */
    public string $SMTPUser = 'mkhairin04@gmail.com'; // Ganti dengan email Gmail Anda

    /**
     * Password untuk autentikasi SMTP.
     */
    public string $SMTPPass = 'mrqd ciri joie aprd'; // Ganti dengan App Password Gmail Anda

    /**
     * Port SMTP yang digunakan.
     */
    public int $SMTPPort = 587;

    /**
     * Timeout koneksi SMTP (dalam detik).
     */
    public int $SMTPTimeout = 10;

    /**
     * Apakah koneksi SMTP harus dipertahankan secara persisten.
     */
    public bool $SMTPKeepAlive = false;

    /**
     * Enkripsi SMTP: '', 'tls', atau 'ssl'.
     */
    public string $SMTPCrypto = 'tls';

    /**
     * Aktifkan pemotongan kata.
     */
    public bool $wordWrap = true;

    /**
     * Batas karakter untuk pemotongan kata.
     */
    public int $wrapChars = 76;

    /**
     * Jenis email: 'text' atau 'html'.
     */
    public string $mailType = 'text'; // Format teks biasa

    /**
     * Set karakter (utf-8, iso-8859-1, dll.).
     */
    public string $charset = 'UTF-8';

    /**
     * Validasi alamat email penerima.
     */
    public bool $validate = false;

    /**
     * Prioritas email: 1 = tertinggi, 5 = terendah, 3 = normal.
     */
    public int $priority = 3;

    /**
     * Karakter newline. Gunakan "\r\n" untuk mematuhi RFC 822.
     */
    public string $CRLF = "\r\n";

    /**
     * Karakter newline.
     */
    public string $newline = "\r\n";

    /**
     * Mode batch untuk BCC.
     */
    public bool $BCCBatchMode = false;

    /**
     * Jumlah email dalam setiap batch BCC.
     */
    public int $BCCBatchSize = 200;

    /**
     * Aktifkan pesan notifikasi dari server.
     */
    public bool $DSN = false;
}
