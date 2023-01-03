<?php

namespace LaravelHealth\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    public function index()
    {
        $data = [];
        if (config('health.database')) {
            $database = [
                'status' => true,
                'data' => null
            ];

            if (! self::checkDataBase()) {
                $database['status'] = false;
                $database['data'] = 'اتصال به دیتابیس امکان‌پذیر نیست';
            }
            $data['database'] = $database;
        }

        return view('health::index', compact('data'));
    }

    private static function checkDataBase()
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}