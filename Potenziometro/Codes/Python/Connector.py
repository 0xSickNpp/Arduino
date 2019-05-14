from serial import *
from time import sleep, gmtime, strftime
import requests

try:
	serial_port = input("Porta arduino: ")
    Arduino = Serial(serial_port, 9600, timeout=.1) #Inizializzazione
except:
    print "Error! No device on port COM1\n"
    exit(-1) #Se non viene rilevato alcun dispositivo, esce

while 1: #Inizio dell'ascolto sulla porta seriale
    valore_potenziometro = Arduino.readline()
    print "Rilevato valore {0}\n".format(valore_potenziometro)
    params = { #Creando una lista in cui sono contenuti i parametri da inviare alla pagina php
        'valore' : valore_potenziometro,
        'orario' : strftime("%H:%M:%S", gmtime())
    }
    requests.post("http://127.0.0.1/telecomunicazioni/add.php", data=params) #Eseguendo la request verso la pagina php + parametri
    sleep(5) #Pausa di 3 secondi
    
print "Bye bye!"
