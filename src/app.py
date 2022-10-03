from flask import Flask, render_template
from routes import provincias

app=Flask(__name__)

@app.route('/')
def home():
   return render_template('home.html')

def not_found(error):#
    return "<h1>Página no encontrada</h1>",404

if __name__ == '__main__':    
    #blueprints
    app.register_blueprint(provincias.main,url_prefix='/provincias')
    # Error de rutas
    app.register_error_handler(404, not_found)
    app.run(debug=True)

