<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
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

        .inventory-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .inventory-table th, .inventory-table td {
            border: 2px solid #0f0;
            padding: 10px;
            text-align: center;
        }

        .inventory-table th {
            background-color: #222;
        }

        .inventory-table td {
            background-color: #111;
        }

        .add-weapon-form {
            background-color: #222;
            border: 2px solid #0f0;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
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
            background-color: #0f0;
            border: none;
            color: #000;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            text-align: center;
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #00cc00;
        }

        .remove-button {
            background-color: #ff0000;
            border: none;
            color: #fff;
            padding: 5px;
            cursor: pointer;
            font-size: 0.9em;
            border-radius: 5px;
        }

        .remove-button:hover {
            background-color: #cc0000;
        }

        .edit-button {
            background-color: #ffcc00;
            border: none;
            color: #000;
            padding: 5px;
            cursor: pointer;
            font-size: 0.9em;
            border-radius: 5px;
        }

        .edit-button:hover {
            background-color: #ff9900;
        }

        .total-stock {
            background-color: #222;
            border: 2px solid #0f0;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Controle de Estoque</h1>
    </header>
    <div class="container">
        <div class="add-weapon-form">
            <h2>Adicionar Nova Arma ao Estoque</h2>
            <input type="text" id="weapon-name" placeholder="Nome da Arma">
            <input type="number" id="weapon-quantity" placeholder="Quantidade">
            <button onclick="addWeaponToInventory()">Adicionar ao Estoque</button>
        </div>

        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Nome da Arma</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="inventory-list">
                <!-- Itens do Estoque -->
            </tbody>
        </table>

        <div class="total-stock">
            Total em Estoque: <span id="total-quantity">0</span>
        </div>

        <button class="back-button" onclick="window.location.href='index.php'">Voltar à Página Principal</button>
    </div>

    <script>
        let inventory = [];

        function addWeaponToInventory() {
            const name = document.getElementById('weapon-name').value;
            const quantity = parseInt(document.getElementById('weapon-quantity').value);

            if (name && !isNaN(quantity) && quantity > 0) {
                const weapon = inventory.find(item => item.name === name);
                if (weapon) {
                    weapon.quantity += quantity;
                } else {
                    inventory.push({ name, quantity });
                }
                updateInventoryTable();
                document.getElementById('weapon-name').value = '';
                document.getElementById('weapon-quantity').value = '';
            } else {
                alert('Por favor, insira um nome válido e uma quantidade válida.');
            }
        }

        function updateInventoryTable() {
            const inventoryList = document.getElementById('inventory-list');
            inventoryList.innerHTML = '';

            inventory.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td>
                        <button class="edit-button" onclick="editWeaponInInventory(${index})">Editar</button>
                        <button class="remove-button" onclick="removeWeaponFromInventory(${index})">Remover</button>
                    </td>
                `;
                inventoryList.appendChild(row);
            });

            updateTotalQuantity();
        }

        function removeWeaponFromInventory(index) {
            inventory.splice(index, 1);
            updateInventoryTable();
        }

        function editWeaponInInventory(index) {
            const newName = prompt('Digite o novo nome da arma:', inventory[index].name);
            const newQuantity = parseInt(prompt('Digite a nova quantidade:', inventory[index].quantity));

            if (newName && !isNaN(newQuantity) && newQuantity >= 0) {
                inventory[index] = { name: newName, quantity: newQuantity };
                updateInventoryTable();
            } else {
                alert('Por favor, insira um nome válido e uma quantidade válida.');
            }
        }

        function updateTotalQuantity() {
            const totalQuantity = inventory.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('total-quantity').textContent = totalQuantity;
        }
    </script>
</body>
</html>
