<?php

namespace App\Http\Middleware;

use App\Enums\Locale;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

/**
 * Language
 */
class Language
{
    /**
     * URLのパスから言語設定する
     */
    public function handle($request, Closure $next): Response|RedirectResponse
    {
        $locale = $request->route('lang');

        // 指定なしの場合、日本語表示
        if (!in_array($locale, Locale::values())) {
            $fallback = session('locale') ?: config('app.fallbacklocale');
            app()->setLocale($fallback);
            session(['locale' => $fallback]);

            abort(Response::HTTP_NOT_FOUND);
        }

        app()->setLocale($locale);
        session(['locale' => $locale]);
        return $next($request);
    }
}
