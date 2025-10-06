<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $text;
    public $variant;
    public $icon;

    public function __construct($text = 'Button', $variant = 'primary', $icon = null)
    {
        $this->text = $text;
        $this->variant = $variant;
        $this->icon = $icon;
    }

    public function render()
    {
        // ⚠️ ต้องตรงกับ path resources/views/components/button.blade.php
        return view('components.button');
    }
}
