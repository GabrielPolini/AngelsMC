<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio de Armas</title>
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #111;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #0f0;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }

        .cardapio {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: #222;
            border: 2px solid #0f0;
            border-radius: 10px;
            padding: 15px;
            width: 200px;
            text-align: center;
        }

        .card h3 {
            margin: 0 0 10px 0;
        }

        .card p {
            margin: 5px 0;
        }

        .card button {
            background-color: #0f0;
            border: none;
            color: #000;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
        }

        .card button:hover {
            background-color: #00cc00;
        }

        .carrinho {
            margin-top: 30px;
            background-color: #111;
            border: 2px solid #0f0;
            padding: 15px;
            border-radius: 10px;
        }

        .carrinho h2 {
            margin: 0 0 10px 0;
        }

        .carrinho ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .carrinho ul li {
            margin: 5px 0;
        }

        .carrinho button {
            background-color: #ff0000;
            border: none;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
        }

        .carrinho button:hover {
            background-color: #cc0000;
        }

        .generate-pdf {
            margin-top: 20px;
            background-color: #0f0;
            border: none;
            color: #000;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
        }

        .generate-pdf:hover {
            background-color: #00cc00;
        }

        .add-weapon-form {
            margin-top: 20px;
            background-color: #222;
            border: 2px solid #0f0;
            padding: 15px;
            border-radius: 10px;
        }

        .add-weapon-form input {
            margin: 5px 0;
            padding: 5px;
            font-size: 1em;
            border: 1px solid #0f0;
            border-radius: 5px;
            width: calc(100% - 22px);
        }

        .add-weapon-form button {
            margin-top: 10px;
            background-color: #0f0;
            border: none;
            color: #000;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            width: 100%;
        }

        .add-weapon-form button:hover {
            background-color: #00cc00;
        }

        .back-button {
            margin-top: 20px;
            background-color: #0f0;
            border: none;
            color: #000;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            text-align: center;
        }

        .back-button:hover {
            background-color: #00cc00;
        }
    </style>
</head>
<body>
    <header>
        <h1>Armas</h1>
    </header>
    <div class="container">
        <button class="back-button" onclick="window.location.href='index.php'">Voltar à Página Principal</button>
        <div class="cardapio">
            <!-- Cards de Armas -->
        </div>

        <div class="add-weapon-form">
            <h2>Adicionar Nova Arma</h2>
            <input type="text" id="weapon-name" placeholder="Nome da Arma">
            <input type="number" id="weapon-price" placeholder="Preço da Arma">
            <button onclick="addCustomWeapon()">Adicionar ao Carrinho</button>
        </div>

        <div class="carrinho">
            <h2>Carrinho</h2>
            <ul id="cart-items"></ul>
            <p>Total: $<span id="total-price">0.00</span></p>
            <button onclick="clearCart()">Limpar Carrinho</button>
            <button class="generate-pdf" onclick="generatePDF()">Gerar Extrato em PDF</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        let cart = [];

        function addToCart(name, price) {
            cart.push({ name, price });
            updateCart();
        }

        function addCustomWeapon() {
            const name = document.getElementById('weapon-name').value;
            const price = parseFloat(document.getElementById('weapon-price').value);

            if (name && !isNaN(price)) {
                addToCart(name, price);
                document.getElementById('weapon-name').value = '';
                document.getElementById('weapon-price').value = '';
            } else {
                alert('Por favor, insira um nome válido e um preço válido.');
            }
        }

        function updateCart() {
            const cartItems = document.getElementById('cart-items');
            const totalPrice = document.getElementById('total-price');

            cartItems.innerHTML = '';
            let total = 0;

            cart.forEach((item) => {
                total += item.price;
                const li = document.createElement('li');
                li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
                cartItems.appendChild(li);
            });

            totalPrice.textContent = total.toFixed(2);
        }

        function clearCart() {
            cart = [];
            updateCart();
        }

        async function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.setFontSize(16);
            doc.text('Extrato do Carrinho', 10, 10);

            let y = 20;
            let total = 0;

            cart.forEach(item => {
                doc.text(`${item.name} - $${item.price.toFixed(2)}`, 10, y);
                y += 10;
                total += item.price;
            });

            doc.text(`Total: $${total.toFixed(2)}`, 10, y);
            doc.save('extrato_carrinho.pdf');
        }
    </script>
</body>
</html>
