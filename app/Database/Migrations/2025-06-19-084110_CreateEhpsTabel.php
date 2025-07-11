<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEhpsTabel extends Migration
{
    public function up()
    {

        // Awal Pangkat Table

        $this->forge->addField([
            'idPangkat' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'pangkat' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addKey('idPangkat', true);
        $this->forge->addUniqueKey('pangkat');

        $this->forge->createTable('pangkat', true);

        // Insert initial data into pangkat table
        $data = [
            [
                'pangkat' => 'Laksamana Pertama TNI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'pangkat' => 'Kolonel Laut (E)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'pangkat' => 'Letkol Laut (E)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'pangkat' => 'Mayor Laut (E)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];
        $this->db->table('pangkat')->insertBatch($data);
        //akhir pangkat table


        // awal Sumber Table
        $this->forge->addField([
            'idSumber' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'namaSumber' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addKey('idSumber', true);

        $this->forge->createTable('sumber', true);
        // Insert initial data into sumber table
        $dataSumber = [
            [
                'namaSumber' => 'Shopee',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSumber' => 'Tokopedia',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSumber' => 'Lazada',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSumber' => 'Monotaro',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSumber' => 'Giat Sebelumnya',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ];
        $this->db->table('sumber')->insertBatch($dataSumber);
        // akhir Sumber Table

        // awal Satuan Tabel
        $this->forge->addField([
            'idSatuan' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'namaSatuan' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('idSatuan', true);
        $this->forge->createTable('satuan', true);

        // Insert initial data into satuan table
        $dataSatuan = [
            [
                'namaSatuan' => 'Unit',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Pcs',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Set',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Lembar',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Buah',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Kg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Meter',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Liter',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Koli',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Dus',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'Box',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaSatuan' => 'm3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        $this->db->table('satuan')->insertBatch($dataSatuan);

        // akhir satuan tabel

        //awal dasar surat
        $this->forge->addField([
            'idSurat' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'noSurat' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'tglSurat' => ['type' => 'DATETIME', 'null' => true],
            'tentang' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'pejabat' => ['type' => 'VARCHAR', 'constraint' => '255'],
        'filePdf' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('idSurat', true);

        $this->forge->createTable('dasarSurat', true);

        // Insert initial data into dasarSurat table
        $dataDasarSurat = [
            [
                'noSurat' => 'B/782/IV/2024',
                'tglSurat' => date('Y-m-d H:i:s'),
                'tentang' => 'Permohonan dukungan harga perkiraan sendiri (HPS) dan Spesifikasi Teknis Pemeliharaan Amunisi Tidak Layak Pakai dengan Pengecoran Arsenal',
                'pejabat' => 'Pejabat Pengadaan Barang/Jasa Dissenlekal',
                'filePdf' => 'noFile.pdf',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];
        $this->db->table('dasarSurat')->insertBatch($dataDasarSurat);

        //akhir dasar surat


        //awal barang
        $this->forge->addField([
            'idBarang' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'namaBarang' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'gambar' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'satuanId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('idBarang', true);
        $this->forge->addForeignKey('satuanId', 'satuan', 'idSatuan', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('barang', true);

        // akhir barang 

        // ===================================================================================================================

        // awal pejabat
        $this->forge->addField([
            'idPejabat' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'namaPejabat' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'pangkatId' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'NRP' => ['type' => 'VARCHAR', 'constraint' => '20'],
            'jabatan' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('idPejabat', true);
        $this->forge->addForeignKey('pangkatId', 'pangkat', 'idPangkat', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('pejabat', true);

        $dataPejabat = [
            [
                'namaPejabat' => 'Kade Jayus, S.T., M.Tr.Opsla.',
                'pangkatId' => 3, // Assuming this is the ID for "Letkol Laut (E)"
                'NRP' => '16613/P',
                'jabatan' => 'Kabagren',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ];
        $this->db->table('pejabat')->insertBatch($dataPejabat);



        // akhir pejabat



        // awal kegiatan
        $this->forge->addField([
            'idKegiatan' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'namaKegiatan' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'noSurat' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'tglSurat' => ['type' => 'DATETIME', 'null' => true],
            'pejabatId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'dasarId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'filePdf' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('idKegiatan', true);
        $this->forge->addForeignKey('pejabatId', 'pejabat', 'idPejabat', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('dasarId', 'dasarSurat', 'idSurat', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('kegiatan', true);

        // akhir kegiatan


        // awal referensi


        $this->forge->addField([
            'idReferensi' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'link' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'harga' => ['type' => 'INT', 'constraint' => '11', 'unsigned' => true, 'null' => true],
            'barangId' => ['type' => 'INT', 'constraint' => '11', 'unsigned' => true],

            'sumberId' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('idReferensi', true);
        $this->forge->addForeignKey('sumberId', 'sumber', 'idSumber', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('barangId', 'barang', 'idBarang', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('referensi', true);
        // akhir referensi

        // awal trxGiatBarang
        $this->forge->addField([
            'idTrxGiatBarang' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kegiatanId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'barangId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'kebutuhan' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'jenis' => ['type' => 'ENUM', 'constraint' => ['utama', 'pendukung', 'jasa'], 'default' => 'utama'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addKey('idTrxGiatBarang', true);
        $this->forge->addForeignKey('kegiatanId', 'kegiatan', 'idKegiatan', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('barangId', 'barang', 'idBarang', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('trxGiatBarang', true);

        // akhir trxGiatBarang

        // awal trxReferensi
        $this->forge->addField([
            'idTrxReferensi' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'trxGiatBarangId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'referensiId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'indeks' => ['type' => 'INT', 'constraint' => 3, 'unsigned' => true, 'null' => true], // Allow null for index
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('idTrxReferensi', true);
        $this->forge->addForeignKey('trxGiatBarangId', 'trxGiatBarang', 'idTrxGiatBarang', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('referensiId', 'referensi', 'idReferensi', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('trxReferensi', true);

        // akhir trxReferensi
    }

    public function down()
    {

        if ($this->db->DBDriver !== 'SQLite3') {
            // Drop foreign key constraints first

        }

        // SQLite does not support foreign key constraints, so we need to drop tables in reverse order
        $this->forge->dropTable('trxReferensi', true);
        $this->forge->dropTable('trxGiatBarang', true);
        $this->forge->dropTable('referensi', true);
        $this->forge->dropTable('kegiatan', true);
        $this->forge->dropTable('pejabat', true);
        $this->forge->dropTable('barang', true);
        $this->forge->dropTable('dasarSurat', true);
        $this->forge->dropTable('sumber', true);
        $this->forge->dropTable('pangkat', true);
        $this->forge->dropTable('satuan', true);
    }
}
