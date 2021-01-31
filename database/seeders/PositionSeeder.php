<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = collect([
            'EGM',
            'Retail Sales',
            'Corporate Sales',
            'Supply & Distribution',
            'COS',
            'RPD',
            'HSSE',
            'Asset Ops',
            'Internal Audit',
            'PEC',
            'Medical',
            'Marine',
            'HC',
            'Legal Counsel',
            'Finance',
            'SSC ICT',
            'Comm, Rel & CSR',
            'Lubricants',
            'Others'
        ]);

        $positions->each(function($position){
            Position::create([
                'name' => $position,
            ]);
        });
    }
}
