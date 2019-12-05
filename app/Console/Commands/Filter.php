<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class Filter extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature  = 'make:filter {name : The name of the filter.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new filter';

    /**
    * The type of class being generated.
    *
    * @var string
    */
    protected $type = 'Filter';

    /**
    * Get the stub file for the generator.
    *
    * @return string
    */
    protected function getStub()
    {
        return  __DIR__ . '/../Stubs/filter.stub';
    }
    

    /**
    * Get the default namespace for the class.
    *
    * @param  string  $rootNamespace
    * @return string
    */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Filters';
    }

    /**
     * Build the model class with the given name.
     *
     * @param  string  $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $ret = $this->replaceNamespace($stub, $name);
        
        return $ret->replaceClass($stub, $name);
    }
}
