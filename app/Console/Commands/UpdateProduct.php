<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class UpdateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prod:update {id} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update name of product';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');
        $name = $this->option('name');
        Product::query()->where('id', $id)->update(['name' => $name]);
        print_r(Product::query()->where('id', $id)->get()->toArray());

    }
}
