<?php

return [
    'base_url' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.7',
    'file' => 'ace.min.js',

    'editor_config' => [
        'useWorker' => false,
    ],

    'editor_options' => [
        'mode' => 'ace/mode/php',
        'theme' => 'ace/theme/monokai',
        'enableBasicAutocompletion' => true,
        'enableLiveAutocompletion' => true,
        'liveAutocompletionDelay' => 0,
        'liveAutocompletionThreshold' => 0,
        'enableSnippets' => true,
        'enableInlineAutocompletion' => true,
        'showPrintMargin' => false,
        'wrap' => 'off',
        'animatedScroll' => false,
        'fadeFoldWidgets' => false,
        'displayIndentGuides' => false,
        'highlightGutterLine' => false,
        'showInvisibles' => false,
    ],

    'dark_mode' => [
        'enable' => true,
        'theme' => 'ace/theme/dracula',
    ],

    'enabled_extensions' => [
        'beautify',
        'language_tools',
        'inline_autocomplete',
        'rtl',
        'statusbar',
        'whitespace',
        'searchbox',
    ],
];
