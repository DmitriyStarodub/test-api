<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\CurrencyHelper;

class GetCurrencyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getCurrency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get currency rate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = CurrencyHelper::getCurrency();
        var_dump($result);
    }
}
