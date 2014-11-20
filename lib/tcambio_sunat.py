#!/usr/bin/env python
# -*- coding: UTF-8 -*-

import urllib2
import re
import MySQLdb

s = urllib2.urlopen("http://www.sunat.gob.pe/cl-at-ittipcam/tcS01Alias").read()
d = re.compile("[0-9].[0-9][0-9][0-9]")
cambio = d.findall(s)

ultimoVenta = len(cambio) - 1
ultimoCompra = ultimoVenta - 1

compra = float(cambio[ultimoCompra])
venta = float(cambio[ultimoVenta])

db_host = 'localhost'
usuario = 'guiaprecios'
clave = 'prat38'
basedato = 'guiaprecios'

conn = MySQLdb.connect(host=db_host, user=usuario, passwd=clave, db=basedato)
cursor = conn.cursor()
cursor.execute('UPDATE tcambio_sunat SET cambio_compra=%f, cambio_venta=%f WHERE id_tcambio_sunat=1' %(compra, venta))
conn.commit()
cursor.close()
