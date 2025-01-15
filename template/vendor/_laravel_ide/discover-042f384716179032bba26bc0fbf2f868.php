<?php


error_reporting(E_ERROR | E_PARSE);

define('LARAVEL_START', microtime(true));

require_once __DIR__ . '/../autoload.php';
$app = require_once __DIR__ . '/../../bootstrap/app.php';

class VsCodeLaravel extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        if (method_exists($this->app['log'], 'setHandlers')) {
            $this->app['log']->setHandlers([new \Monolog\Handler\ProcessHandler()]);
        }
    }
}

function vsCodeToRelativePath($path)
{
    return ltrim(str_replace(base_path(), '', realpath($path)), DIRECTORY_SEPARATOR);
}

$app->register(new VsCodeLaravel($app));
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo '__VSCODE_LARAVEL_START_OUTPUT__';

function vsCodeGetTranslationsFromFile($file, $path, $namespace)
{
  $key = pathinfo($file, PATHINFO_FILENAME);

  if ($namespace) {
    $key = "{$namespace}::{$key}";
  }

  $lang = collect(explode(DIRECTORY_SEPARATOR, str_replace($path, "", $file)))
    ->filter()
    ->first();

  $fileLines = \Illuminate\Support\Facades\File::lines($file);
  $lines = [];
  $inComment = false;

  foreach ($fileLines as $index => $line) {
    $trimmed = trim($line);

    if (substr($trimmed, 0, 2) === "/*") {
      $inComment = true;
      continue;
    }

    if ($inComment) {
      if (substr($trimmed, -2) !== "*/") {
        continue;
      }

      $inComment = false;
    }

    if (substr($trimmed, 0, 2) === "//") {
      continue;
    }

    $lines[] = [$index + 1, $trimmed];
  }

  return [
    "k" => $key,
    "la" => $lang,
    "vs" => collect(\Illuminate\Support\Arr::dot((\Illuminate\Support\Arr::wrap(__($key, [], $lang)))))
      ->map(
        fn($value, $key) => vsCodeTranslationValue(
          $key,
          $value,
          str_replace(base_path(DIRECTORY_SEPARATOR), "", $file),
          $lines
        )
      )
      ->filter()
  ];
}

function vsCodeTranslationValue($key, $value, $file, $lines): ?array
{
  if (is_array($value)) {
    return null;
  }

  $lineNumber = 1;
  $keys = explode(".", $key);
  $index = 0;
  $currentKey = array_shift($keys);

  foreach ($lines as $index => $line) {
    if (
      strpos($line[1], '"' . $currentKey . '"', 0) !== false ||
      strpos($line[1], "'" . $currentKey . "'", 0) !== false
    ) {
      $lineNumber = $line[0];
      $currentKey = array_shift($keys);
    }

    if ($currentKey === null) {
      break;
    }
  }

  return [
    "v" => $value,
    "p" => $file,
    "li" => $lineNumber,
    "pa" => preg_match_all("/\:([A-Za-z0-9_]+)/", $value, $matches)
      ? $matches[1]
      : []
  ];
}

function vscodeCollectTranslations(string $path, ?string $namespace = null)
{
    $realPath = realpath($path);

    if (!is_dir($realPath)) {
        return collect();
    }

    return collect(\Illuminate\Support\Facades\File::allFiles($realPath))->map(
        fn($file) => vsCodeGetTranslationsFromFile($file, $path, $namespace)
    );
}

$loader = app("translator")->getLoader();
$namespaces = $loader->namespaces();

$reflection = new ReflectionClass($loader);
$property = null;

if ($reflection->hasProperty("paths")) {
    $property = $reflection->getProperty("paths");
} else if ($reflection->hasProperty("path")) {
    $property = $reflection->getProperty("path");
}

if ($property !== null) {
    $property->setAccessible(true);
    $paths = \Illuminate\Support\Arr::wrap($property->getValue($loader));
} else {
    $paths = [];
}

$default = collect($paths)->flatMap(
  fn($path) => vscodeCollectTranslations($path)
);

$namespaced = collect($namespaces)->flatMap(
  fn($path, $namespace) => vscodeCollectTranslations($path, $namespace)
);

$final = [];

foreach ($default->merge($namespaced) as $value) {
  foreach ($value["vs"] as $key => $v) {
    $dotKey = "{$value["k"]}.{$key}";

    if (!isset($final[$dotKey])) {
      $final[$dotKey] = [];
    }

    $final[$dotKey][$value["la"]] = $v;

    if ($value["la"] === \Illuminate\Support\Facades\App::currentLocale()) {
      $final[$dotKey]["default"] = $v;
    }
  }
}

echo json_encode($final);
;
echo '__VSCODE_LARAVEL_END_OUTPUT__';

exit(0);
