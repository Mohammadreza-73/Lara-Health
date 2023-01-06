<?php

namespace LaravelHealth\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class HealthController extends Controller
{
    public function index()
    {
        $data = [];
        if (config('health.database')) {
            $database = [
                'status' => true,
                'data'   => null,
            ];

            if (!self::checkDataBase()) {
                $database['status'] = false;
                $database['data'] = 'اتصال به دیتابیس امکان‌پذیر نیست';
            }
            $data['database'] = $database;
        }

        if (config('health.migrations')) {
            $migrations = [
                'status' => true,
                'data'   => null,
            ];

            if (!self::checkMigrataions()) {
                $migrations['status'] = false;
                $migrations['data'] = 'در اجرا مایگریشن‌ها مشکلی وجود دارد';
            }
            $data['migrations'] = $migrations;
        }

        if (config('health.routes')) {
            $routes = [
                'status' => true,
                'data'   => null,
            ];

            if (!self::checkRoutes()) {
                $routes['status'] = false;
                $routes['data'] = 'روت‌ها در درسترس نیستند';
            }
            $data['routes'] = $routes;
        }

        return view('health::index', compact('data'));
    }

    private static function checkDataBase(): bool
    {
        try {
            DB::connection()->getPdo();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private static function checkMigrataions(): bool
    {
        $migrations = DB::table('migrations')->get();
        $files = Storage::files(base_path() . '/database/migrations/');

        if (count($migrations) === count($files)) {
            return true;
        }

        return false;
    }

    private static function checkRoutes(): bool
    {
        $blackList = ['health'];
        $routes = Route::getRoutes()->getRoutesByMethod()['GET'];

        foreach ($routes as $uri => $route) {
            if (in_array($route->uri(), $blackList) || $route->getPrefix() === 'api') {
                continue;
            }

            $response = app()->handle(Request::create(url($route->uri())));
            $params = $route->parameters ?? [];

            if (count($params)) {
                continue;
            }

            $status = $response->status();
            if ($status != 200) {
                return false;
            }
        }

        return true;
    }
}
