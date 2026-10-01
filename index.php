<?php

$projectName = 'knecht-works-test-repo';

$stats = [
    'PHP version' => PHP_VERSION,
    'Server' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',
    'Host' => $_SERVER['HTTP_HOST'] ?? 'localhost',
    'Server time' => date('Y-m-d H:i:s T'),
];

$features = [
    [
        'icon' => '⚙',
        'title' => 'DDEV powered',
        'text' => 'Local and preview environments run from the same .ddev/config.yaml, so what you see here matches your machine.',
    ],
    [
        'icon' => '⚡',
        'title' => 'Plain PHP',
        'text' => 'No framework, no build step. A single entry point and a stylesheet, ready to grow into whatever comes next.',
    ],
    [
        'icon' => '☁',
        'title' => 'Preview deploys',
        'text' => 'Every push to the repository updates the preview, so changes are visible a moment after they land.',
    ],
];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($projectName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="/">
                <span class="brand-mark">K</span>
                <span><?= e($projectName) ?></span>
            </a>
            <nav class="nav">
                <a href="#features">Features</a>
                <a href="#status">Status</a>
                <button class="theme-toggle" type="button" aria-label="Toggle dark mode">◐</button>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <span class="badge"><span class="dot"></span> Preview is live</span>
                <h1>Ship small, see it <span class="accent">instantly</span>.</h1>
                <p class="lead">
                    A tiny PHP project running on DDEV, deployed to a preview environment on every push.
                </p>
                <div class="actions">
                    <a class="btn btn-primary" href="#status">Check status</a>
                    <a class="btn btn-ghost" href="https://github.com/bcostaaa01/knecht-works-test-repo" target="_blank" rel="noopener">View on GitHub</a>
                </div>
            </div>
        </section>

        <section id="features" class="section">
            <div class="container">
                <h2>What's inside</h2>
                <div class="grid">
                    <?php foreach ($features as $feature): ?>
                        <article class="card">
                            <div class="card-icon"><?= e($feature['icon']) ?></div>
                            <h3><?= e($feature['title']) ?></h3>
                            <p><?= e($feature['text']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="status" class="section">
            <div class="container">
                <h2>Environment status</h2>
                <div class="status-panel">
                    <?php foreach ($stats as $label => $value): ?>
                        <div class="status-row">
                            <span class="status-label"><?= e($label) ?></span>
                            <span class="status-value"><?= e($value) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Bruno &middot; Built with PHP <?= e(PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION) ?></p>
        </div>
    </footer>

    <script>
        (function () {
            var root = document.documentElement;
            try {
                var saved = localStorage.getItem('theme');
                if (saved) root.dataset.theme = saved;
            } catch (e) {}
            document.querySelector('.theme-toggle').addEventListener('click', function () {
                var dark = root.dataset.theme
                    ? root.dataset.theme === 'dark'
                    : window.matchMedia('(prefers-color-scheme: dark)').matches;
                root.dataset.theme = dark ? 'light' : 'dark';
                try { localStorage.setItem('theme', root.dataset.theme); } catch (e) {}
            });
        })();
    </script>
</body>
</html>
