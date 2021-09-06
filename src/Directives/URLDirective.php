<?php

namespace Octopy\BladeDirective\Directives;

use Octopy\BladeDirective\Exceptions\DuplicateBladeDirectiveException;

trait URLDirective
{
    /**
     * @throws DuplicateBladeDirectiveException
     */
    protected function directiveURL()
    {
        $this->setDirective('url', function ($expression) {
            return "<?php echo url($expression); ?>";
        });
    }

    /**
     * @throws DuplicateBladeDirectiveException
     */
    protected function directiveAsset()
    {
        $this->setDirective('asset', function ($expression) {
            return "<?php echo asset($expression); ?>";
        });
    }

    /**
     * @throws DuplicateBladeDirectiveException
     */
    protected function directiveRoute()
    {
        $this->setDirective('route', function ($expression) {
            return "<?php echo route($expression); ?>";
        });
    }
}
