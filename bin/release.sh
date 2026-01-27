#!/bin/bash

# Ensure we are in the package root
if [ ! -f "composer.json" ]; then
    echo "Error: Please run this script from the package root directory."
    exit 1
fi

# Function to extract version from CHANGELOG.md
get_latest_version() {
    grep -m 1 "^## v" CHANGELOG.md | awk '{print $2}' | sed 's/v//'
}

VERSION=$(get_latest_version)

if [ -z "$VERSION" ]; then
    echo "Error: Could not detect version from CHANGELOG.md"
    exit 1
fi

TAG="v$VERSION"

# Check if tag already exists
if git rev-parse "$TAG" >/dev/null 2>&1; then
    echo "Error: Tag $TAG already exists."
    exit 1
fi

echo "Preparing release $TAG..."

# Run tests
echo "Running tests..."
vendor/bin/pest
if [ $? -ne 0 ]; then
    echo "Tests failed. Aborting release."
    exit 1
fi

# Commit changes
echo "Committing release..."
git add .
git commit -m "chore(release): prepare for release $TAG"

# Create tag
echo "Creating tag $TAG..."
git tag -a "$TAG" -m "Release $TAG"

echo "Release $TAG created successfully!"
echo "Push to remote using: git push origin main --tags"
