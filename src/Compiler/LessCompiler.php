<?php namespace Websemantics\Lcss2php\Compiler;

use Websemantics\Lcss2php\Parser\LessParser;

/**
 * ScssCompiler
 *
 * @link   http://websemantics.ca
 * @author Adnan M.Sagar, <adnan@websemantics.ca>
 * @copyright 2011-2016 Web Semantics, Inc.
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/websemantics/lcss2php
 */

class LessCompiler extends \lessc {

    /**
     * Get environment variables.
     *
     * @param string $code, less code
     * @param array $ignore, list of variable types to ignore
     * @return array $vars, a list of less environment variables
     */
    public function getEnvVariables($code, $ignore = []){

        $vars = [];

        $root = (new LessParser($this->getOptions()))->parse($code)->getRoot();

        foreach ($root->_variables as $name => $value) {
            if(!in_array($value->value->type, $ignore)){
                $vars[ltrim ($name,"@")] = $value->value->toCss();
            }
        }

        return $vars;
    }
}
