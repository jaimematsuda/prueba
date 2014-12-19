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

curalma.execute('SELECT tCodigoFamilia, tCodigoSubFamilia, tDetallado, tResumido, tTipoProducto FROM TSUBFAMILIA')

conxguia = MySQLdb.connect('localhost', 'guiaprecios', 'prat38', 'guiaprecios')

curguia = conxguia.cursor()

for row in curalma:
    print row['tDetallado']
    query = "INSERT INTO articulos_sub_familias(id_articulo_sub_familia, \
        id_articulo_familia, detallado, resumido, tipo) \
        VALUES('%s', '%s', '%s', '%s', '%s')" %(row['tCodigoSubFamilia'], \
        row['tCodigoFamilia'], row['tDetallado'], row['tResumido'], row['tTipoProducto'])
    curguia.execute(query)
    
conxguia.commit()

conxinfo.close()
conxguia.close()
