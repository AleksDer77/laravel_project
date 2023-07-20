<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ShowProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prod:list
    {count?}
    {--i|id}
    {--t|name : flag "t"(title) because flag "n" is busy }
    {--d|description}
    {--k|calories}
    {--c|cost}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'shows a list of products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = $this->argument('count');
        $options = $this->options();
        $params = [];

        foreach ($options as $key => $value) {
            if ($value) {
                $params[] = $key;
            }
        }

        if (count($params)) {
            $product = Product::query()->orderBy('id')->take($count)->get($params)->toArray();
            $this->table($params, $product);
        } else {
            $product = Product::query()->orderBy('id')->take($count)->get()->toArray();
            print_r($product);
        }
    }

}
