<?php

namespace Iperamuna\FilamentAceEditor;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAceEditorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-ace-editor')
            ->hasConfigFile()
            ->hasViews();
    }
}
