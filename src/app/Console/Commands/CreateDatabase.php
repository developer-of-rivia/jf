<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = $this->argument('name'); // Получение имени базы данных
        DB::statement("CREATE DATABASE {$databaseName}"); // Создание базы данных
        $this->info("База данных {$databaseName} успешно создана!"); // Опционально — подтверждение
    }
}
