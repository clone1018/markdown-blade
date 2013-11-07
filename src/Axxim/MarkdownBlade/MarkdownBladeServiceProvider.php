<?php namespace Axxim\MarkdownBlade;

use Illuminate\Support\ServiceProvider;
use dflydev\markdown\MarkdownExtraParser;
use Illuminate\View\Engines\CompilerEngine;

class MarkdownBladeServiceProvider extends ServiceProvider {

    public $parser;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $app = $this->app;
        $view = $app['view'];

        $this->parser = new MarkdownExtraParser();

        $view->addExtension('md.blade.php', 'markdown-blade', function() use ($app) {
            $cache = $app['path.storage'].'/views';
            $compiler = new MarkdownBladeCompiler($app['files'], $cache, $this->parser);
            return new CompilerEngine($compiler);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }
}
