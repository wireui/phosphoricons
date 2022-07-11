#!/bin/bash

# Required libs
# libxml - https://man.archlinux.org/man/libxml.3.en
# curl
# unzip

# make a clean state
rm -rf .tmp
rm -rf src/views/icons/{thin,light,fill,regular,duotone,bold}
mkdir -p src/views/icons/{thin,light,fill,regular,duotone,bold}

# prepare icons
curl https://phosphoricons.com/assets/phosphor-icons.zip --create-dirs -o .tmp/icons.zip
unzip .tmp/icons.zip -d .tmp/icons

for FILE in .tmp/icons/SVGs/{Thin,Light,Fill,Regular,Duotone,Bold}/*.svg; do
    sed -i 's/stroke="#000"/stroke="currentColor"/g' $FILE;
    sed -i 's/<svg/<svg {{ $attributes }} fill="currentColor"/g' $FILE;
    NEW_FILE="$(echo $FILE | sed 's/-thin.svg//;s/-light.svg//;s/-fill.svg//;s/-duotone.svg//;s/-bold.svg//;s/.svg//g')"
    NEW_FILE="$NEW_FILE.blade.php"
    mv $FILE $NEW_FILE;
    echo $NEW_FILE
done

mv .tmp/icons/SVGs/Thin/* src/views/icons/thin
mv .tmp/icons/SVGs/Light/* src/views/icons/light
mv .tmp/icons/SVGs/Fill/* src/views/icons/fill
mv .tmp/icons/SVGs/Regular/* src/views/icons/regular
mv .tmp/icons/SVGs/Duotone/* src/views/icons/duotone
mv .tmp/icons/SVGs/Bold/* src/views/icons/bold
rm -rf .tmp
