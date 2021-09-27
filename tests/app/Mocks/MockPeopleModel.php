<?php

namespace App\Mocks;

use CodeIgniter\Model;

class MockPeopleModel extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'foto', 'nama', 'whatsapp', 'alamat', 'tanggal_lahir', 'status_sekolah', 'status_kerja',
    ];

    public function findAll(int $limit = 0, int $offset = 0)
    {
        return  [
            [
                'id' => '732136127212',
                'foto' => 'fotofotofoto',
                'nama' => 'myname',
                'whatsapp' => '732136127212',
                'alamat' => 'address',
                'tanggal_lahir' => '2000-12-12',
                'status_sekolah' => 'SMA',
                'status_kerja' => 'Kerja',
            ]
        ];
    }
}
