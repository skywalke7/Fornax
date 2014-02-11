#!/usr/bin/python
import os

class Logger():
    PATH_FILE_LOG = ''

    def __init__(self, path = "dgc_trace.log"):
        self.__validatePath(path)
        Logger.PATH_FILE_LOG = path

    @staticmethod
    def write(message):
        log = open(Logger.PATH_FILE_LOG, "a+")
        log.write(message)

    def __createFile(self, path):
        try:
            logFile = open(path, "a+")
            if logFile:
                logFile.close()
                print("log file created - " + path)
        except IOError:
            print("error creating log file")

    def __validatePath(self, path):
        array = path.split("/")
        size = len(array)
        nameLog = array[size - 1]
        fullPath = path[0 : (len(path) - len(nameLog))]
        if len(nameLog) > 0:
            if ".log" in nameLog:
                if len(fullPath) > 0:
                    if not os.path.exists(fullPath):
                        print("the specified path is incorrect")
                    else:
                        self.__createFile(path)
                else:
                    self.__createFile(path)
            else:
                print("the log name is incorrect")
        else:
            print("was not especified a valid log file")
