from flask import Flask, request, jsonify
from datetime import datetime
import pandas as pd
from sklearn.tree import DecisionTreeClassifier
import numpy as np

app = Flask(__name__)

def create_decision_tree_model():
    training_data = []
    labels = []
    np.random.seed(42)

    for _ in range(50):
        is_hamil = 1
        usia = np.random.randint(15, 45)
        pendidikan = np.random.randint(1, 6)
        training_data.append([is_hamil, usia, pendidikan])
        labels.append(1)

    for _ in range(50):
        is_hamil = 0
        usia = np.random.randint(0, 5)
        pendidikan = 0
        training_data.append([is_hamil, usia, pendidikan])
        labels.append(1)

    for _ in range(50):
        is_hamil = 0
        usia = np.random.randint(66, 90)
        pendidikan = np.random.randint(1, 6)
        training_data.append([is_hamil, usia, pendidikan])
        labels.append(1)

    for _ in range(50):
        is_hamil = 0
        usia = np.random.randint(18, 65)
        pendidikan = np.random.randint(1, 3)
        training_data.append([is_hamil, usia, pendidikan])
        labels.append(1)

    for _ in range(100):
        is_hamil = 0
        usia = np.random.randint(18, 65)
        pendidikan = np.random.randint(3, 6)
        training_data.append([is_hamil, usia, pendidikan])
        labels.append(0)

    X = np.array(training_data)
    y = np.array(labels)

    model = DecisionTreeClassifier(
        criterion='gini',
        max_depth=5,
        min_samples_split=10,
        min_samples_leaf=5,
        random_state=42
    )
    model.fit(X, y)
    return model

decision_tree_model = create_decision_tree_model()

@app.route('/cek_bansos', methods=['POST'])
def cek_bansos():
    try:
        data = request.get_json()
        is_hamil = int(data['is_hamil'])
        pendidikan = int(data['pendidikan'])
        tgl_lahir = datetime.strptime(data['tgl_lahir'], '%Y-%m-%d')
        usia = int((datetime.now() - tgl_lahir).days / 365.25)
        features = np.array([[is_hamil, usia, pendidikan]])
        prediksi = decision_tree_model.predict(features)[0]
        probabilitas = decision_tree_model.predict_proba(features)[0]
        hasil = "Ya" if prediksi == 1 else "Tidak"
        confidence = max(probabilitas)

        return jsonify({
            "bantuan_sosial": hasil,
            "usia": usia,
            "confidence": round(confidence * 100, 2),
            "probabilitas_ya": round(probabilitas[1] * 100, 2),
            "probabilitas_tidak": round(probabilitas[0] * 100, 2),
            "metode": "Decision Tree"
        })
    except Exception as e:
        return jsonify({"error": str(e)}), 400

@app.route('/cek_bansos_manual', methods=['POST'])
def cek_bansos_manual():
    try:
        data = request.get_json()
        is_hamil = int(data['is_hamil'])
        pendidikan = int(data['pendidikan'])
        tgl_lahir = datetime.strptime(data['tgl_lahir'], '%Y-%m-%d')
        usia = int((datetime.now() - tgl_lahir).days / 365.25)

        if is_hamil == 1:
            hasil = "Ya"
        elif usia < 5:
            hasil = "Ya"
        elif usia > 65:
            hasil = "Ya"
        elif pendidikan <= 2:
            hasil = "Ya"
        else:
            hasil = "Tidak"

        return jsonify({
            "bantuan_sosial": hasil,
            "usia": usia,
            "metode": "Kondisional Manual"
        })
    except Exception as e:
        return jsonify({"error": str(e)}), 400

@app.route('/model_info', methods=['GET'])
def model_info():
    try:
        feature_names = ['is_hamil', 'usia', 'pendidikan']
        feature_importance = decision_tree_model.feature_importances_
        importance_dict = {}
        for i, feature in enumerate(feature_names):
            importance_dict[feature] = round(feature_importance[i], 4)

        return jsonify({
            "model_type": "DecisionTreeClassifier",
            "max_depth": decision_tree_model.max_depth,
            "n_features": decision_tree_model.n_features_in_,
            "n_classes": decision_tree_model.n_classes_,
            "feature_importance": importance_dict,
            "tree_depth": decision_tree_model.tree_.max_depth,
            "n_nodes": decision_tree_model.tree_.node_count,
            "n_leaves": decision_tree_model.tree_.n_leaves
        })
    except Exception as e:
        return jsonify({"error": str(e)}), 400

@app.route('/test_comparison', methods=['GET'])
def test_comparison():
    try:
        test_cases = [
            {"is_hamil": 1, "tgl_lahir": "1990-01-01", "pendidikan": 3},
            {"is_hamil": 0, "tgl_lahir": "2022-01-01", "pendidikan": 0},
            {"is_hamil": 0, "tgl_lahir": "1950-01-01", "pendidikan": 4},
            {"is_hamil": 0, "tgl_lahir": "1990-01-01", "pendidikan": 2},
            {"is_hamil": 0, "tgl_lahir": "1990-01-01", "pendidikan": 5},
        ]
        results = []
        for i, case in enumerate(test_cases):
            usia = int((datetime.now() - datetime.strptime(case['tgl_lahir'], '%Y-%m-%d')).days / 365.25)
            features = np.array([[case['is_hamil'], usia, case['pendidikan']]])
            dt_prediksi = decision_tree_model.predict(features)[0]
            dt_hasil = "Ya" if dt_prediksi == 1 else "Tidak"
            dt_prob = decision_tree_model.predict_proba(features)[0][1]

            if case['is_hamil'] == 1:
                manual_hasil = "Ya"
            elif usia < 5:
                manual_hasil = "Ya"
            elif usia > 65:
                manual_hasil = "Ya"
            elif case['pendidikan'] <= 2:
                manual_hasil = "Ya"
            else:
                manual_hasil = "Tidak"

            results.append({
                "case": i + 1,
                "input": case,
                "usia": usia,
                "decision_tree": dt_hasil,
                "dt_probability": round(dt_prob * 100, 2),
                "manual_conditional": manual_hasil,
                "match": dt_hasil == manual_hasil
            })

        return jsonify({
            "test_results": results,
            "accuracy": sum([r["match"] for r in results]) / len(results) * 100
        })
    except Exception as e:
        return jsonify({"error": str(e)}), 400

@app.route('/')
def hello_world():
    return '''
    ✅ Hello world from flask cek_bansos with Decision Tree!<br><br>
    Available endpoints:<br>
    - POST /cek_bansos (Decision Tree)<br>
    - POST /cek_bansos_manual (Conditional)<br>
    '''

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000, debug=True)
