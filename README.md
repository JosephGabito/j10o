### WhenThen

A drop-in package for wrapping WordPress' add_action and do_action(soon) :octocat:

### Basic usage

#### Via composer

Do `composer require j10o/whenthen` 

Or locate your project's composer.json then add `j10o/whenthen": "dev-main"` in `require` property.

For example:
```javascript
{
    "require": {
        "j10o/whenthen": "dev-main"
    }
}
```

In your plugin's main file include the vendor autoload.

```php
// Require Composer's autoload file.
require __DIR__ . '/vendor/autoload.php';`

// Create new event object.
$wp_event = new \WhenThen\MiddleWare\Event();

// Similar to add_action stuff with WordPress.
$wp_loaded = array(
    'name' => 'wp',
    'priority' => 10,
    'num_args' => 1
);

// Same here.
$footer_loaded = array(
    'name' => 'wp_footer',
    'priority' => 10,
);

// Closure function to call when something happen.
$do_this_thing_1 = function($query_vars) {
    error_log( var_export( $query_vars, true ) );
};

// Another closure function to call when something happen.
$do_this_thing_2 = function() {
    echo 'I am in footer.';
};

// Listen to the event.
$wp_event->when( $wp_loaded )->then( $do_this_thing_1 );

// Another one.
$wp_event->when( $footer_loaded )->then( $do_this_thing_2 );
```