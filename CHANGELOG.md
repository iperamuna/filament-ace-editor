# Changelog

All notable changes to `filament-ace-editor` will be documented in this file.

## v1.2.0 - 2026-02-02

### Changed
- **BREAKING**: Updated minimum PHP requirement from 8.1 to 8.2
- **BREAKING**: Updated minimum Laravel requirement to 12.x (from 10.x/11.x/12.x)
- **BREAKING**: Restricted Filament support to v5.x only (removed v3.x and v4.x support)
- Updated dev dependencies to latest versions (Pest v3, Orchestra Testbench v10)

### Added
- Comprehensive README documentation with detailed feature examples
- Professional GitHub package banner with visual demonstration of EDIT and READ-ONLY modes
- Side-by-side comparison artwork showing dual editor states
- Detailed `defaultReadOnly` feature documentation with multiple use-case examples
- Enhanced test suite with 8 additional comprehensive tests (11 total tests, 51 assertions)
- Methods reference table in README for quick lookup
- Categorized language support documentation
- Publishing instructions for views and configuration

### Improved
- README structure and organization following modern Filament plugin standards
- Code examples demonstrating real-world usage patterns
- Feature documentation with emoji indicators for better readability
- Test coverage for modes, themes, extensions, and configuration options

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
