<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

            // Transfer into database
            DB::table("blogs")->insert([
                "title" => $row["Post title"],
                "content" => $row["Content"],
                "date" => $row["Date and time of upload"],
                "bank_id" => $row["Bank connection"],
                ]);
            }
        // Confirmation message
        $this->command->info("Blog posts table seeded.");
        }
    }
