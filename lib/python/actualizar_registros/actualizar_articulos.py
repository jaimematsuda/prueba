#!/usr/bin/python
# -*- coding: UTF-8 -*-

import pdb
import MySQLdb

ip_tienda = '192.168.13.2'

conxguia = MySQLdb.connect('localhost', 'prueba', 'prueba', 'guiaprecios')

curguia = conxguia.cursor()

query = "SELECT * FROM platos"
curguia.execute(query)

for row in curguia:
    for rs in row:
        print rs

conxguia.close()
