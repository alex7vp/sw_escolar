from flask import Blueprint, jsonify, render_template, Flask, request, redirect, url_for, flash
import psycopg2 #pip install psycopg2 
import psycopg2.extras
from psycopg2 import DatabaseError

main=Blueprint('provincia_blueprint',__name__)

DB_HOST = "localhost"
DB_NAME = "Sw_Prueba"
DB_USER = "postgres"
DB_PASS = "root"


@main.route('/')
def get_provincia():    
    #conexion = psycopg2.connect("dbname=SW_Pruebas user=postgres password=root")
    try:
        #database="Sw_Prueba", user="postgres", password="root") 
        conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS, host=DB_HOST)
        cur = conn.cursor()
        cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
        s = "SELECT * FROM provincias"
        cur.execute(s) # Execute the SQL
        list_provincias = cur.fetchall()
        conn.close()
        #return list_provincias
        return render_template('provincias.html', list_provincias = list_provincias)
    except DatabaseError as ex:
        return 'Conexion Fallida'
