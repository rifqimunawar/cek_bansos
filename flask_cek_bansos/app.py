from flask import Flask, request, jsonify
from datetime import datetime

app = Flask(__name__)

@app.route('/cek_bansos', methods=['POST'])
def cek_bansos():
    try:
        data = request.get_json()

        is_hamil = int(data['is_hamil'])
        pendidikan = int(data['pendidikan'])
        tgl_lahir = datetime.strptime(data['tgl_lahir'], '%Y-%m-%d')
        usia = int((datetime.now() - tgl_lahir).days / 365.25)

        # === LOGIKA KONDISIONAL TANPA ML ===
        if is_hamil == 1:
            hasil = "Ya"
        elif usia < 5:   # balita
            hasil = "Ya"
        elif usia > 65:  # lansia
            hasil = "Ya"
        elif pendidikan <= 2:  # pendidikan rendah (misal SD ke bawah)
            hasil = "Ya"
        else:
            hasil = "Tidak"

        return jsonify({
            "bantuan_sosial": hasil,
            "usia": usia
        })

    except Exception as e:
        return jsonify({"error": str(e)}), 400


@app.route('/')
def hello_world():
    return '✅ Flask Conditional API for Bansos is running!'


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000, debug=True)
