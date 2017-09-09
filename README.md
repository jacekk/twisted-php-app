# TwistedPhpApp

### Disclaimer

Some magic done with PHP. Please, do **NOT** try this at home.

### Example

```php
(new TwistedPhpApp())->sayHello('world');                   // TwistedPhpApp app says: Hello world!
(new TwistedPhpApp('First'))->sayHello();                   // First app says: Hello!
(new TwistedPhpApp('Second'))->sayWelcome('uncle');         // Second app says: Welcome uncle!
(new TwistedPhpApp('Third'))->sayWelcomeToAllOf('you');     // Third app says: Welcome to all of you!
(new TwistedPhpApp(false))->sleep();                        // Third app sleeps!
(new TwistedPhpApp('Fifth'))->hate('you all');              // Fifth app hates: You all!
(new TwistedPhpApp('Sixth'))->hateYou('all');               // Sixth app hates: You all!
(new TwistedPhpApp('Seventh'))->hateYouAll();               // Seventh app hates: You all!
(new TwistedPhpApp('Eighth'))
    ->sing()                                                // Eighth app sings!
    ->eat('breakfast')                                      // Eighth app eats: Breakfast!
    ->loveEverybody();                                      // Eighth app loves: Everybody!
```
