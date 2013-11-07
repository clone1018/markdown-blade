# Markdown Blade Parser
Based completely on https://github.com/Kindari/laravel-markdown/pull/2

## Installation

Add `axxim/markdown-blade` to `composer.json`.

    "axxim/markdown-blade": dev-master"

Run `composer update`. Now open up `app/config/app.php` and add the service provider to your `providers` array, *after* the ViewServiceProvider.

    'providers' => array(
    	...
    		'Illuminate\View\ViewServiceProvider',
    		'Axxim\MarkdownBlade\MarkdownBladeServiceProvider',
		...
    )

## Usage

Create a view file named foobar.md.blade.php then use it like normal:

    return View::make('foobar');
