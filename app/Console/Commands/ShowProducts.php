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
    protected $signature = 'prod:list {count?} {--i|id} {--t|name : flag "t"(title) because flag "n" is busy }';

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

        if ($options['id']) {
            $product = Product::query()->orderBy('id')->take($count)->get('id')->toArray();
            $this->table(['id'], $product);
        }

        if ($options['name']) {
            $product = Product::query()->orderBy('id')->take($count)->get('name')->toArray();
            $this->table(['name'], $product);
        }

        if ($options['id'] && $options['name']) {
            $product = Product::query()->orderBy('id')->take($count)->get(['id', 'name'])->toArray();
            $this->table(['id','name'], $product);
        }

        if (!$options['id'] && !$options['name']) {
            $product = Product::query()->orderBy('id')->take($count)->get()->toArray();
            $this->table([],$product);
        }

    }

}
