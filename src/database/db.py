import psycopg2
from psycopg2 import DatabaseError
from decouple import config

def get_connection():
    try:
        return psycopg2.connect(
            host=config('PGSQL_HOST'),
            user=config('PGSQÑ_USER'),
            password=config('PGSQÑ_PASSWORD'),
            database=config('PGSQÑ_DATABASE')
        )
    except DatabaseError as ex:
        raise ex