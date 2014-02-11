#!/usr/bin/python
from logger import Logger as log

class CommandCreationException(Exception):
    def __init__(self,message):
        log.write(message)
