@php
    $statePath = $getStatePath();
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div style="min-height: {{ $getHeight() }}; border-radius: 0.5rem; overflow: hidden; border: 1px solid #d1d5db; position: relative;"
        x-data="{
            state: $wire.$entangle('{{ $statePath }}'),
            editor: null,
            isReadOnly: {{ $isDefaultReadOnly() ? 'true' : 'false' }},
            init() {
                if (window.ace) {
                    this.loadEditor();
                    return;
                }

                let script = document.getElementById('ace-script-loader');

                if (!script) {
                    script = document.createElement('script');
                    script.id = 'ace-script-loader';
                    script.src = '{{ config('filament-ace-editor.base_url') }}/{{ config('filament-ace-editor.file') }}';
                    document.head.appendChild(script);
                }

                if (script.complete) {
                    this.loadEditor();
                } else {
                    script.addEventListener('load', () => {
                        this.loadEditor();
                    });
                }
            },
            loadEditor() {
                this.editor = ace.edit($refs.aceEditor, {
                    maxLines: {{ $getMaxLines() }},
                    minLines: {{ $getMinLines() }},
                    autoScrollEditorIntoView: true,
                    readOnly: this.isReadOnly,
                    ...{{ json_encode(config('filament-ace-editor.editor_options')) }},
                    ...{{ json_encode($getOptions()) }}
                });
                
                this.editor.setTheme('ace/theme/{{ $getTheme() }}');
                this.editor.session.setMode('ace/mode/{{ $getMode() }}');
                
                // Load Enabled Extensions
                let enabledExtensions = {{ json_encode(array_merge(config('filament-ace-editor.enabled_extensions'), $getExtensions())) }};
                
                if (window.ace) {
                    ace.config.set('basePath', '{{ config('filament-ace-editor.base_url') }}');
                    enabledExtensions.forEach(ext => {
                        ace.config.loadModule('ace/ext/' + ext);
                    });
                }
                
                if (this.state) {
                    this.editor.setValue(this.state, -1);
                }

                this.editor.on('change', () => {
                    this.state = this.editor.getValue();
                });

                this.$watch('state', (value) => {
                    if (this.editor.getValue() !== value) {
                        this.editor.setValue(value || '', -1);
                    }
                });

                this.$watch('isReadOnly', (value) => {
                    this.editor.setReadOnly(value);
                    if (!value) {
                         this.editor.focus();
                    }
                });
            },
            toggleEdit() {
                this.isReadOnly = !this.isReadOnly;
            }
        }" wire:ignore {{ $getExtraAttributeBag() }}>

        @if($getIsToggleable())
            <button type="button" x-on:click="toggleEdit()" x-text="isReadOnly ? 'Edit' : 'Done'"
                class="absolute top-2 right-4 z-10 px-3 py-1 text-xs font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700 opacity-80 hover:opacity-100 transition"
                style="right: 25px; top: 5px;">
            </button>
        @endif

        <div x-ref="aceEditor" style="width: 100%;"></div>
    </div>
</x-dynamic-component>