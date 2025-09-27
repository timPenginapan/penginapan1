<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth routes
$route['auth'] = 'auth';
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';

// Admin routes (dengan folder admin/)
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';

// Customer routes dengan modal
$route['admin/customer'] = 'admin/customer';
$route['admin/customer/get_customer/(:num)'] = 'admin/customer/get_customer/$1';
$route['admin/customer/simpan'] = 'admin/customer/simpan';
$route['admin/customer/update'] = 'admin/customer/update';
$route['admin/customer/hapus/(:num)'] = 'admin/customer/hapus/$1';

// Penginapan routes dengan modal
$route['admin/penginapan'] = 'admin/penginapan';
$route['admin/penginapan/get_penginapan/(:num)'] = 'admin/penginapan/get_penginapan/$1';
$route['admin/penginapan/simpan'] = 'admin/penginapan/simpan';
$route['admin/penginapan/update'] = 'admin/penginapan/update';
$route['admin/penginapan/hapus/(:num)'] = 'admin/penginapan/hapus/$1';
$route['admin/penginapan/update_status'] = 'admin/penginapan/update_status';

// Reservasi routes
$route['admin/reservasi'] = 'admin/reservasi';
$route['admin/reservasi/detail/(:num)'] = 'admin/reservasi/detail/$1';
$route['admin/reservasi/update_status'] = 'admin/reservasi/update_status';
$route['admin/reservasi/hapus/(:num)'] = 'admin/reservasi/hapus/$1';

// Transaksi routes
$route['admin/transaksi'] = 'admin/transaksi';
$route['admin/transaksi/update_status'] = 'admin/transaksi/update_status';
$route['admin/transaksi/detail/(:num)'] = 'admin/transaksi/detail/$1';

// Komentar routes
$route['admin/komentar'] = 'admin/komentar';
$route['admin/komentar/approve/(:num)'] = 'admin/komentar/approve/$1';
$route['admin/komentar/reject/(:num)'] = 'admin/komentar/reject/$1';
$route['admin/komentar/hapus/(:num)'] = 'admin/komentar/hapus/$1';