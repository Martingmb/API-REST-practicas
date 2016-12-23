<?php
// API group
$app->group('/api', function () use ($app, $log) {

    // Version group
    $app->group('/v1', function () use ($app, $log) {

        // GET route
        $app->get('/contacts/:id', function ($id) use ($app, $log) {

        });

        // PUT route, for updating
        $app->put('/contacts/:id', function ($id) use ($app, $log) {

        });

        // DELETE route
        $app->delete('/contacts/:id', function ($id) use ($app, $log) {

        });

    });
});
?>