#!/bin/bash
# Script to install the php command

NAME_FILE="dgc"
PATH="/usr/bin/$FILE"

python setupconfig.py

if [ ! -f "$PATH" ]
then
    echo "installation error [$NAME_FILE]"
else 
    sudo chmod +x $PATH    
    echo "[$NAME_FILE] configuration ... DONE"
fi
