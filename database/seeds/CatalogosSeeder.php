<?php

use Illuminate\Database\Seeder;

class CatalogosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $archivos = [
            "puestos"    => "puestos.csv",
            "regiones"   => "regiones.csv",
            "municipios" => "municipios.csv"
        ];

        foreach($archivos as $tabla => $archivo){
            $archivo_csv = storage_path().'/app/seeds/'.$archivo;
            $query = sprintf("
                LOAD DATA local INFILE '%s' 
                INTO TABLE ".$tabla."
                CHARACTER SET utf8 
                FIELDS TERMINATED BY ',' 
                OPTIONALLY ENCLOSED BY '\"' 
                ESCAPED BY '\\\\' 
                LINES TERMINATED BY '\\n' 
                IGNORE 1 LINES", addslashes($archivo_csv));
            DB::connection()->getpdo()->exec($query); 
        }
    }
}
