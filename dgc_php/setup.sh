#!/bin/bash
# Script to install the php command

NAME_FILE="dgc"
PATH="/usr/bin/$FILE"
PATH_INSTALLATION=$(whereis apache2)

# Apache instalation 
#if which apache2 > /dev/null;
#then
#    echo "Apache2 is required for proper operation of dgc_php"
#else
#    echo "$PATH_INSTALLATION"
#fi

if which php > /dev/null;
then
    echo "PHP is required for proper operation of dgc_php. Is recommended to install the version 5.X languaje"
else
    echo "verify that the language version is 5.x"
    php --version
fi

python setupconfig.py -lg true

if [ ! -f "$PATH" ]
then
    echo "installation error [$NAME_FILE] module"
else 
    chmod +x $PATH    
    echo "[$NAME_FILE] configuration... DONE"
fi


