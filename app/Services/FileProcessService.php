<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\Product;

class FileProcessService {
    public function __construct()
    {
        ini_set('max_execution_time', 120);
    }

    public function download()
    {
        $file = 'https://challenges.coode.sh/food/data/json/index.txt';
        $path = 'https://challenges.coode.sh/food/data/json/';
        $file_names = file_get_contents($file);
        $file_names_array = explode("\n", $file_names);
        $file_names_array = array_filter($file_names_array);
        foreach ($file_names_array as $file_name) {
            Storage::disk('public')->put($file_name, file_get_contents($path . $file_name));
            $local_path = Storage::disk('public')->path($file_name);
        }
        return $this->processFiles();
    }

    private function processFiles()
    {
        $files = Storage::disk('public')->files();
        $filtered_files = array_filter($files, function ($file) {
            return basename($file) !== '.gitignore';
        });

        foreach ($filtered_files as $file) {
            $lines = gzfile(Storage::disk('public')->path($file));
            $counter = 0;
            $now = Carbon::now();
            while ($counter <= 10) {
                $line = json_decode($lines[$counter]);
                $code = str_replace('"', '', $line->code);

                $product = Product::updateOrCreate(
                    ['code' => $code],
                    [
                        "status"             => "published",
                        "imported_t"         => $now,
                        "url"                => $line->url,
                        "creator"            => $line->creator,
                        "created_t"          => $line->created_t,
                        "last_modified_t"    => $line->last_modified_t,
                        "product_name"       => $line->product_name,
                        "quantity"           => $line->quantity,
                        "brands"             => $line->brands,
                        "categories"         => $line->categories,
                        "labels"             => $line->labels,
                        "cities"             => $line->cities,
                        "purchase_places"    => $line->purchase_places,
                        "stores"             => $line->stores,
                        "ingredients_text"   => $line->ingredients_text,
                        "traces"             => $line->traces,
                        "serving_size"       => $line->serving_size,
                        "serving_quantity"   => $line->serving_quantity,
                        "nutriscore_score"   => $line->nutriscore_score,
                        "nutriscore_grade"   => $line->nutriscore_grade,
                        "main_category"      => $line->main_category,
                        "image_url"          => $line->image_url
                    ]
                );

                $counter++;
            }


        };

        return true;
    }
}