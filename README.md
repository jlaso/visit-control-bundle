JaitecClickBundle
=================

- This bundle provides a simply way to control times a page of our project is visited


Installation
============

Add JaitecClickBundle to your vendor/bundles/ dir
------------------------------------------

::

    $ git submodule add https://bitbucket.org/jlaso/jaitecclickbundle.git vendor/bundles/Jaitec/ClickBundle

or add this to deps

    [JaitecClickBundle]    
        git=https://bitbucket.org/jlaso/jaitecclickbundle.git
        target=/bundles/Jaitec/ClickBundle


and run 

    $ php bin/vendors update

Add the Jaitec namespace to your autoloader
-------------------------------------------

::

    // app/autoload.php
    $loader->registerNamespaces(array(
        'Jaitec' => __DIR__.'/../vendor/bundles',
        // your other namespaces
    );

Add JaitecClickBundle to your application kernel
------------------------------------------

::

    // app/AppKernel.php

    public function registerBundles()
    {
        return array(
            // ...
            new Jaitec\ClickBundle\JaitecClickBundle(),
            // ...
        );
    }



Usage Sample
==========
::

    configuration sample

    //app/config.yml

    #every time a route is visited
    jaitec_click:
        routes:
            # this is a logic name and can be anything
            demo:
                # this match to logic route (not pattern) defined in routing.yml
                route: _demo_hello
                # the type in to save at jaitec_click table
                entity_type: demo
                # this is for no id, the route contains a name or slug
                entity_id: ~
                entity_name: name
            another:
                route: _demo
                entity_type: demo
                # the route not contains any info because is a fixed route
                entity_id: 1
                entity_name: ~



More info in my spanish site

- [jaitec.net][1]


[1]: http://jaitec.net/blog/control-simple-de-las-paginas-visitadas-en-tu-sitio-symfony2/