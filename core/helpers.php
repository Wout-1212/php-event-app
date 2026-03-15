<?php

function dd($data)
{
    if (empty($data)) {
        die();
    }

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    die();
}

function view($view, $data = [])
{
    extract($data);
    require_once "../app/views/$view.php";
}

function redirect($path)
{
    header("Location: {$path}");
    die();
}

function snippet($snippet, $data = [])
{
    extract($data);
    require_once "../app/views/snippets/{$snippet}.php";
}

/**
 * Output Vite script and style tags (Laravel Vite plugin compatible).
 * In dev: uses Vite dev server (hot file). In production: uses build manifest.
 *
 * @param string[] $entrypoints Entry paths as in vite.config.js (e.g. ['theme/main.scss', 'resources/js/app.js'])
 * @return void
 */
function vite($entrypoints = ['theme/main.scss', 'resources/js/app.js'])
{
    $hotFile = PUBLIC_PATH . '/hot';
    if (file_exists($hotFile)) {
        $host = trim(file_get_contents($hotFile));
        echo '<script type="module" src="' . htmlspecialchars($host) . '/@vite/client"></script>' . "\n";
        foreach ($entrypoints as $entry) {
            echo '<script type="module" src="' . htmlspecialchars($host) . '/' . htmlspecialchars($entry) . '"></script>' . "\n";
        }
        return;
    }

    $manifestPath = PUBLIC_PATH . '/build/manifest.json';
    if (!file_exists($manifestPath)) {
        return;
    }

    $manifest = json_decode(file_get_contents($manifestPath), true);
    if (!$manifest) {
        return;
    }

    $base = '/build/';
    foreach ($entrypoints as $entry) {
        if (!isset($manifest[$entry])) {
            continue;
        }
        $chunk = $manifest[$entry];
        if (!empty($chunk['css'])) {
            foreach ($chunk['css'] as $css) {
                echo '<link rel="stylesheet" href="' . htmlspecialchars($base . $css) . '">' . "\n";
            }
        }
        if (!empty($chunk['file'])) {
            echo '<script type="module" src="' . htmlspecialchars($base . $chunk['file']) . '"></script>' . "\n";
        }
    }
}
