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
 