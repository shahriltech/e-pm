<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'metronic/assets/global/plugins/uniform/css/uniform.default.css',
        'metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
        'metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
        'metronic/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
        'metronic/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',

        'metronic/assets/global/plugins/select2/css/select2.min.css',
        'metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css',
        'metronic/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css',
        'metronic/assets/global/plugins/morris/morris.css',
        //'metronic/assets/global/plugins/fullcalendar/fullcalendar.min.css',
        'metronic/assets/global/css/components-md.min.css',
        'metronic/assets/global/css/plugins-md.min.css',
        'metronic/assets/layouts/layout5/css/layout.min.css',
        'metronic/assets/layouts/layout5/css/custom.min.css',
        'metronic/assets/pages/css/login.min.css',
        'metronic/assets/pages/css/profile.min.css',

        'css/site.css',
    ];
    public $js = [
        'js/extra.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
