<?php

namespace MikhailMouner\GenerateViewFile\Console\Commands;

use Illuminate\Console\Command;
use MikhailMouner\GenerateViewFile\Console\Commands\Generator\Migration;
use MikhailMouner\GenerateViewFile\Console\Commands\Generator\Model;

class MakeViewFile extends Command
{
    private Migration $migration;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name} {--l|laravel_version=7}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make View Migration File';
    private Model $model;

    /**
     * Create a new command instance.
     *
     * @param Migration $migration
     * @param Model $model
     */
    public function __construct(Migration $migration, Model $model)
    {
        parent::__construct();

        $this->migration = $migration;
        $this->model = $model;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $name = $this->argument('name');
        $laravelVersion = $this->getLaravelVersion();

        $this->info($this->migration->execute($name, $laravelVersion));
        $this->info($this->model->execute($name, $laravelVersion));
    }

    /**
     * Get Laravel Version
     *
     * @return int
     */
    protected function getLaravelVersion(): int
    {
        switch ($this->option('laravel_version')) {
            case 8:
            case 9:
                $version = 8;
                break;
            default:
                $version = 7;
                break;

        }
        return $version;
    }

}
