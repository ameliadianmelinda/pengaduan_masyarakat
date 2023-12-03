<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];



    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $register = [
        'nik' => 'alpha_numeric|is_unique[masyarakat.nik]',
        'password' => 'min_length[8]|alpha_numeric_punct',
        'confirm' => 'matches[password]'
    ];

    public $register_errors = [
        'nik' => [
            'numeric' => 'NIK hanya boleh mengandung angka',
            'is_unique' => 'NIk sudah dipakai'
        ],

        'username' => [
            'alpha_numeric' => 'Username hanya boleh mengandung angka dan huruf',
            'is_unique' => 'Username sudah dipakai'
        ],   

        'password' => [
            'min_length' => 'Password harus terdiri dari 8 kata',
            'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
        ],

        'confirm' => [
            'matches' => 'Konfirmasi password tidak cocok'
        ],

        'telepon' => [
            'alpha_numeric' => 'No telepon hanya boleh mengandung angka',
            'is_unique' => 'No telepon sudah dipakai'
        ]
    ];


    public $tambah_petugas = [  
        'nama_petugas' => [
            'rules' => 'alpha_numeric',
            'errors' => [
                'alpha_numeric' => 'Username hanya boleh mengandung huruf dan angka',
            ]
        ],
        'username' => [
            'rules' => 'alpha_numeric|is_unique[petugas.username]',
            'errors' => [
                'alpha_numeric' => 'Username hanya boleh mengandung huruf dan angka',
                'is_unique' => 'Username sudah dipakai'
            ]
        ],
        'password' => [
            'rules' => 'min_length[8]|alpha_numeric_punct',
            'errors' => [
                'min_length' => 'Password harus terdiri dari 8 kata',
                'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
            ]
        ],
        'confirm' => [
            'rules' => 'matches[password]',
            'errors'=> [
                'matches' => 'Konfirmasi password tidak cocok'
            ]
        ],
        'telepon' => [
            'rules' => 'numeric|min_length[8]|max_length[13]',
            'errors' => [
                'numeric' => 'Nomor telepon hanya boleh mengandung angka',
                'min_length' => 'Nomor telepon minimal 8 angka',
                'max_length' => 'Nomor telepon maksimal 13 angka'
            ]
        ]
    ];
}
