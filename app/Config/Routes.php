<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// auth masyarakat
$routes->get('/', 'Auth::home');
$routes->get('/auth/loginmasyarakat', 'Auth::loginmasyarakat');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/valid_login', 'Auth::valid_login');
$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->get('/auth/logout', 'Auth::logout');
// masyarakat
$routes->get('/masyarakat', 'masyarakat::dashboard');
// pengaduan masyarakat 
$routes->get('/pengaduan/masyarakat', 'masyarakat::pengaduan');
$routes->post('/pengaduan/masyarakat/save', 'Pengaduan::save');
$routes->get('/editpengaduan/masyarakat/(:num)', 'masyarakat::editpengaduan/$1');
$routes->post('/updatepengaduan/masyarakat/(:num)', 'masyarakat::updatepengaduan/$1');
$routes->get('/deletepengaduan/masyarakat/(:num)', 'masyarakat::deletepengaduan/$1');
$routes->get('/lihatpengaduan/masyarakat', 'masyarakat::lihatpengaduan');
// lihat tanggapan
$routes->get('/lihattanggapan/masyarakat/(:num)', 'masyarakat::lihattanggapan/$1');



// auth petugas
$routes->get('/auth/loginpetugas', 'AuthPetugas::loginpetugas');
$routes->post('/auth/petugas/valid_login', 'AuthPetugas::valid_login');
$routes->get('/auth/petugas/logout', 'AuthPetugas::logout');
// petugas dashboard
$routes->get('/petugas', 'petugas::dashboard');
// data masyarakat
$routes->get('/petugas/management', 'petugas::management');
$routes->get('/petugas/editmasyarakat/(:num)', 'petugas::editmanagement/$1');
$routes->post('/petugas/updatemasyarakat/(:num)', 'petugas::updatemasyarakat/$1');
$routes->get('/petugas/deletemasyarakat/(:num)', 'petugas::deletemasyarakat/$1');
$routes->get('/petugas/defaultpass/(:num)', 'petugas::defaultpass/$1');
// validasi pengaduan
$routes->get('/petugas/validasi', 'petugas::validasi');
$routes->get('/petugas/updatevalidasi/(:num)', 'petugas::updatevalidasi/$1');
$routes->get('/petugas/tolak/(:num)', 'petugas::tolak/$1');
// tanggapan
$routes->get('/petugas/tanggapan/(:num)', 'tanggapanpetugas::tanggapan/$1');
$routes->post('/petugas/updatetanggapan/(:num)', 'tanggapanpetugas::updatetanggapan/$1');
// detail laporan & tanggapan
$routes->get('/petugas/detaillaporan/(:num)', 'petugas::detaillaporan/$1');



// admin dashnoard
$routes->get('/admin', 'admin::dashboard');
// data masyarakat
$routes->get('/admin/managementmasyarakat', 'admin::managementmasyarakat');
$routes->get('/admin/editmasyarakat/(:num)', 'admin::editmasyarakat/$1');
$routes->post('/admin/updatemasyarakat/(:num)', 'admin::updatemasyarakat/$1');
$routes->get('/admin/deletemasyarakat/(:num)', 'admin::deletemasyarakat/$1');
$routes->get('/admin/defaultpassmasyarakat/(:num)', 'admin::defaultpassmasyarakat/$1');
// data petugas
$routes->get('/admin/managementpetugas', 'admin::managementpetugas');
$routes->get('/admin/editpetugas/(:num)', 'admin::editpetugas/$1');
$routes->post('/admin/updatepetugas/(:num)', 'admin::updatepetugas/$1');
$routes->get('/admin/deletepetugas/(:num)', 'admin::deletepetugas/$1');
$routes->get('/admin/defaultpasspetugas/(:num)', 'admin::defaultpasspetugas/$1');
$routes->get('/admin/tambahpetugas', 'admin::tambahpetugas');
$routes->post('/admin/savepetugas', 'admin::savepetugas');
// validasi pengaduan
$routes->get('/admin/validasi', 'admin::validasi');
$routes->get('/admin/updatevalidasi/(:num)', 'admin::updatevalidasi/$1');
$routes->get('/admin/tolak/(:num)', 'admin::tolak/$1');
// detail laporan & validasi
$routes->get('/admin/detaillaporan/(:num)', 'admin::detaillaporan/$1');
// tanggapan
$routes->get('/admin/tanggapan/(:num)', 'tanggapanadmin::tanggapan/$1');
$routes->post('/admin/updatetanggapan/(:num)', 'tanggapanadmin::updatetanggapan/$1');  
// create pdf
$routes->get('admin/pdf', 'pdf::generate');

