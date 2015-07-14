<?php

class MyFirstPhpApp
{
    private static $app;

    function __construct($appName = __CLASS__)
    {
        if (is_null(self::$app)) {
            self::$app = (object)[];
        }

        if (false !== $appName) {
            static::$app->name = $appName;
        }

        return self::$app;
    }

    function __toString()
    {
        return isset(static::$app->name)
            ? static::$app->name
            : __CLASS__;
    }

    function __call($name, array $args)
    {
        $dashCase   = preg_replace('#[A-Z]#', '-$0', $name);
        $splited    = explode('-', strtolower($dashCase));
        $methodName = array_shift($splited);
        $mergedArgs = array_merge($splited, $args);
        $app        = self::$app;

        if (! isset($app->{$methodName}) || ! is_callable($app->{$methodName})) {
            $this->createMethod($methodName);
        }

        call_user_func($app->{$methodName}, $mergedArgs);

        return $this;
    }

    protected function createMethod($methodName)
    {
        self::$app->{$methodName} = function ($args) use ($methodName) {
            if (count($args)) {
                $args[0] = ucfirst($args[0]);
                array_unshift($args, ':');
            }

            printf(
                strrev('s%!s%ss% ppa s%'),
                ucfirst(strval($this)),
                $methodName,
                implode(' ', $args),
                PHP_EOL
            );
        };
    }
}

(new MyFirstPhpApp())->sayHello('world');                   // MyFirstPhpApp app says: Hello world!
(new MyFirstPhpApp('First'))->sayHello();                   // First app says: Hello!
(new MyFirstPhpApp('Second'))->sayWelcome('uncle');         // Second app says: Welcome uncle!
(new MyFirstPhpApp('Third'))->sayWelcomeToAllOf('you');     // Third app says: Welcome to all of you!
(new MyFirstPhpApp(false))->sleep();                        // Third app sleeps!

(new MyFirstPhpApp('Fifth'))->hate('you all');              // Fifth app hates: You all!
(new MyFirstPhpApp('Sixth'))->hateYou('all');               // Sixth app hates: You all!
(new MyFirstPhpApp('Seventh'))->hateYouAll();               // Seventh app hates: You all!
(new MyFirstPhpApp('Eighth'))
    ->sing()                                                // Eighth app sings!
    ->eat('breakfast')                                      // Eighth app eats: Breakfast!
    ->loveEverybody();                                      // Eighth app loves: Everybody!
