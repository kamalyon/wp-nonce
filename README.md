# wp-nonce
WordPress plugin that enables the wordpress nonce function in an object-oriented environment.

##How to install

Add to your composer.json file this package as a require an then run 'composer update'
```
"kamalyon/wp-nonce": "1.0.*"
```

Or directly run
```
composer require kamalyon/wp-nonce
```

##How to use

Create nonce
```php
$Wp_Nonce = new Wp_Nonce();
$nonce = $Wp_Nonce->createNonce('my-nonce');
```

Prints nonce input field
```php
$Wp_Nonce = new Wp_Nonce();
$Wp_Nonce->nonceField('name-of-my-action', 'name-of-nonce-field');
```

Create nonce url 
```php
$Wp_Nonce = new Wp_Nonce();
$url = $Wp_Nonce->nonceURL('http://my-url.com', 'doing-something', 'my-nonce');
```

Verify nonce
```php
$nonce = $_REQUEST['nonce'];
$Wp_Nonce = new Wp_Nonce();
if ($Wp_Nonce->verifyNonce($nonce, 'my-nonce')) {
    //OK  
}else{
    //KO
}
```

Check admin referer
 ```php
 $Wp_Nonce = new Wp_Nonce();
 if ($Wp_Nonce->checkAdminReferer('name-of-my-action', 'name-of-nonce-field')) {
    //OK
 }else{
    //KO
 }
 ```
 
##How to run Unit Tests

1) Install WordPress developer suite
```
// Make the directory for the tools (assumes that ~/svn exists; 
// you can create it by running "$ mkdir ~/svn")
$ mkdir ~/svn/wordpress-dev
 
// Change to the new directory we just made.
$ cd ~/svn/wordpress-dev
 
// Check out the developer tools with SVN.
$ svn co http://develop.svn.wordpress.org/trunk/
```

2) Check the WordPress developer suite is working properly
```
// Change to the trunk directory.
$ cd ~/svn/wordpress-dev/trunk/
 
// Make sure the checkout is up to date.
$ svn up
 
// Run all of the tests.
$ phpunit
 
// Run only, e.g., the cache tests.
$ phpunit tests/phpunit/tests/cache
```

3) Install this plugin
```
composer require kamalyon/wp-nonce
```

4) Change the paths in the bootstrap.php file of the plugin
```
// The path to the WordPress tests checkout.
define( 'WP_TESTS_DIR', '/Users/me/workspace/wordpress-dev/trunk/tests/phpunit/' );
// The path to the main file of the plugin to test.
define( 'TEST_PLUGIN_FILE', '/Users/me/workspace/wp-nonce/wp-nonce.php' );
 ```
 
5) Run the unit tests
 ```
// Go to the plugin's folder
cd /Users/me/workspace/wp-nonce/
// Run the tests
phpunit
 ```