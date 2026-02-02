<?php

namespace Iperamuna\FilamentAceEditor;

use Filament\Infolists\Components\Entry;

class AceEditorEntry extends Entry
{
    protected string $view = 'filament-ace-editor::ace-editor-entry';

    protected string $mode = 'sh';

    protected string $theme = 'monokai';

    protected int $minLines = 15;

    protected int $maxLines = 50;

    protected array $options = [];

    protected array $extensions = [];

    public function mode(string $mode): static
    {
        $this->mode = $mode;

        return $this;
    }

    public function options(array $options): static
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    public function extensions(array $extensions): static
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function addExtension(string $extension): static
    {
        if (! in_array($extension, $this->extensions)) {
            $this->extensions[] = $extension;
        }

        return $this;
    }

    public function theme(string $theme): static
    {
        $this->theme = $theme;

        return $this;
    }

    public function minLines(int $lines): static
    {
        $this->minLines = $lines;

        return $this;
    }

    public function maxLines(int $lines): static
    {
        $this->maxLines = $lines;

        return $this;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function getMinLines(): int
    {
        return $this->minLines;
    }

    public function getMaxLines(): int
    {
        return $this->maxLines;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getExtensions(): array
    {
        return array_unique($this->extensions);
    }
}
