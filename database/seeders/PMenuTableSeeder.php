<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_menu')->delete();
        
        \DB::table('p_menu')->insert(array (
            0 => 
            array (
                'id' => 345,
                'parent_id' => NULL,
                'title' => 'Halaman Utama',
                'icon' => 'fas fa-home',
                'route' => 'admin.dashboard',
                'sequence' => 2,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:24:20',
            ),
            1 => 
            array (
                'id' => 346,
                'parent_id' => NULL,
                'title' => 'Pengguna',
                'icon' => 'fas fa-users',
                'route' => 'admin.user',
                'sequence' => 30,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 23:57:45',
            ),
            2 => 
            array (
                'id' => 351,
                'parent_id' => NULL,
                'title' => 'Article',
                'icon' => 'fas fa-file-alt',
                'route' => NULL,
                'sequence' => 18,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            3 => 
            array (
                'id' => 352,
                'parent_id' => 351,
                'title' => 'Data',
                'icon' => NULL,
                'route' => 'admin.artikel.data',
                'sequence' => 19,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            4 => 
            array (
                'id' => 353,
                'parent_id' => 351,
                'title' => 'Category',
                'icon' => NULL,
                'route' => 'admin.artikel.kategori',
                'sequence' => 20,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            5 => 
            array (
                'id' => 354,
                'parent_id' => 351,
                'title' => 'Tag',
                'icon' => NULL,
                'route' => 'admin.artikel.tag',
                'sequence' => 21,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            6 => 
            array (
                'id' => 360,
                'parent_id' => NULL,
                'title' => 'Galeri',
                'icon' => 'fas fa-images',
                'route' => 'admin.galeri',
                'sequence' => 22,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            7 => 
            array (
                'id' => 361,
                'parent_id' => NULL,
                'title' => 'Menu Management',
                'icon' => 'fas fa-stream',
                'route' => 'admin.menu.admin',
                'sequence' => 31,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            8 => 
            array (
                'id' => 363,
                'parent_id' => NULL,
                'title' => 'Sosial Media',
                'icon' => 'fas fa-share-alt',
                'route' => 'admin.social_media',
                'sequence' => 24,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            9 => 
            array (
                'id' => 364,
                'parent_id' => NULL,
                'title' => 'Contact',
                'icon' => 'fas fa-phone',
                'route' => NULL,
                'sequence' => 25,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            10 => 
            array (
                'id' => 367,
                'parent_id' => NULL,
                'title' => 'User Access',
                'icon' => 'fas fa-user-check',
                'route' => NULL,
                'sequence' => 32,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            11 => 
            array (
                'id' => 368,
                'parent_id' => 367,
                'title' => 'Permission',
                'icon' => NULL,
                'route' => 'admin.user_access.permission',
                'sequence' => 33,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            12 => 
            array (
                'id' => 369,
                'parent_id' => 367,
                'title' => 'Role',
                'icon' => NULL,
                'route' => 'admin.user_access.role',
                'sequence' => 34,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            13 => 
            array (
                'id' => 373,
                'parent_id' => NULL,
                'title' => 'Ganti Password',
                'icon' => 'fas fa-key',
                'route' => 'password',
                'sequence' => 43,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:50:28',
                'updated_at' => '2022-12-03 00:57:46',
            ),
            14 => 
            array (
                'id' => 386,
                'parent_id' => NULL,
                'title' => 'Logout',
                'icon' => 'fas fa-sign-out-alt',
                'route' => 'logout',
                'sequence' => 45,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-05 23:54:09',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            15 => 
            array (
                'id' => 390,
                'parent_id' => NULL,
                'title' => 'Halaman Utama',
                'icon' => 'fas fa-home',
                'route' => 'penduduk.home',
                'sequence' => 10,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-06 15:16:19',
                'updated_at' => '2022-12-03 00:58:31',
            ),
            16 => 
            array (
                'id' => 392,
                'parent_id' => NULL,
                'title' => 'Google Forms',
                'icon' => 'fas fa-user-edit',
                'route' => 'admin.pendaftaran.gform',
                'sequence' => 23,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-08 16:14:54',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            17 => 
            array (
                'id' => 393,
                'parent_id' => NULL,
                'title' => 'Utility',
                'icon' => 'fas fa-tools',
                'route' => NULL,
                'sequence' => 35,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-08 22:41:26',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            18 => 
            array (
                'id' => 394,
                'parent_id' => 393,
                'title' => 'Frontend Notification',
                'icon' => NULL,
                'route' => 'admin.utility.notif_depan_atas',
                'sequence' => 37,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-08 22:41:53',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            19 => 
            array (
                'id' => 397,
                'parent_id' => NULL,
                'title' => 'Pengaturan Halaman',
                'icon' => 'fas fa-wrench',
                'route' => NULL,
                'sequence' => 39,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-14 21:10:57',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            20 => 
            array (
                'id' => 398,
                'parent_id' => 397,
                'title' => 'Admin',
                'icon' => NULL,
                'route' => 'admin.setting.admin',
                'sequence' => 40,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-14 21:11:42',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            21 => 
            array (
                'id' => 399,
                'parent_id' => 397,
                'title' => 'Front',
                'icon' => NULL,
                'route' => 'admin.setting.front',
                'sequence' => 41,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-14 21:52:45',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            22 => 
            array (
                'id' => 400,
                'parent_id' => 397,
                'title' => 'Home',
                'icon' => NULL,
                'route' => 'admin.setting.home',
                'sequence' => 42,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-16 14:55:41',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            23 => 
            array (
                'id' => 401,
                'parent_id' => 393,
                'title' => 'Hari Besar Nasional',
                'icon' => NULL,
                'route' => 'admin.utility.hari_besar_nasional',
                'sequence' => 38,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-17 21:19:05',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            24 => 
            array (
                'id' => 402,
                'parent_id' => 393,
                'title' => 'Admin Notification',
                'icon' => NULL,
                'route' => 'admin.utility.notif_admin_atas',
                'sequence' => 36,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-18 16:42:00',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            25 => 
            array (
                'id' => 404,
                'parent_id' => 403,
                'title' => 'Anggota',
                'icon' => NULL,
                'route' => 'admin.lapooran.anggota',
                'sequence' => 41,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-18 18:55:08',
                'updated_at' => '2022-08-20 14:04:25',
            ),
            26 => 
            array (
                'id' => 407,
                'parent_id' => 364,
                'title' => 'Message',
                'icon' => NULL,
                'route' => 'admin.kontak.message',
                'sequence' => 26,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-21 08:38:20',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            27 => 
            array (
                'id' => 408,
                'parent_id' => 364,
                'title' => 'FAQ',
                'icon' => NULL,
                'route' => 'admin.kontak.faq',
                'sequence' => 27,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-21 08:39:18',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            28 => 
            array (
                'id' => 409,
                'parent_id' => 364,
                'title' => 'List',
                'icon' => NULL,
                'route' => 'admin.kontak.list',
                'sequence' => 28,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-21 08:40:08',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            29 => 
            array (
                'id' => 411,
                'parent_id' => NULL,
                'title' => 'Media Dan Informasi',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 17,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-09-09 13:45:06',
                'updated_at' => '2022-12-03 00:47:36',
            ),
            30 => 
            array (
                'id' => 412,
                'parent_id' => NULL,
                'title' => 'Peralatan',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 29,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-09-09 13:45:50',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            31 => 
            array (
                'id' => 413,
                'parent_id' => NULL,
                'title' => 'Penduduk Masuk',
                'icon' => 'fas fa-sign-in-alt',
                'route' => 'desa.penduduk.masuk',
                'sequence' => 13,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-12-03 00:18:41',
                'updated_at' => '2022-12-03 01:14:50',
            ),
            32 => 
            array (
                'id' => 414,
                'parent_id' => NULL,
                'title' => 'Penduduk',
                'icon' => 'fas fa-user-edit',
                'route' => 'desa.penduduk',
                'sequence' => 12,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-12-03 00:19:21',
                'updated_at' => '2022-12-04 02:19:24',
            ),
            33 => 
            array (
                'id' => 415,
                'parent_id' => NULL,
                'title' => 'Penduduk Keluar',
                'icon' => 'fas fa-sign-out-alt',
                'route' => 'desa.penduduk.keluar',
                'sequence' => 14,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-12-03 00:19:41',
                'updated_at' => '2022-12-03 23:27:50',
            ),
            34 => 
            array (
                'id' => 416,
                'parent_id' => NULL,
                'title' => 'Menu Administrator',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 1,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:21:37',
                'updated_at' => '2022-12-03 00:23:33',
            ),
            35 => 
            array (
                'id' => 417,
                'parent_id' => NULL,
                'title' => 'Menu Penduduk',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 9,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:21:48',
                'updated_at' => '2022-12-03 00:58:31',
            ),
            36 => 
            array (
                'id' => 418,
                'parent_id' => NULL,
                'title' => 'Menu Rukun Tetangga',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 7,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:21:57',
                'updated_at' => '2022-12-03 00:58:31',
            ),
            37 => 
            array (
                'id' => 419,
                'parent_id' => NULL,
                'title' => 'Menu Rukun Warga',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 5,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:22:13',
                'updated_at' => '2022-12-03 00:58:31',
            ),
            38 => 
            array (
                'id' => 420,
                'parent_id' => NULL,
                'title' => 'Data Kependudukan',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 11,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:22:26',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            39 => 
            array (
                'id' => 421,
                'parent_id' => NULL,
                'title' => 'Laporan',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 15,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:22:36',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            40 => 
            array (
                'id' => 422,
                'parent_id' => NULL,
                'title' => 'Setting',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 16,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:22:45',
                'updated_at' => '2022-12-03 00:47:36',
            ),
            41 => 
            array (
                'id' => 423,
                'parent_id' => NULL,
                'title' => 'Menu Pihak Desa',
                'icon' => NULL,
                'route' => NULL,
                'sequence' => 3,
                'active' => 1,
                'type' => 0,
                'created_at' => '2022-12-03 00:27:20',
                'updated_at' => '2022-12-03 00:58:30',
            ),
            42 => 
            array (
                'id' => 424,
                'parent_id' => NULL,
                'title' => 'Halaman Utama',
                'icon' => 'fas fa-home',
                'route' => NULL,
                'sequence' => 44,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-12-03 00:28:18',
                'updated_at' => '2022-12-03 00:43:35',
            ),
            43 => 
            array (
                'id' => 425,
                'parent_id' => NULL,
                'title' => 'Halaman Utama',
                'icon' => 'fas fa-home',
                'route' => 'rt.home',
                'sequence' => 8,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-12-03 00:42:38',
                'updated_at' => '2022-12-03 00:58:31',
            ),
            44 => 
            array (
                'id' => 426,
                'parent_id' => NULL,
                'title' => 'Halaman Utama',
                'icon' => 'fas fa-home',
                'route' => 'rw.home',
                'sequence' => 6,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-12-03 00:42:51',
                'updated_at' => '2022-12-03 00:58:31',
            ),
            45 => 
            array (
                'id' => 427,
                'parent_id' => NULL,
                'title' => 'Halaman Utama',
                'icon' => 'fas fa-home',
                'route' => 'desa.home',
                'sequence' => 4,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-12-03 00:43:00',
                'updated_at' => '2022-12-03 00:58:30',
            ),
        ));
        
        
    }
}