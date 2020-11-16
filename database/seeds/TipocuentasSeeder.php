<?php
use App\Tipocuenta;
use Illuminate\Database\Seeder;

class TipocuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipocuenta::create([
            'nombre' => 'ACTIVO',
            'descripcion' => 'A',
            'subtipo' => 'ACTIVO CORRIENTE',


           ]);

           Tipocuenta::create([
            'nombre' => 'ACTIVO',
            'descripcion' => 'A',
            'subtipo' => 'ACTIVO NO CORRIENTE',


           ]);

           Tipocuenta::create([
            'nombre' => 'PASIVO',
            'descripcion' => 'P',
            'subtipo' => 'PASIVO CORRIENTE',

            ]);

            Tipocuenta::create([
                'nombre' => 'PASIVO',
                'descripcion' => 'P',
                'subtipo' => 'PASIVO NO CORRIENTE',
    
    
               ]);
    
               Tipocuenta::create([
                'nombre' => 'PATRIMONIO',
                'descripcion' => 'PT',
                'subtipo' => 'PATRIMONIO',
    
                ]);
    }
}
