#!/usr/bin/python
# -*- coding: UTF-8 -*-

import pdb
import pymssql
import MySQLdb

ip_tienda = '192.168.13.2'

conxinfo = pymssql.connect(
    host=ip_tienda, user='sa', password='sistemas', database='ALMACEN',
    as_dict=True)

curalma = conxinfo.cursor()

curalma.execute("SELECT tCodigo, tDetallado, tResumido FROM TTABLA WHERE tTabla = 'UNIDADMEDIDA'")

conxguia = MySQLdb.connect('localhost', 'guiaprecios', 'prat38', 'guiaprecios')

curguia = conxguia.cursor()

for row in curalma:
    print row['tCodigo']
    query = "INSERT INTO unidades(id_unidad, detallado, resumido) \
        VALUES('%s', '%s', '%s')" %(row['tCodigo'], row['tDetallado'], row['tResumido'])
    curguia.execute(query)
    
conxguia.commit()

conxinfo.close()
conxguia.close()
