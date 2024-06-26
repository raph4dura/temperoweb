<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Itens Adicionados</title>
    <style>
        /* Estilos adicionais conforme necessário */
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h2>Itens Adicionados</h2>
    <div id="addedItemsList">
        <ul>
            <!-- Aqui você pode exibir os itens adicionados -->
            <template v-for="(items, category) in addedItemsByCategory" :key="category">
                <h3>{{ category }}</h3>
                <li v-for="item in items" :key="item.name">
                    <span>{{ item.name }}: {{ item.quantity }}</span>
                </li>
            </template>
        </ul>
    </div>

    <!-- Exibir a observação -->
    <div class="observation-box">
        <h3>Observação:</h3>
        <p>{{ observation }}</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        new Vue({
            el: '#addedItemsList',
            data() {
                return {
                    addedItemsByCategory: {}, // Inicialmente vazio, será preenchido com os itens adicionados
                    observation: '' // Inicialmente vazio, será preenchido com a observação
                };
            },
            created() {
                // Obter itens adicionados do localStorage
                const storedItems = localStorage.getItem('addedItems');
                if (storedItems) {
                    this.addedItemsByCategory = JSON.parse(storedItems)
                        .reduce((acc, item) => {
                            if (!acc[item.category]) {
                                acc[item.category] = [];
                            }
                            acc[item.category].push(item);
                            return acc;
                        }, {});
                }

                // Obter a observação do localStorage
                const storedObservation = localStorage.getItem('observation');
                if (storedObservation) {
                    this.observation = storedObservation;
                }
            }
        });
    </script>
</body>
</html>
