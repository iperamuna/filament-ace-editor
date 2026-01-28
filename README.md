# Filament Ace Editor (Supporting Filament v5)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/iperamuna/filament-ace-editor.svg?style=flat-square)](https://packagist.org/packages/iperamuna/filament-ace-editor)
[![Total Downloads](https://img.shields.io/packagist/dt/iperamuna/filament-ace-editor.svg?style=flat-square)](https://packagist.org/packages/iperamuna/filament-ace-editor)

A powerful Ace Editor implementation for Filament Forms and Infolists.

## Installation

You can install the package via composer:

```bash
composer require iperamuna/filament-ace-editor
```

### Configuration

Publish the configuration file to customize defaults:

```bash
php artisan vendor:publish --tag="filament-ace-editor-config"
```

You can now configure defaults in `config/filament-ace-editor.php`:

```php
return [
    'base_url' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.7',
    'editor_options' => [
        'enableBasicAutocompletion' => true,
        'enableLiveAutocompletion' => true,
        'enableSnippets' => true,
        // ...
    ],
    'enabled_extensions' => [
        'language_tools',
        'beautify',
    ],
];
```

### Form Component

```php
use Iperamuna\FilamentAceEditor\AceEditor;

AceEditor::make('content')
    ->label('Shell Script')
    ->mode('sh') // Default: sh
    ->theme('monokai') // Default: monokai
    ->minLines(15)
    ->maxLines(50)
    // Toggleable Edit mode (defaults to true)
    ->toggleable(true) 
    // Initial state (defaults to true, meaning read-only initially)
    ->defaultReadOnly(true)
    // Add specific extensions
    ->addExtension('searchbox')
    // Override specific editor options
    ->options([
        'tabSize' => 2,
        'showPrintMargin' => false,
    ]); 
```

### Infolist Entry

```php
use Iperamuna\FilamentAceEditor\AceEditorEntry;

AceEditorEntry::make('content')
    ->label('Script Content')
    ->mode('sh')
    ->theme('monokai')
    ->minLines(15)
    ->maxLines(50);
```

## Supported Languages

Ace Editor supports over 100 languages. Common modes include:
- `php`
- `javascript` / `json`
- `html` / `css`
- `mysql`
- `sh` (Shell)
- `python`
- `markdown`

See the [Ace Editor documentation](https://ace.c9.io/) for a full list.

## Credits

- [Indunil Peramuna](https://iperamuna.online)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
