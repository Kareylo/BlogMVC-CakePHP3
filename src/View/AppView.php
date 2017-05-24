<?php

namespace App\View;

use Cake\View\View;

class AppView extends View
{
    public function initialize()
    {
        $this->loadHelper('Form', [
            'templates' => [
                'inputContainer' => '<div class="form-group{{required}}">{{content}}</div>',
                'inputContainerError' => '<div class="form-group{{required}} has-error">{{content}}</div>'
            ]
        ]);
        $this->loadHelper('Markdown.Markdown');
    }
}
