<?php

/**
 * ZT Slideshow
 * 
 * @package     Joomla
 * @subpackage  Module
 * @version     1.0.0
 * @author      ZooTemplate 
 * @email       support@zootemplate.com 
 * @link        http://www.zootemplate.com 
 * @copyright   Copyright (c) 2015 ZooTemplate
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

require_once __DIR__ . '/bootstrap.php';

$slides = json_decode($params->get('slides'));

$slides = ZtSlideshowHelperHelper::prepare($slides, $params);

require JModuleHelper::getLayoutPath('mod_zt_slideshow', $params->get('layout', 'default'));
