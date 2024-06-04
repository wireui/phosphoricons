#!/bin/bash

# Required libs
# libxml - https://man.archlinux.org/man/libxml.3.en
# curl
# unzip

# make a clean state
rm -rf .core
rm -rf src/views/components/{thin,light,fill,regular,duotone,bold}
mkdir -p src/views/components/{thin,light,fill,regular,duotone,bold}

# clone icons core
git clone https://github.com/phosphor-icons/core.git .core

for FILE in .core/assets/{thin,light,fill,regular,duotone,bold}/*.svg; do
    sed -i 's/<svg/<svg {{ $attributes }}/g' "$FILE"

    NEW_FILE="$(echo $FILE | sed 's/-thin.svg//;s/-light.svg//;s/-fill.svg//;s/-duotone.svg//;s/-bold.svg//;s/\.svg//g')"
    NEW_FILE="$NEW_FILE.blade.php"
    mv "$FILE" "$NEW_FILE"
    echo "$NEW_FILE"
done

mv .core/assets/* src/views/components
rm -rf .core
