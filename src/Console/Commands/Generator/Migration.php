<?php

namespace MikhailMouner\GenerateViewFile\Console\Commands\Generator;

class Migration extends Generator implements GeneratorInterface
{
    protected string $name;
    protected int $laravelVersion;


    /**
     * Execute the console command.
     *
     * @param string $name
     * @param int $laravelVersion
     * @return string
     */
    public function execute(string $name, int $laravelVersion): string
    {
        $this->name = $name;
        $this->laravelVersion = $laravelVersion;

        $migrationFilePath = $this->getFilePath($name);
        $this->makeDirectory(dirname($migrationFilePath));

        $contents = $this->getSourceMigrationFile($name, $laravelVersion);

        return $this->generateFile($migrationFilePath, $contents);
    }

    /**
     * Get the stub path and the stub variables
     *
     * @param string $name
     * @param int $laravelVersion
     * @return bool|mixed|string
     */
    public function getSourceMigrationFile(string $name, int $laravelVersion)
    {
        return $this->getStubContents($this->getStubPath($laravelVersion), $this->getStubVariables($name));
    }

    /**
     * Get the full path of migration file
     *
     * @param string $name
     * @return string
     */
    public function getFilePath(string $name): string
    {
        return 'database\\migrations\\views\\' . (date('Y_m_d_His')) . '_create_v_' . $this->getTableName($name) . '.php';
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @param string $name
     * @return array
     */
    public function getStubVariables(string $name): array
    {
        return [
            'VIEW_NAME' => $this->getTableName($name),
            'CLASS_NAME' => $this->getClassName($name),
        ];
    }

    /**
     * Return the stub file path
     * @param int $laravelVersion
     * @return string
     */
    public function getStubPath(int $laravelVersion): string
    {
        return __DIR__ . '/../../../../stubs/view-migration-' . $laravelVersion . '.stub';
    }
}
