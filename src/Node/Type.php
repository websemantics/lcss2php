<?php namespace Websemantics\Lcss2php\Node;

/**
 * Class Type
 *
 * List of all scss / less node types for reference
 *
 * @link   http://websemantics.ca
 * @author Adnan M.Sagar, <adnan@websemantics.ca>
 * @copyright 2011-2016 Web Semantics, Inc.
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/websemantics/lcss2php
 */

class Type extends \Leafo\ScssPhp\Type {

    /* http://leafo.github.io/scssphp */
    const T_SCSS = ['assign','at-root','block','break','charset','color','comment','continue','control','debug','directive','each','else','elseif','error','exp','extend','for','function','fncall','hsl','if','import','include','interpolate','interpolated','keyword','list','map','media','mediaExp','mediaType','mediaValue','mixin','mixin_content','nestedprop','not','null','number','return','root','scssphp-import-once','self','string','unary','var','warn','while'];

    /* http://lessphp.gpeasy.com */
    const T_LESS = ['Alpha','Anonymous','Assignment','Attribute','Call','Color','Comment','Condition','DetachedRuleset','Dimension','Directive','Element','Expression','Extend','Import','Javascript','Keyword','Media','MixinCall','NameValue','Negative','Operation','Paren','Quoted','Rule','Ruleset','Selector','UnicodeDescriptor','Unit','Url','Value','Variable'];
}