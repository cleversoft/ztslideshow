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

$doc = JFactory::getDocument();
//    $doc->addScriptDeclaration($script);
$doc->addScript(JUri::root() . '/modules/mod_zt_slideshow/assets/bxslider/jquery.bxslider.min.js');
$doc->addStyleSheet(JUri::root() . '/modules/mod_zt_slideshow/assets/bxslider/jquery.bxslider.css');
$doc->addStyleSheet(JUri::root() . '/modules/mod_zt_slideshow/assets/css/front/style.css');
$doc->addStyleSheet(JUri::root() . '/modules/mod_zt_slideshow/assets/css/front/animation.css');
$_id = 'zt-slider-show' . rand(12345, 98765);

//echo '<pre>';
//var_dump($slides);

?>

<div class="zt-slideshow" id="<?php echo $_id; ?>">
    <?php foreach ($slides as $slide) : ?>
        <?php $params = $slide['params']; ?>
        <div class="zt-slidershow-item">
            <div class="full-backround"
                 style="background-image: url('<?php echo $params->get('background-image'); ?>'); background-color: <?php echo $params->get('background-color'); ?>"></div>
            <div class="container">
                <div class="row">
                    <?php
                    $item = $slide['left'];
                    if ($item->get('column') != 'none') {
                        ?>

                        <div
                            class="left zt-slider-position <?php echo 'col-md-' . $item->get('column') . ' col-sm-' . $item->get('column'); ?>">
                            <?php $item = $slide['left']; ?>
                            <?php require __DIR__ . '/' . $item->get('type') . '.php'; ?>
                        </div>
                    <?php
                    }
                    $item = $slide['right'];
                    if ($item->get('column') != 'none') {
                        ?>
                        <div
                            class="right zt-slider-position <?php echo 'col-md-' . $item->get('column') . ' col-sm-' . $item->get('column'); ?>">
                            <?php require __DIR__ . '/' . $item->get('type') . '.php'; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
    slider = jQuery('#<?php echo $_id; ?>').bxSlider({
        onSliderLoad: function () {
            jQuery("#<?php echo $_id; ?> > div:not('.bx-clone')").eq(0).addClass('active');
        },
        onSlideAfter: function () {
            jQuery("#<?php echo $_id; ?> div").removeClass('active');
            current = slider.getCurrentSlide();
            jQuery("#<?php echo $_id; ?> > div:not('.bx-clone')").eq(current).addClass('active');
        }
    });

</script>