import os
import sqlite3
from flask import Flask, g
from flask import jsonify


app = Flask(__name__)

# Path ke file database di luar folder aplikasi
BASE_DIR = os.path.abspath(os.path.dirname(__file__))
DB_PATH = os.path.join(BASE_DIR, '..', 'database', 'database.sqlite')

def get_db():
    if 'db' not in g:
        g.db = sqlite3.connect(DB_PATH)
    return g.db

@app.teardown_appcontext
def close_db(error):
    db = g.pop('db', None)
    if db is not None:
        db.close()

# @app.route('/')
# def hello():
#     db = get_db()
#     cursor = db.cursor()
#     cursor.execute("SELECT name FROM sqlite_master WHERE type='table'")
#     tables = cursor.fetchall()
#     return f"Tables in DB: {tables}"

@app.route('/users')
def list_users():
    db = get_db()
    cursor = db.cursor()
    cursor.execute("SELECT * FROM users")
    rows = cursor.fetchall()
    result = [{'id': row[0], 'nama': row[1]} for row in rows]
    return jsonify(result)


if __name__ == '__main__':
    app.run(debug=True)
