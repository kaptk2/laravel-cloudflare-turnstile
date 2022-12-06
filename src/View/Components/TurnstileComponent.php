<?php

namespace RyanChandler\LaravelCloudflareTurnstile\View\Components;

use Illuminate\View\Component;

class TurnstileComponent extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
<div class="cf-turnstile"
     data-sitekey="{{ config('services.turnstile.key') }}"
     @if($attributes->has('wire:model'))
         data-callback="$wire.set(@js($attributes->wire('model')), value)"
        {{ $attributes->whereDoesntStartWith('data-callback') }}
     @else
         {{ $attributes->whereStartsWith('data-') }}
     @endif
></div>
blade;
    }
}
