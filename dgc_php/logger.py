#!/usr/bin/python

class Logger():
    def __init__(self, path = "dgc_trace.log"):
        self.__createFile(path)

    @staticmethod
    def write(message):
        print(message)

    def __createFile(self, path):
        try:
            self.__validatePath(path)
            open(path, "wb")
        except IOError:
            print("error creating log file")

    def __validatePath(self, path):
        pass

