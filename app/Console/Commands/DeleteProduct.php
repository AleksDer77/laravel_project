<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prod:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a product by id';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');
        Product::destroy($id);
        $this->info('The Product with the id: ' . $id . ' has been deleted');
    }
}
