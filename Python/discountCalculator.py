import http
from flask import Flask
app = Flask(__name__)

@app.route("/api/discountCalculator/<totalPrice>")
http://127.0.0.1:8080/api/discountCalculator/4000

def calDiscount(originalPrice):
    if originalPrice >= 3000:
        discountPrice = originalPrice * 0.97
        return discountPrice
    elif originalPrice >= 5000:
        discountPrice = originalPrice * 0.92
        return discountPrice
    elif originalPrice >= 10000:
        discountPrice = originalPrice * 0.88
        return discountPrice
    else:
        return originalPrice
        