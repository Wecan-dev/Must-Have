<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit77d8b394ee768d4d76e0f5a92a6c124d
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '65fec9ebcfbb3cbb4fd0d519687aea01' => __DIR__ . '/..' . '/danielstjules/stringy/src/Create.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WeDevs\\WeMail\\' => 14,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Stringy\\' => 8,
        ),
        'L' => 
        array (
            'League\\Csv\\' => 11,
        ),
        'A' => 
        array (
            'Appsero\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WeDevs\\WeMail\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Stringy\\' => 
        array (
            0 => __DIR__ . '/..' . '/danielstjules/stringy/src',
        ),
        'League\\Csv\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/csv/src',
        ),
        'Appsero\\' => 
        array (
            0 => __DIR__ . '/..' . '/appsero/client/src',
        ),
    );

    public static $classMap = array (
        'Appsero\\Client' => __DIR__ . '/..' . '/appsero/client/src/Client.php',
        'Appsero\\Insights' => __DIR__ . '/..' . '/appsero/client/src/Insights.php',
        'Appsero\\License' => __DIR__ . '/..' . '/appsero/client/src/License.php',
        'Appsero\\Updater' => __DIR__ . '/..' . '/appsero/client/src/Updater.php',
        'League\\Csv\\AbstractCsv' => __DIR__ . '/..' . '/league/csv/src/AbstractCsv.php',
        'League\\Csv\\Config\\Controls' => __DIR__ . '/..' . '/league/csv/src/Config/Controls.php',
        'League\\Csv\\Config\\Output' => __DIR__ . '/..' . '/league/csv/src/Config/Output.php',
        'League\\Csv\\Exception\\InvalidRowException' => __DIR__ . '/..' . '/league/csv/src/Exception/InvalidRowException.php',
        'League\\Csv\\Modifier\\MapIterator' => __DIR__ . '/..' . '/league/csv/src/Modifier/MapIterator.php',
        'League\\Csv\\Modifier\\QueryFilter' => __DIR__ . '/..' . '/league/csv/src/Modifier/QueryFilter.php',
        'League\\Csv\\Modifier\\RowFilter' => __DIR__ . '/..' . '/league/csv/src/Modifier/RowFilter.php',
        'League\\Csv\\Modifier\\StreamFilter' => __DIR__ . '/..' . '/league/csv/src/Modifier/StreamFilter.php',
        'League\\Csv\\Plugin\\ColumnConsistencyValidator' => __DIR__ . '/..' . '/league/csv/src/Plugin/ColumnConsistencyValidator.php',
        'League\\Csv\\Plugin\\ForbiddenNullValuesValidator' => __DIR__ . '/..' . '/league/csv/src/Plugin/ForbiddenNullValuesValidator.php',
        'League\\Csv\\Plugin\\SkipNullValuesFormatter' => __DIR__ . '/..' . '/league/csv/src/Plugin/SkipNullValuesFormatter.php',
        'League\\Csv\\Reader' => __DIR__ . '/..' . '/league/csv/src/Reader.php',
        'League\\Csv\\Writer' => __DIR__ . '/..' . '/league/csv/src/Writer.php',
        'Stringy\\StaticStringy' => __DIR__ . '/..' . '/danielstjules/stringy/src/StaticStringy.php',
        'Stringy\\Stringy' => __DIR__ . '/..' . '/danielstjules/stringy/src/Stringy.php',
        'Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',
        'WeDevs\\WeMail\\Admin\\Admin' => __DIR__ . '/../..' . '/includes/Admin/Admin.php',
        'WeDevs\\WeMail\\Admin\\Elementor\\FormAction' => __DIR__ . '/../..' . '/includes/Admin/Elementor/FormAction.php',
        'WeDevs\\WeMail\\Admin\\FormPreview' => __DIR__ . '/../..' . '/includes/Admin/FormPreview.php',
        'WeDevs\\WeMail\\Admin\\Menu' => __DIR__ . '/../..' . '/includes/Admin/Menu.php',
        'WeDevs\\WeMail\\Admin\\Scripts' => __DIR__ . '/../..' . '/includes/Admin/Scripts.php',
        'WeDevs\\WeMail\\Admin\\Shortcode' => __DIR__ . '/../..' . '/includes/Admin/Shortcode.php',
        'WeDevs\\WeMail\\Core\\Api\\Api' => __DIR__ . '/../..' . '/includes/Core/Api/Api.php',
        'WeDevs\\WeMail\\Core\\Auth\\Auth' => __DIR__ . '/../..' . '/includes/Core/Auth/Auth.php',
        'WeDevs\\WeMail\\Core\\Billing\\Menu' => __DIR__ . '/../..' . '/includes/Core/Billing/Menu.php',
        'WeDevs\\WeMail\\Core\\Campaign\\Campaign' => __DIR__ . '/../..' . '/includes/Core/Campaign/Campaign.php',
        'WeDevs\\WeMail\\Core\\Campaign\\Editor' => __DIR__ . '/../..' . '/includes/Core/Campaign/Editor.php',
        'WeDevs\\WeMail\\Core\\Campaign\\Event' => __DIR__ . '/../..' . '/includes/Core/Campaign/Event.php',
        'WeDevs\\WeMail\\Core\\Campaign\\Menu' => __DIR__ . '/../..' . '/includes/Core/Campaign/Menu.php',
        'WeDevs\\WeMail\\Core\\Customizer\\ContentTypes' => __DIR__ . '/../..' . '/includes/Core/Customizer/ContentTypes.php',
        'WeDevs\\WeMail\\Core\\Customizer\\Customizer' => __DIR__ . '/../..' . '/includes/Core/Customizer/Customizer.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\EDD\\EDDCustomers' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/EDD/EDDCustomers.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\EDD\\EDDIntegration' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/EDD/EDDIntegration.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\EDD\\EDDOrders' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/EDD/EDDOrders.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\EDD\\EDDProducts' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/EDD/EDDProducts.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\Requests\\Orders' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/Requests/Orders.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\Requests\\Products' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/Requests/Products.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\WooCommerce\\WCCustomers' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/WooCommerce/WCCustomers.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\WooCommerce\\WCIntegration' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/WooCommerce/WCIntegration.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\WooCommerce\\WCOrderProducts' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/WooCommerce/WCOrderProducts.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\WooCommerce\\WCOrders' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/WooCommerce/WCOrders.php',
        'WeDevs\\WeMail\\Core\\Ecommerce\\WooCommerce\\WCProducts' => __DIR__ . '/../..' . '/includes/Core/Ecommerce/WooCommerce/WCProducts.php',
        'WeDevs\\WeMail\\Core\\Form\\Form' => __DIR__ . '/../..' . '/includes/Core/Form/Form.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\AbstractIntegration' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/AbstractIntegration.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\CalderaForms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/CalderaForms.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\ContactForm7' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/ContactForm7.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\FluentForms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/FluentForms.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\FormidableForms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/FormidableForms.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\GravityForms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/GravityForms.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\HappyForms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/HappyForms.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\Hooks' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/Hooks.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\NinjaForms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/NinjaForms.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\PopupBuilder' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/PopupBuilder.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\PopupMaker' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/PopupMaker.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\Rest' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/Rest.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\Weforms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/Weforms.php',
        'WeDevs\\WeMail\\Core\\Form\\Integrations\\Wpforms' => __DIR__ . '/../..' . '/includes/Core/Form/Integrations/Wpforms.php',
        'WeDevs\\WeMail\\Core\\Form\\Menu' => __DIR__ . '/../..' . '/includes/Core/Form/Menu.php',
        'WeDevs\\WeMail\\Core\\Help\\Menu' => __DIR__ . '/../..' . '/includes/Core/Help/Menu.php',
        'WeDevs\\WeMail\\Core\\Help\\Services\\PingService' => __DIR__ . '/../..' . '/includes/Core/Help/Services/PingService.php',
        'WeDevs\\WeMail\\Core\\Help\\Services\\PluginsInfo' => __DIR__ . '/../..' . '/includes/Core/Help/Services/PluginsInfo.php',
        'WeDevs\\WeMail\\Core\\Help\\Services\\SystemService' => __DIR__ . '/../..' . '/includes/Core/Help/Services/SystemService.php',
        'WeDevs\\WeMail\\Core\\Help\\Services\\WordpressInfo' => __DIR__ . '/../..' . '/includes/Core/Help/Services/WordpressInfo.php',
        'WeDevs\\WeMail\\Core\\Help\\SystemInfo' => __DIR__ . '/../..' . '/includes/Core/Help/SystemInfo.php',
        'WeDevs\\WeMail\\Core\\Import\\Import' => __DIR__ . '/../..' . '/includes/Core/Import/Import.php',
        'WeDevs\\WeMail\\Core\\Import\\Menu' => __DIR__ . '/../..' . '/includes/Core/Import/Menu.php',
        'WeDevs\\WeMail\\Core\\Integrations\\Menu' => __DIR__ . '/../..' . '/includes/Core/Integrations/Menu.php',
        'WeDevs\\WeMail\\Core\\Lists\\Lists' => __DIR__ . '/../..' . '/includes/Core/Lists/Lists.php',
        'WeDevs\\WeMail\\Core\\Lists\\Menu' => __DIR__ . '/../..' . '/includes/Core/Lists/Menu.php',
        'WeDevs\\WeMail\\Core\\Mail\\Hooks' => __DIR__ . '/../..' . '/includes/Core/Mail/Hooks.php',
        'WeDevs\\WeMail\\Core\\Mail\\MailerHelper' => __DIR__ . '/../..' . '/includes/Core/Mail/MailerHelper.php',
        'WeDevs\\WeMail\\Core\\Mail\\WeMailMailer54' => __DIR__ . '/../..' . '/includes/Core/Mail/WeMailMailer54.php',
        'WeDevs\\WeMail\\Core\\Mail\\WeMailMailer55' => __DIR__ . '/../..' . '/includes/Core/Mail/WeMailMailer55.php',
        'WeDevs\\WeMail\\Core\\Overview\\Menu' => __DIR__ . '/../..' . '/includes/Core/Overview/Menu.php',
        'WeDevs\\WeMail\\Core\\Overview\\Overview' => __DIR__ . '/../..' . '/includes/Core/Overview/Overview.php',
        'WeDevs\\WeMail\\Core\\Segment\\Segment' => __DIR__ . '/../..' . '/includes/Core/Segment/Segment.php',
        'WeDevs\\WeMail\\Core\\Settings\\Menu' => __DIR__ . '/../..' . '/includes/Core/Settings/Menu.php',
        'WeDevs\\WeMail\\Core\\Settings\\Settings' => __DIR__ . '/../..' . '/includes/Core/Settings/Settings.php',
        'WeDevs\\WeMail\\Core\\Shortcode\\Shortcode' => __DIR__ . '/../..' . '/includes/Core/Shortcode/Shortcode.php',
        'WeDevs\\WeMail\\Core\\Subscriber\\Subscriber' => __DIR__ . '/../..' . '/includes/Core/Subscriber/Subscriber.php',
        'WeDevs\\WeMail\\Core\\Sync\\Ecommerce\\EDD\\Orders' => __DIR__ . '/../..' . '/includes/Core/Sync/Ecommerce/EDD/Orders.php',
        'WeDevs\\WeMail\\Core\\Sync\\Ecommerce\\EDD\\Products' => __DIR__ . '/../..' . '/includes/Core/Sync/Ecommerce/EDD/Products.php',
        'WeDevs\\WeMail\\Core\\Sync\\Ecommerce\\WooCommerce\\Orders' => __DIR__ . '/../..' . '/includes/Core/Sync/Ecommerce/WooCommerce/Orders.php',
        'WeDevs\\WeMail\\Core\\Sync\\Ecommerce\\WooCommerce\\Products' => __DIR__ . '/../..' . '/includes/Core/Sync/Ecommerce/WooCommerce/Products.php',
        'WeDevs\\WeMail\\Core\\Sync\\Subscriber\\Erp\\Erp' => __DIR__ . '/../..' . '/includes/Core/Sync/Subscriber/Erp/Erp.php',
        'WeDevs\\WeMail\\Core\\Sync\\Subscriber\\Erp\\Hooks' => __DIR__ . '/../..' . '/includes/Core/Sync/Subscriber/Erp/Hooks.php',
        'WeDevs\\WeMail\\Core\\Sync\\Subscriber\\Subscriber' => __DIR__ . '/../..' . '/includes/Core/Sync/Subscriber/Subscriber.php',
        'WeDevs\\WeMail\\Core\\Sync\\Subscriber\\Wp\\Hooks' => __DIR__ . '/../..' . '/includes/Core/Sync/Subscriber/Wp/Hooks.php',
        'WeDevs\\WeMail\\Core\\Sync\\Subscriber\\Wp\\Wp' => __DIR__ . '/../..' . '/includes/Core/Sync/Subscriber/Wp/Wp.php',
        'WeDevs\\WeMail\\Core\\Sync\\Sync' => __DIR__ . '/../..' . '/includes/Core/Sync/Sync.php',
        'WeDevs\\WeMail\\Core\\User\\Integrations\\WpUser' => __DIR__ . '/../..' . '/includes/Core/User/Integrations/WpUser.php',
        'WeDevs\\WeMail\\Core\\User\\User' => __DIR__ . '/../..' . '/includes/Core/User/User.php',
        'WeDevs\\WeMail\\Core\\Users\\Menu' => __DIR__ . '/../..' . '/includes/Core/Users/Menu.php',
        'WeDevs\\WeMail\\FrontEnd\\FormOptIn' => __DIR__ . '/../..' . '/includes/FrontEnd/FormOptIn.php',
        'WeDevs\\WeMail\\FrontEnd\\FrontEnd' => __DIR__ . '/../..' . '/includes/FrontEnd/FrontEnd.php',
        'WeDevs\\WeMail\\FrontEnd\\Scripts' => __DIR__ . '/../..' . '/includes/FrontEnd/Scripts.php',
        'WeDevs\\WeMail\\FrontEnd\\Shortcodes' => __DIR__ . '/../..' . '/includes/FrontEnd/Shortcodes.php',
        'WeDevs\\WeMail\\FrontEnd\\Widget' => __DIR__ . '/../..' . '/includes/FrontEnd/Widget.php',
        'WeDevs\\WeMail\\Hooks' => __DIR__ . '/../..' . '/includes/Hooks.php',
        'WeDevs\\WeMail\\Install' => __DIR__ . '/../..' . '/includes/Install.php',
        'WeDevs\\WeMail\\Privacy\\Privacy' => __DIR__ . '/../..' . '/includes/Privacy/Privacy.php',
        'WeDevs\\WeMail\\RestController' => __DIR__ . '/../..' . '/includes/RestController.php',
        'WeDevs\\WeMail\\Rest\\Auth' => __DIR__ . '/../..' . '/includes/Rest/Auth.php',
        'WeDevs\\WeMail\\Rest\\Countries' => __DIR__ . '/../..' . '/includes/Rest/Countries.php',
        'WeDevs\\WeMail\\Rest\\Csv' => __DIR__ . '/../..' . '/includes/Rest/Csv.php',
        'WeDevs\\WeMail\\Rest\\Customizer' => __DIR__ . '/../..' . '/includes/Rest/Customizer.php',
        'WeDevs\\WeMail\\Rest\\ERP' => __DIR__ . '/../..' . '/includes/Rest/ERP.php',
        'WeDevs\\WeMail\\Rest\\Ecommerce\\Customers' => __DIR__ . '/../..' . '/includes/Rest/Ecommerce/Customers.php',
        'WeDevs\\WeMail\\Rest\\Ecommerce\\Integrations' => __DIR__ . '/../..' . '/includes/Rest/Ecommerce/Integrations.php',
        'WeDevs\\WeMail\\Rest\\Ecommerce\\Orders' => __DIR__ . '/../..' . '/includes/Rest/Ecommerce/Orders.php',
        'WeDevs\\WeMail\\Rest\\Ecommerce\\Products' => __DIR__ . '/../..' . '/includes/Rest/Ecommerce/Products.php',
        'WeDevs\\WeMail\\Rest\\Forms' => __DIR__ . '/../..' . '/includes/Rest/Forms.php',
        'WeDevs\\WeMail\\Rest\\Help\\Help' => __DIR__ . '/../..' . '/includes/Rest/Help/Help.php',
        'WeDevs\\WeMail\\Rest\\MailPoet' => __DIR__ . '/../..' . '/includes/Rest/MailPoet.php',
        'WeDevs\\WeMail\\Rest\\Middleware\\WeMailMiddleware' => __DIR__ . '/../..' . '/includes/Rest/Middleware/WeMailMiddleware.php',
        'WeDevs\\WeMail\\Rest\\Pages' => __DIR__ . '/../..' . '/includes/Rest/Pages.php',
        'WeDevs\\WeMail\\Rest\\Rest' => __DIR__ . '/../..' . '/includes/Rest/Rest.php',
        'WeDevs\\WeMail\\Rest\\Site' => __DIR__ . '/../..' . '/includes/Rest/Site.php',
        'WeDevs\\WeMail\\Rest\\States' => __DIR__ . '/../..' . '/includes/Rest/States.php',
        'WeDevs\\WeMail\\Rest\\Users' => __DIR__ . '/../..' . '/includes/Rest/Users.php',
        'WeDevs\\WeMail\\Rest\\Video' => __DIR__ . '/../..' . '/includes/Rest/Video.php',
        'WeDevs\\WeMail\\Rest\\WP' => __DIR__ . '/../..' . '/includes/Rest/WP.php',
        'WeDevs\\WeMail\\Traits\\Ajax' => __DIR__ . '/../..' . '/includes/Traits/Ajax.php',
        'WeDevs\\WeMail\\Traits\\Core' => __DIR__ . '/../..' . '/includes/Traits/Core.php',
        'WeDevs\\WeMail\\Traits\\Hooker' => __DIR__ . '/../..' . '/includes/Traits/Hooker.php',
        'WeDevs\\WeMail\\Traits\\Singleton' => __DIR__ . '/../..' . '/includes/Traits/Singleton.php',
        'WeDevs\\WeMail\\Uninstall' => __DIR__ . '/../..' . '/includes/Uninstall.php',
        'WeDevs\\WeMail\\Upgrade' => __DIR__ . '/../..' . '/includes/Upgrade.php',
        'WeDevs\\WeMail\\WeMail' => __DIR__ . '/../..' . '/includes/WeMail.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit77d8b394ee768d4d76e0f5a92a6c124d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit77d8b394ee768d4d76e0f5a92a6c124d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit77d8b394ee768d4d76e0f5a92a6c124d::$classMap;

        }, null, ClassLoader::class);
    }
}
