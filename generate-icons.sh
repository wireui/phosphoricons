#!/bin/bash

# Required libs
# libxml - https://man.archlinux.org/man/libxml.3.en
# curl
# unzip

# make a clean state
rm -rf .tmp
rm -rf src/views/components/{thin,light,fill,regular,duotone,bold}
mkdir -p src/views/components/{thin,light,fill,regular,duotone,bold}

# prepare icons
curl https://github.com/phosphor-icons/homepage/releases/download/v1.4.0/phosphor-icons.zip --create-dirs --location --output .tmp/icons.zip
unzip .tmp/icons.zip -d .tmp/icons

for FILE in .tmp/icons/SVGs/{Thin,Light,Fill,Regular,Duotone,Bold}/*.svg; do
    sed -i 's/stroke="#000"/stroke="currentColor"/g' $FILE;
    sed -i 's/<svg/<svg {{ $attributes }} fill="currentColor"/g' $FILE;
    NEW_FILE="$(echo $FILE | sed 's/-thin.svg//;s/-light.svg//;s/-fill.svg//;s/-duotone.svg//;s/-bold.svg//;s/.svg//g')"
    NEW_FILE="$NEW_FILE.blade.php"
    mv $FILE $NEW_FILE;
    echo $NEW_FILE
done

mv .tmp/icons/SVGs/Thin/* src/views/components/thin
mv .tmp/icons/SVGs/Light/* src/views/components/light
mv .tmp/icons/SVGs/Fill/* src/views/components/fill
mv .tmp/icons/SVGs/Regular/* src/views/components/regular
mv .tmp/icons/SVGs/Duotone/* src/views/components/duotone
mv .tmp/icons/SVGs/Bold/* src/views/components/bold
rm -rf .tmp
