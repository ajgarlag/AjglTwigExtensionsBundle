AjglTwigExtensionsBundle
========================

This bundle integrates the AjglTwigExtensions library into Symfony.


Instalation
-----------

###Download AjglTwigExtensionsBundle

Add AjglTwigExtensionsBundle in your composer.json:

```js
{
    "require": {
        "ajgl/twig-extensions-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update ajgl/twig-extensions-bundle
```

Composer will install the bundle to your project's `vendor/ajgl` directory.


###Enable the Bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Ajgl\Bundle\TwigExtensionsBundle\AjglTwigExtensionsBundle(),
    );
}
```

###Use the extensions in your twig template

You can now use the extensions in your twig template. For example:

```twig
{% block main_block %}
    {{breakpoint()}}
{% endblock %}
```
