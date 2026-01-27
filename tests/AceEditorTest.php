<?php

use Iperamuna\FilamentAceEditor\AceEditor;

it('can perform fluent configuration', function () {
    $component = AceEditor::make('code')
        ->mode('json')
        ->theme('dracula')
        ->minLines(20)
        ->maxLines(100)
        ->toggleable(false)
        ->defaultReadOnly(false)
        ->options(['fontSize' => '14px'])
        ->extensions(['searchbox'])
        ->addExtension('language_tools');

    expect($component->getMode())->toBe('json')
        ->and($component->getTheme())->toBe('dracula')
        ->and($component->getMinLines())->toBe(20)
        ->and($component->getMaxLines())->toBe(100)
        ->and($component->getIsToggleable())->toBeFalse()
        ->and($component->isDefaultReadOnly())->toBeFalse()
        ->and($component->getOptions())->toBe(['fontSize' => '14px'])
        ->and($component->getExtensions())->toContain('searchbox', 'language_tools');
});

it('has correct default values', function () {
    $component = AceEditor::make('code');

    expect($component->getMode())->toBe('sh')
        ->and($component->getTheme())->toBe('monokai')
        ->and($component->getMinLines())->toBe(15)
        ->and($component->getMaxLines())->toBe(50)
        ->and($component->getIsToggleable())->toBeTrue()
        ->and($component->isDefaultReadOnly())->toBeTrue()
        ->and($component->getOptions())->toBeArray()
        ->and($component->getExtensions())->toBeArray();
});

it('can evaluate closures for toggleable and defaultReadOnly', function () {
    $component = AceEditor::make('code')
        ->toggleable(fn() => false)
        ->defaultReadOnly(fn() => false);

    expect($component->getIsToggleable())->toBeFalse()
        ->and($component->isDefaultReadOnly())->toBeFalse();

    $component2 = AceEditor::make('code')
        ->toggleable(fn() => true)
        ->defaultReadOnly(fn() => true);

    expect($component2->getIsToggleable())->toBeTrue()
        ->and($component2->isDefaultReadOnly())->toBeTrue();
});
