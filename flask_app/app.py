from flask import Flask, request, jsonify
from datetime import datetime
from sklearn.tree import DecisionTreeClassifier
import pandas as pd
import joblib
import os

app = Flask(__name__)

MODEL_PATH = 'decision_tree_bansos.pkl'

# === TRAINING SECTION ===
def train_model():
    # Contoh data
    data = pd.DataFrame({
        'pendapatan': [3000000, 1500000, 1000000, 5000000, 2500000, 1800000, 1900000, 300000,
                      1200000, 1500000, 2500000, 1000000, 2000000, 2500000, 1300000, 900000,
                      1000000, 1800000, 700000, 2000000],
        'usia': [25, 40, 60, 22, 35, 55, 28, 45, 70, 80, 25, 30, 31, 42, 28, 36, 22, 65, 58, 48],
        'status_perkawinan': [2, 3, 4, 1, 2, 3, 1, 4, 2, 3, 2, 1, 4, 3, 2, 1, 3, 4, 1, 2],
        'bantuan_sosial': ['Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya',
                          'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya']
    })

    # Encode target
    data['bantuan_sosial'] = data['bantuan_sosial'].map({'Tidak': 0, 'Ya': 1})

    X = data[['pendapatan', 'usia', 'status_perkawinan']]
    y = data['bantuan_sosial']

    model = DecisionTreeClassifier()
    model.fit(X, y)

    joblib.dump(model, MODEL_PATH)
    print("✅ Model berhasil dilatih dan disimpan!")

# Cek & latih model jika belum ada
if not os.path.exists(MODEL_PATH):
    train_model()

# Load model
model = joblib.load(MODEL_PATH)


# === API SECTION ===
@app.route('/cek_bansos', methods=['POST'])
def cek_bansos():
    try:
        data = request.get_json()

        # Hitung usia dari tanggal lahir
        tgl_lahir = datetime.strptime(data['tgl_lahir'], '%Y-%m-%d')
        usia = int((datetime.now() - tgl_lahir).days / 365.25)

        pendapatan = int(data['pendapatan'])
        status_perkawinan = int(data['status_perkawinan'])

        input_fitur = [[pendapatan, usia, status_perkawinan]]
        prediksi = model.predict(input_fitur)

        return jsonify({
            'bantuan_sosial': 'Ya' if prediksi[0] == 1 else 'Tidak'
        })

    except Exception as e:
        return jsonify({'error': str(e)}), 400


@app.route('/')
def hello_world():
    return 'Hello, World!'

if __name__ == '__main__':
    app.run(debug=True)
