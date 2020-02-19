<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

function plural($name = null, $count = 2)
{
    if ($name instanceof Model || class_exists($name)) {
        return apply($name, [
            'class_basename',
            'str_plural',
            'camel_case',
            "plural:{$count}",
        ]);
    }

    if (str_contains($name, '.')) {
        return trans_choice($name, $count);
    }

    return trans_choice($name.".".str_singular($name), $count);
}

function singular($name = null)
{
    if ($name instanceof Model || class_exists($name)) {
        return apply($name, [
            'class_basename',
            'str_plural',
            'camel_case',
            'singular',
        ]);
    }

    if (str_contains($name, '.')) {
        return trans_choice($name, 1);
    }

    return trans_choice($name.".".str_singular($name), 1);
}

function monthNumbersArray()
{
    $months = array_map('strval', range(1, 12));

    return array_combine($months, $months);
}

function yearNumbersArray()
{
    $years = array_map('strval', range(date('Y'), date('Y') + 20));

    return array_combine($years, $years);
}

function formatCurrency($value)
{
    return number_format($value, 2, '.', ',');
}

function formatInteger($value)
{
    return number_format($value, 0, '.', ',');
}

function formatDate($date)
{
    $date = new Carbon($date);

    return $date->toDateString();
}

function formatTime($date)
{
    $date = new Carbon($date);

    return $date->format('H:i');
}

function demoUser($data = [])
{
    return factory(User::class)->make(array_merge([
        'name' => 'John',
        'surname' => 'Doe',
        'email' => 'john.doe@example.org',
    ], $data));
}

function currentUser()
{
    return auth()->user();
}

function currentAgent()
{
    return auth()->user()->agent;
}

function currentClient()
{
    return auth()->user()->client;
}

function previousUrl($route = null, $parameters = [])
{
    $currentRoute = Route::currentRouteName();
    $routeCandidate = array_get(session('refererIndex', []), $route, route($route, $parameters));
    $url = $route ? $routeCandidate : url('/');

    switch (true) {
        case str_contains($currentRoute, 'create'):
        case str_contains($currentRoute, 'edit'):
        case str_contains($currentRoute, 'show'):
            return $url;
        default:
            return url()->previous() == url()->current() ? $url : url()->previous();
    }
}

function indexRoute($route = null, $parameters = [])
{
    return array_get(session('refererIndex', []), $route, route($route, $parameters));
}

function fixNumber($value)
{
    return number_format($value, 2, '.', '');
}

function calculateRoundAmount($amount)
{
    $fraction = fixNumber($amount - (int) $amount);

    if ($fraction > 0.50) {
        return 1 - $fraction;
    }

    return -1 * $fraction;
}

function str_ascii($value, $language = 'en')
{
    return Str::ascii($value, $language);
}

function str_variable_name($value, $delimiter = '_')
{
    return snake_case(str_ascii($value), $delimiter);
}

function str_kebab_name($value)
{
    return kebab_case(str_ascii($value));
}

function str_upper($value)
{
    return Str::upper($value);
}

function apply($value, array $callbacks = [])
{
    foreach ($callbacks as $callback) {
        $parameters = [$value];

        if (str_contains($callback, ':')) {
            $parameters = array_merge($parameters, explode(',', str_after($callback, ':')));
            $callback = str_before($callback, ':');
        }

        $value = call_user_func_array($callback, $parameters);
    }

    return $value;
}

/**
 * Validate some data.
 *
 * @param string|array $fields
 * @param string|array $rules
 *
 * @return bool
 */
function validate($fields, $rules): bool
{
    if (!is_array($fields)) {
        $fields = ['default' => $fields];
    }

    if (!is_array($rules)) {
        $rules = ['default' => $rules];
    }

    return Validator::make($fields, $rules)->passes();
}

/**
 * Shortens a string in a pretty way. It will clean it by trimming
 * it, remove all double spaces and html. If the string is then still
 * longer than the specified $length it will be shortened. The end
 * of the string is always a full word concatenated with the
 * specified moreTextIndicator.
 *
 * @param string $string
 * @param int    $length
 * @param string $moreTextIndicator
 *
 * @return string
 */
function str_tease(string $string, int $length = 200, string $moreTextIndicator = '...'): string
{
    $string = trim($string);

    //remove html
    $string = strip_tags($string);

    //replace multiple spaces
    $string = preg_replace("/\s+/", ' ', $string);

    if (strlen($string) == 0) {
        return '';
    }

    if (strlen($string) <= $length) {
        return $string;
    }

    $ww = wordwrap($string, $length, "\n");

    $string = substr($ww, 0, strpos($ww, "\n")).$moreTextIndicator;

    return $string;
}

/**
 * Generates a path relative to the root of the specified disk.
 *
 * @param  string  $fileName
 * @param  string  $disk
 *
 * @return string
 */
function diskPath($fileName = '', $disk = null)
{
    return Storage::disk($disk ?: config('filesystems.default'))->getAdapter()->applyPathPrefix($fileName);
}

function str_clean($value, $normalizeCharacters = false)
{
    $value = trim(Str::lower($value));

    if ($normalizeCharacters) {
        return str_ascii($value);
    }

    return $value;
}

function splitWhiteSpaces($value, $cleanString = true)
{
    if ($cleanString) {
        $value = str_clean($value);
    }

    return array_filter(preg_split('/\s+/', $value));
}

function array_key_mirror($array)
{
    return array_combine($array, $array);
}
