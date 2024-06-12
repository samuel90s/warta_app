protected $routeMiddleware = [
    // Other middlewares
    'admin' => \App\Http\Middleware\Admin::class,
    'petugas' => \App\Http\Middleware\Petugas::class,
    'rw' => \App\Http\Middleware\Rw::class,
    'warga' => \App\Http\Middleware\Warga::class,
];
