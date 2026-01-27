# Changelog

All notable changes to `filament-ace-editor` will be documented in this file.

## v1.1.0 - 2026-01-28

### Added
- Support for `Closures` in `toggleable()` and `defaultReadOnly()` configuration methods. This allows for dynamic behavior based on the page context (e.g., editable on Create, read-only on Edit).

### Changed
- Improved toggle button UI and visibility with higher z-index (z-50) and better contrast.
- Updated `AceEditorTest` with closure evaluation scenarios.

## v1.0.0 - 2026-01-28

### Added
- Initial release of the package.
- `AceEditor` Form Component with fluent configuration API.
- `AceEditorEntry` Infolist Entry Component for read-only display.
- Search and Replace functionality via `searchbox` extension.
- Configurable themes, modes, and editor options.
- Dark mode support using Ace themes.
- Comprehensive test suite using Pest.
