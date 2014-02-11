#!/usr/bin/python

import os.path
from commandcreationexception import CommandCreationException
import argparse
from logger import Logger

class ArgumentLogger():
    def __init__(self):
       self.__parseArgument()

    def __parseArgument(self):
        parser = argparse.ArgumentParser()
        parser.add_argument("-lg [boolean]", "--logger", help="flag to specified the activation file log, default value is false", 
                            type=bool, default=False)
        parser.add_argument("-p [path]", "--path", help="path log file store, current directory is default location", type=str)
        args = parser.parse_args()
        if args.logger:
            if args.path:
                Logger(args.path)
            else:
                Logger()
           
#Create file
ArgumentLogger()
path = "/usr/bin/dgc"
try:
    op = open(path, "wb")
except IOError:
    if not os.path.isfile(path):
        try:
            raise CommandCreationException("could not create command. Permission denied.")
        except CommandCreationException:
            pass

