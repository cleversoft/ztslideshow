<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

// The class name must always be the same as the filename (in camel case)
class JFormFieldSlides extends JFormField
{

    //The field class must know its own type through the variable $type.
    protected $type = 'Slides';

    public function __construct($form = null)
    {
        parent::__construct($form);
        JHtml::_('behavior.modal');
    }

    public function getLabel()
    {
        // code that returns HTML that will be shown as the label
    }

    public function getInput()
    {    
        ob_start();
        require_once __DIR__ . '/html/slide.php';
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }

}