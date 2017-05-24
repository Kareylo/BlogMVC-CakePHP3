<?php

namespace Markdown\View\Helper;

use Cake\View\Helper;
use Markdown\Vendor\Markdown;

class MarkdownHelper extends Helper
{
    public $parser = false;

    public function parse($content)
    {
        if (!$this->parser) {
            $this->parser = new Markdown();
        }
        $content = $this->parser->transform($content);
        $replace_array = array(
            '<h1>' => '<h3>',
            '</h1>' => '</h3>',
            '<code>' => '',
            '</code>' => '',
            '<pre>' => '<pre class="php" name="code">',
            '<p>!!</p>' => '<p><a class="btn" onclick="$(this).parent().slideUp().next(\'.hidden\').slideDown();">Voir la réponse</a></p><div class="hidden">',
            '<p>/!!</p>' => '</div>'
        );
        $search = $replace = array();
        foreach ($replace_array as $k => $v) {
            $search[] = $k;
            $replace[] = $v;
        }
        $content = str_replace($search, $replace, $content);
        return $content;
    }
}
