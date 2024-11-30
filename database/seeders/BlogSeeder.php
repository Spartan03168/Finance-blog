<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Banks;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $csvFileTracked = storage_path("app/public/Post_tracker.csv");
        // File existence check
        if (!file_exists($csvFileTracked)) {
            $this->command->error("CSV file not detected at: {$csvFileTracked}");
            return;
            }
        // File reading
        $data = array_map('str_getcsv', file($csvFileTracked));
        $headers_detected = array_shift($data);
        // Loop to inject the data
        foreach ($data as $row){
            $row = array_combine($headers_detected, $row);

            $smooth_option = 1;
            if ($smooth_option === 1) {
                // Fetch bank by name
                $bank = Banks::where('bank_name', $row["Bank_id"])->first();
            } else {
                // The hammer
                $bank_Name = trim($row["Bank_id"]);
                $bank = Banks::where('bank_name', $bank_Name)->first();

                }
            // Fetch bank by name

            //

            // Transfer into database
            DB::table("blogs")->insert([
                "title" => $row["title"],
                "date" => $row["date_and_time_of_upload"],
                "content" => $row["content"],
                "bank_id" => $row["Bank_id"],
                ]);
            }
        // Confirmation message
        $this->command->info("Blog posts table seeded.");
        }
    }
