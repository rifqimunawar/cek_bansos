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
    data = pd.DataFrame({
        'is_hamil': [
            1,1,1,1,  # semua hamil → Ya
            0,0,      # balita usia <5 → Ya
            0,0,      # lansia usia >65 → Ya
            0,0,0,0,  # pendidikan rendah (<=2) → Ya
            0,0,0,0,  # usia produktif & pendidikan menengah/tinggi → Tidak
            0,0,0,0
        ],
        'usia': [
            25, 30, 40, 20,   # hamil
            2, 4,             # balita
            70, 80,           # lansia
            35, 50, 28, 45,   # pendidikan rendah
            25, 40, 30, 50,   # produktif tidak miskin
            20, 35, 45, 60
        ],
        'pendidikan': [
            5, 3, 6, 2,   # hamil
            1, 0,         # balita
            3, 4,         # lansia
            0, 1, 2, 2,   # pendidikan rendah
            3, 4, 5, 6,   # pendidikan menengah
            5, 6, 6, 5    # pendidikan tinggi
        ],
        'bantuan_sosial': [
            'Ya','Ya','Ya','Ya',  
            'Ya','Ya',            
            'Ya','Ya',            
            'Ya','Ya','Ya','Ya',  
            'Tidak','Tidak','Tidak','Tidak',
            'Tidak','Tidak','Tidak','Tidak'
        ]
    })

    data['bantuan_sosial'] = data['bantuan_sosial'].map({'Tidak': 0, 'Ya': 1})

    X = data[['is_hamil', 'usia', 'pendidikan']]
    y = data['bantuan_sosial']

    model = DecisionTreeClassifier(max_depth=3, random_state=42)
    model.fit(X, y)

    joblib.dump(model, MODEL_PATH)
    print("✅ Model berhasil dilatih dan disimpan!")


# Latih model jika belum ada
if not os.path.exists(MODEL_PATH):
    train_model()

# Load model
model = joblib.load(MODEL_PATH)


# === API SECTION ===
@app.route('/cek_bansos', methods=['POST'])
def cek_bansos():
    try:
        data = request.get_json()

        is_hamil = int(data['is_hamil'])
        pendidikan = int(data['pendidikan'])
        tgl_lahir = datetime.strptime(data['tgl_lahir'], '%Y-%m-%d')
        usia = int((datetime.now() - tgl_lahir).days / 365.25)

        # Prediksi
        input_fitur = [[is_hamil, usia, pendidikan]]
        prediksi = model.predict(input_fitur)

        hasil = 'Ya' if prediksi[0] == 1 else 'Tidak'

        return jsonify({
            "bantuan_sosial": hasil,
            "usia": usia
        })

    except Exception as e:
        return jsonify({"error": str(e)}), 400


@app.route('/')
def hello_world():
    return '✅ Flask ML API for Bansos is running!'


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000, debug=True)
