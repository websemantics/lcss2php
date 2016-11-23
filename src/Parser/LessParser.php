<?php namespace Websemantics\Lcss2php\Parser;

/**
 * Class LessParser
 *
 *
 * @link   http://websemantics.ca
 * @author Adnan M.Sagar, <adnan@websemantics.ca>
 * @copyright 2011-2016 Web Semantics, Inc.
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/websemantics/lcss2php
 */

class LessParser extends \Less_Parser {

    /**
     * Return root node
     *
     * @return Less_Tree_Ruleset 
     */
    public function getRoot(){
        return (new \Less_Tree_Ruleset(array(), $this->rules))->compile(new \Less_Environment([]));
    }
}
