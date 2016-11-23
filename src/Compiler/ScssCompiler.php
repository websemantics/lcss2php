<?php namespace Websemantics\Lcss2php\Compiler;

use Leafo\ScssPhp\Block;
use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Node\Number;

/**
 * ScssCompiler
 *
 * @link      http://websemantics.ca
 * @author    Adnan M.Sagar, <adnan@websemantics.ca>
 * @copyright 2011-2016 Web Semantics, Inc.
 * @license   http://opensource.org/licenses/MIT MIT
 * @link      https://github.com/websemantics/lcss2php
 */
class ScssCompiler extends Compiler
{

    /**
     * Get environment variables.
     *
     * @param string $code   , scss code
     * @param array  $ignore , list of variable types to ignore
     * @return array $vars, a list of scss environment variables
     */
    public function getEnvVariables($code, $ignore = [])
    {
        $vars = [];

        $this->compile($code);

        foreach ($this->rootEnv->store as $name => $value) {

            if (is_array($value) and !in_array($value[0], $ignore)) {
                $vars[str_replace('_', '-', $name)] = $this->compileValue($value);
            }

            if ($value instanceof Block) {
                continue;
            }

            if ($value instanceof Number) {
                $vars[str_replace('_', '-', $name)] = $this->compileValue($value);
            }
        }

        return $vars;
    }
}
