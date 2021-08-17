<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeService extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:service';
    
    /**
     * @var string
     */
    protected $type = 'Service';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成service文件';
    
    /**
     * 获取生成器的存根文件
     *
     * @return string
     */
    protected function getStub()
    : string
    {
        // TODO: Implement getStub() method.
        return __DIR__.DIRECTORY_SEPARATOR.'Stubs'.DIRECTORY_SEPARATOR.'service.stub';
    }
    
    /**
     * 获取类的默认命名空间
     *
     * @param  string  $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    : string
    {
        return $rootNamespace.'\Services';
    }
}
