<?php

namespace Markdown\View\Helper;

use Cake\View\Helper;
use League\CommonMark\CommonMarkConverter;

/**
 * Class MarkdownHelper
 * @package Markdown\View\Helper
 */
class MarkdownHelper extends Helper
{
    public $parser = false;

    /**
     * Parse markdown content
     * @param $content
     * @return string
     */
    public function parse($content)
    {
        if (!$this->parser) {
            $this->parser = new CommonMarkConverter();
        }
        return $this->parser->convertToHtml($content);
    }
}
