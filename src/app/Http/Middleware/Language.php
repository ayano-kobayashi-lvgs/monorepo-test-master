<?php

namespace App\Http\Middleware;

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
        if (!in_array($locale, ['ja', 'en'])) {
            $fallback = session('locale') ?: config('app.fallbacklocale');
            $this->setLocale($fallback);
            abort(Response::HTTP_NOT_FOUND);
        }

        $this->setLocale($locale);
        return $next($request);
    }

    /**
     * ロケール設定
     */
    private function setLocale(string $locale): void
    {
        app()->setLocale($locale);
        session(['locale' => $locale]);
    }
}
