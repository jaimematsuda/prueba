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

conxguia = MySQLdb.connect('localhost', 'guiaprecios', 'prat38', 'guiaprecios')

curguia = conxguia.cursor()

query = "SELECT id_articulo_sistema FROM articulos_sistemas ORDER BY \
    id_articulo_sistema DESC LIMIT 1"

curguia.execute(query)

for row in curguia:
    idcodigo = row[0]

query = "SELECT tCodigoProducto, tCodigoSubFamilia, tResumido, \
    tDetallado, tUnidadEntrada FROM TPRODUCTO \
    WHERE tCodigoProducto > '%s'" %idcodigo

curalma.execute(query)

for row in curalma:
    print row['tDetallado']
"""
    if row['tCodigoSubFamilia'] == None:
        idsubfamilia = "1203"
    else:
        idsubfamilia = row['tCodigoSubFamilia']

    query = "INSERT INTO articulos_sistemas(id_articulo_sistema, \
        id_articulo_sub_familia, detallado, resumido, id_unidad) \
        VALUES('%s', '%s', '%s', '%s', '%s')" %(row['tCodigoProducto'], \
        idsubfamilia, row['tDetallado'], row['tResumido'], row['tUnidadEntrada'])

    curguia.execute(query)
    
conxguia.commit()
"""
conxinfo.close()
conxguia.close()
