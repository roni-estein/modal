<?php

namespace LivewireUI\Modal;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireModalServiceProvider extends ServiceProvider
{
    public static array $scripts = ['modal.js'];

    public function boot()
    {
        $this->registerViews();

        $this->registerPublishables();

        $this->registerComponent();
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewire-ui');
    }

    private function registerComponent()
    {
        Livewire::component('livewire-ui-modal', Modal::class);
    }

    private function registerPublishables()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/livewire-ui'),
            ], 'livewire-ui:views');

            $this->publishes([
                __DIR__.'/../resources/js' => resource_path('js/vendor/livewire-ui'),
            ], 'livewire-ui:scripts');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/livewire-ui'),
            ], 'livewire-ui:public');
        }
    }
}