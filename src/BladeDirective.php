<?php

namespace Octopy\BladeDirective;

use Illuminate\Support\Facades\Blade;
use Octopy\BladeDirective\Exceptions\DuplicateBladeDirectiveException;
use Octopy\BladeDirective\Traits\URLDirectiveTrait;
use ReflectionClass;
use ReflectionMethod;

class BladeDirective
{
    use URLDirectiveTrait;

    /**
     * @var array
     */
    protected array $directives = [];

    /**
     * BladeDirective constructor
     */
    public function __construct()
    {
        $this->directives = Blade::getCustomDirectives();
    }

    /**
     * @return void
     */
    public function register() : void
    {
        $reflection = new ReflectionClass($this);

        collect($reflection->getMethods(ReflectionMethod::IS_PROTECTED))
            ->filter(function (ReflectionMethod $reflection) {
                return preg_match('/^directive/', $reflection->getName());
            })
            ->each(function (ReflectionMethod $reflection) {
                call_user_func([$this, $reflection->getName()]);
            });
    }

    /**
     * @param  string   $name
     * @param  callable $handler
     * @return void
     * @throws DuplicateBladeDirectiveException
     */
    protected function setDirective(string $name, callable $handler) : void
    {
        if (isset($this->directives[$name])) {
            throw new DuplicateBladeDirectiveException(
                'Directive "' . $name . '" already defined.'
            );
        }

        Blade::directive($name, function ($expression) use ($name, $handler) {
            return $this->directives[$name] = $handler($expression);
        });
    }
}
