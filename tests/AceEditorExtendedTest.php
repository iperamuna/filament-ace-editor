<?php

use Iperamuna\FilamentAceEditor\AceEditor;
use Livewire\Component;

it('can set defaultReadOnly based on record existence', function () {
    $livewireMock = new class extends Component
    {
        public $record = null;

        public function getRecord()
        {
            return $this->record;
        }
    };

    // Test with no record (create mode)
    $livewireMock->record = null;
    $component = AceEditor::make('code')
        ->defaultReadOnly(fn ($livewire) => $livewire->getRecord() !== null);

    $isReadOnly = $component->evaluate(
        fn ($livewire) => $livewire->getRecord() !== null,
        ['livewire' => $livewireMock]
    );

    expect($isReadOnly)->toBeFalse();

    // Test with record (edit mode)
    $livewireMock->record = (object) ['id' => 1];
    $isReadOnly = $component->evaluate(
        fn ($livewire) => $livewire->getRecord() !== null,
        ['livewire' => $livewireMock]
    );

    expect($isReadOnly)->toBeTrue();
});

it('supports different modes for various languages', function () {
    $modes = ['php', 'javascript', 'python', 'json', 'yaml', 'mysql', 'sh'];

    foreach ($modes as $mode) {
        $component = AceEditor::make('code')->mode($mode);
        expect($component->getMode())->toBe($mode);
    }
});

it('supports different editor themes', function () {
    $themes = ['monokai', 'github', 'dracula', 'tomorrow', 'twilight'];

    foreach ($themes as $theme) {
        $component = AceEditor::make('code')->theme($theme);
        expect($component->getTheme())->toBe($theme);
    }
});

it('can add multiple extensions', function () {
    $component = AceEditor::make('code')
        ->addExtension('searchbox')
        ->addExtension('beautify')
        ->addExtension('language_tools');

    expect($component->getExtensions())
        ->toBeArray()
        ->toHaveCount(3)
        ->toContain('searchbox', 'beautify', 'language_tools');
});

it('can override editor options', function () {
    $component = AceEditor::make('code')
        ->options([
            'tabSize' => 4,
            'showPrintMargin' => false,
            'enableBasicAutocompletion' => true,
        ]);

    $options = $component->getOptions();

    expect($options)
        ->toBeArray()
        ->toHaveKey('tabSize')
        ->toHaveKey('showPrintMargin')
        ->toHaveKey('enableBasicAutocompletion')
        ->and($options['tabSize'])->toBe(4)
        ->and($options['showPrintMargin'])->toBeFalse()
        ->and($options['enableBasicAutocompletion'])->toBeTrue();
});

it('can set minimum and maximum lines', function () {
    $component = AceEditor::make('code')
        ->minLines(10)
        ->maxLines(100);

    expect($component->getMinLines())->toBe(10)
        ->and($component->getMaxLines())->toBe(100);
});

it('can be made non-toggleable', function () {
    $component = AceEditor::make('code')
        ->toggleable(false);

    expect($component->getIsToggleable())->toBeFalse();
});

it('defaultReadOnly can be disabled completely', function () {
    $component = AceEditor::make('code')
        ->defaultReadOnly(false);

    expect($component->isDefaultReadOnly())->toBeFalse();
});
