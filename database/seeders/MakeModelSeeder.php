<?php

namespace Database\Seeders;

use App\Constants\VehicleHashTable;
use App\Models\Make;
use App\Models\Model;
use Illuminate\Database\Seeder;

class MakeModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleHashTable = new VehicleHashTable();
        $vehicles = $vehicleHashTable->getAllVehicles();

        foreach ($vehicles as $make => $models) {
            foreach ($models as $modelName) {
                // We need to create Model in memory first
                // Assign Parent make to it and then save afterwards
                $model = new Model;
                $model->name = $modelName;
                Make::updateOrCreate(['name' => $make])->models()->save($model);
                $model->save();
            }
        }
    }
}
