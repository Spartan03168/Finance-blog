<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $bank_data = storage_path("app/public/Banks__DB.csv");
        // Existence authentication
        if (!file_exists($bank_data)) {
            $this->command->warn("Banks file does not exist at: {$bank_data}");
            return;
            }
        // Read CSV
        $data_extract = array_map('str_getcsv', file($bank_data));
        $headers = array_shift($data_extract);
        // Loop for data injection to database
        foreach ($data_extract as $row){
            $row = array_combine($headers, $row);
            // Transfer into database
            DB::table("blogs")->insert([
                "bank_name" => $row["Bank name"],
                "headquarters" => $row["Headquarters"],
                "number_of_branches" => (int) $row["Number of branches"],
                "countries_with_branches" => (int) $row["Countries with branches"],
                ]);
            }
        // Confirmation feedback message
        $this->command->info("Bank data table seeded.");
        }
    }
