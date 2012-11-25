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
