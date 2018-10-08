<?php

$_ = "/wegdamit/hybrid-routing";

$routes = [
    "home" => [
        "route" => "home",
        "title" => "Home"
    ],
    "second" => [
        "route" => "second",
        "title" => "Second page"
    ]
];

$route = filter_input(INPUT_GET, "route");

if (!$route) {
    $route = $routes[0]["route"];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo $routes[$route]["title"]; ?></title>
    </head>

    <body>
        <div>Server routed: <?php echo $route; ?></div>

        <main id="root"></main>

        <script>
            const _ = '<?php echo $_; ?>';

            const routes = JSON.parse('<?php echo json_encode($routes) ?>');
            let route = '<?php echo $route; ?>';
        </script>
        <script src="main.js"></script>
    </body>
</html>