<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class FilterModel extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature  = 'make:filter-model
                                {name : The name of the model.}
                                {--filter= : The filter name.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Model with Filter Class';

    /**
    * The type of class being generated.
    *
    * @var string
    */
    protected $type = 'Filter Model';

    /**
    * Get the stub file for the generator.
    *
    * @return string
    */
    protected function getStub()
    {
        return  __DIR__ . '/../Stubs/model.stub';
    }


    /**
    * Get the default namespace for the class.
    *
    * @param  string  $rootNamespace
    * @return string
    */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Models';
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

        $ret = $this->replaceNamespace($stub, $name)
                    ->replaceFilter($stub, $name);

        return $ret->replaceClass($stub, $name);
    }

    /**
     * Replace the filter for the given stub.
     *
     * @param  string  $stub
     * @param  string  $fillable
     *
     * @return $this
     */
    protected function replaceFilter(&$stub, $name)
    {
        $stub = str_replace('{{filter}}', $name . 'Filter', $stub);
        return $this;
    }
}
