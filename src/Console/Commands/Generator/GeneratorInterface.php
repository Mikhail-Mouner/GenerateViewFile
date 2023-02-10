<?php

namespace MikhailMouner\GenerateViewFile\Console\Commands\Generator;

interface GeneratorInterface
{
    public function getFilePath(string $name): string;

    public function getStubVariables(string $name): array;

    public function getStubPath(int $laravelVersion): string;

}
