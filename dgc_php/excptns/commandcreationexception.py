#!/usr/bin/python
from config.log.logger import Logger as log

class CommandCreationException(Exception):
    def __init__(self,message):
        log.write(message)
