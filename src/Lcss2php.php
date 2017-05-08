<?php namespace Websemantics\Lcss2php;

use Websemantics\Lcss2php\Compiler\LessCompiler;
use Websemantics\Lcss2php\Compiler\ScssCompiler;

/**
 * Lcss2php
 *
 * Conveniently extracts SCSS and LESS variables and converts them into a PHP array
 *
 * @link   http://websemantics.ca
 * @author Adnan M.Sagar, <adnan@websemantics.ca>
 * @copyright 2011-2016 Web Semantics, Inc.
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/websemantics/lcss2php
 */

class Lcss2php
{
    /**
     * List of files
     *
     * @var array
     */
    protected $files;

    /**
     * List of variable types to ignore
     *
     * @var array
     */
    protected $ignore;

    /**
     * constructer.
     *
     * @var array, string $files, a list of less / scss files
     */
    function __construct($files = []) {
        $this->ignore = [];
        $this->files = is_string($files) ? [$files] : $files;
    }

    /**
     * Ignore variable types.
     *
     * @var array, string $types, list of variables to ignore
     */
    public function ignore($types = []) {
        $this->ignore = array_merge($this->ignore, is_string($types) ? [$types] : $types);

        /* Play nice, be fluent! */
        return $this;
    }

    /**
     * Get list of variables.
     *
     * @return array, list of variables
     */
    public function all() {
        $vars = [];

        $locale = setlocale(LC_NUMERIC, 0);
        setlocale(LC_NUMERIC, 'C');

        /* Loop through the file list (mix of scss / less) */
        foreach ($this->files as $file) {
            if(file_exists($file)){

                $compiler = substr($file, -4) === 'less' ? new LessCompiler() : new ScssCompiler();

                foreach ($compiler->getEnvVariables(file_get_contents($file), $this->ignore) as $key => $value) {
                    $vars[$key] = $value;
                }
            }
        }

        setlocale(LC_NUMERIC, $locale);

        return $vars;
    }
}
