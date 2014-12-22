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

curalma.execute('SELECT tCodigoProveedor, tRazonSocial, tRazonComercial, \
    tIndicadorTributario FROM TProveedor')

conxguia = MySQLdb.connect('localhost', 'guiaprecios', 'prat38', 'guiaprecios')

curguia = conxguia.cursor()

for row in curalma:
    print row['tCodigoProveedor']
    print row['tRazonComercial']

    razonsocial = str(MySQLdb.escape_string(row['tRazonSocial']))

    if row['tRazonComercial'] == None:
        razoncomercial = ""
    else:
        razoncomercial = MySQLdb.escape_string(row['tRazonComercial'])

    query = "INSERT INTO proveedores_sistemas(id_proveedor_sistema, \
        razon_social, razon_comercial, ruc) \
        VALUES('%s', '%s', '%s', '%s')" %(row['tCodigoProveedor'], \
        razonsocial, razoncomercial, row['tIndicadorTributario'])
    curguia.execute(query)

conxguia.commit()

conxinfo.close()
conxguia.close()
