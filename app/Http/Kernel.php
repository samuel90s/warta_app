// app/Http/Kernel.php

protected $routeMiddleware = [
    // Other middleware entries
    'admin' => \App\Http\Middleware\Admin::class,
    'ketuarw' => \App\Http\Middleware\KetuaRw::class,
    'petugas' => \App\Http\Middleware\Petugas::class,
    'warga' => \App\Http\Middleware\Warga::class,
    'redirectIfAuthenticated' => \App\Http\Middleware\RedirectIfAuthenticated::class,
];
